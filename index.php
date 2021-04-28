<?php

session_start();

if(isset($_SESSION["user_id"]))
{
	header("location:home.php");
}

include('function.php');

$connect = new mysqli('localhost','phpedits','WinactPoint@2021','activnew');

$message = '';
$error_usn = '';
$error_email = '';
$error_creden = '';
$usn = '';
$namec = '';
$email = '';
$creden = '';
$credencnfm = '';

if(isset($_POST["register"]))
{
	if(empty($_POST["usn"]))
	{
		$error_usn = "<label class='text-danger'>Enter Name</label>";
	}
	else
	{
		$usn = trim($_POST["usn"]);
		$usn = htmlentities($usn);
	}

	if(empty($_POST["email"]))
	{
		$error_email = '<label class="text-danger">Enter Email Address</label>';
	}
	else
	{
		$email = trim($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error_email = '<label class="text-danger">Enter Valid Email Address</label>';
		}
	}

	if(empty($_POST["creden"]))
	{
		$error_creden = '<label class="text-danger">Enter Password</label>';
	}
	else
	{
		$creden = trim($_POST["creden"]);
		$creden = password_hash($creden, PASSWORD_DEFAULT);
	}

	if($error_usn == '' && $error_email == '' && $error_creden == '')
	{
		$user_activation_code = md5(rand());

		$user_otp = rand(100000, 999999);

		$data = array(
			':namec' => $namec,
			':usn'		=>	$usn,
			':email'		=>	$email,
			':creden'	=>	$creden,
			':credencnfm' => $credencnfm,
			':user_activation_code' => $user_activation_code,
			':email_status'=>	'not verified',
			':user_otp'			=>	$user_otp
		);

		$query = "INSERT INTO activcheckt (namec, usn, email, creden, credencnfm, user_activation_code, email_status, user_otp)
		SELECT * FROM (SELECT :namec, :usn, :email, :creden, :credencnfm, :user_activation_code, :email_status, :user_otp) AS tmp
		WHERE NOT EXISTS (
		    SELECT usn FROM activcheckt WHERE usn = :usn
		) LIMIT 1
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		if($connect->lastInsertId() == 0)
		{
			$message = '<label class="text-danger">USN Already Register</label>';
		}	
		else
		{
			$user_avatar = make_avatar(strtoupper($usn[0]));

			$query = "UPDATE activcheckt 
			SET user_avatar = '".$user_avatar."' 
			WHERE register_user_id = '".$connect->lastInsertId()."'
			";

			$statement = $connect->prepare($query);

			$statement->execute();


			require 'class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '80';
			$mail->SMTPAuth = true;
			$mail->Username = 'parjanya.cs19@bmsce.ac.in';
			$mail->Password = 'WinMac@2021bmsce';
			$mail->SMTPSecure = '';
			$mail->From = 'parjanya.cs19@bmsce.ac.in';
			$mail->FromName = 'Webslesson';
			$mail->AddAddress($email);
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = 'Verification code for Verify Your Email Address';

			$message_body = '
			<p>For verify your email address, enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
			<p>Sincerely,</p>
			';
			$mail->Body = $message_body;

			if($mail->Send())
			{
				echo '<script>alert("Please Check Your Email for Verification Code")</script>';

				header('location:email_verify.php?code='.$user_activation_code);
			}
			else
			{
				$message = $mail->ErrorInfo;
			}
		}

	}
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Activity Point Dashboard - Register</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="/dashboard/assets/img/favicon/tcfavicon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/dashboard/assets/img/favicon/tcfavicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/dashboard/assets/img/favicon/tcfavicon.png">
  <link rel="manifest" href="/dashboard/assets/img/favicon/tcfavicon.png">
  <link rel="mask-icon" href="/dashboard/assets/img/favicon/tcfavicon.png" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="/dashboard/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/dashboard/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/dashboard/css/dashboard.css" type="text/css">
  <link rel="stylesheet" href="/dashboard/css/password.css" type="text/css">

</head>



<body class="bg-white">
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/dashboard/../index.html">
        <img src="/assets/img/brand/TechalierWhiteT.png" height="35" alt="Logo Impact">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
        aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <img src="/assets/img/brand/techalier-community.png" height="50" alt="Logo Impact">
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a href="/login.html" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/register.html" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for
                free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
          xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border border-soft">
            <div class="card-body px-lg-5 py-lg-5">
              <form autocomplete="off" method="POST" onsubmit="return checkPassword(this)">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input autocomplete="off" class="form-control" name="namec" placeholder="Name" type="text" required>
                  </div>
                  <div class="text-muted " id="pass_color"><small><span class="font-weight-bold">
                        <?php echo $error_usn; ?>
                      </span></small></div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="USN" type="text" name="usn" id="usn" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" id="email" type="email"
                      oninput="validateEmail(this);" required>
                  </div>
                  <div class="text-muted " id="pass_color"><small><span class="font-weight-bold">
                    <?php echo $error_email; ?>
                  </span></small></div>
                  <div class="text-muted " id="pass_color"><small><span id="email_type"
                        class="font-weight-bold"></span></small></div>
                </div>


                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="creden" id="creden"
                      required>


                  </div>
                  <div class="text-muted " id="pass_color"><small><span class="font-weight-bold">
                    <?php echo $error_creden; ?>
                  </span></small></div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="credencnfm"
                      id="credencnfm" required>

                  </div>
                </div>
                <div class="text-muted " id="pass_color"><small>Password strength: <span id="pass_type"
                      class="font-weight-bold"></span></small></div>

                <div class="text-center">
                  <button type="submit" name="register" class="btn btn-primary mt-4">Create account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5 bg-white" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-12">
          <div class="copyright text-center text-muted">
            &copy; 2021 <a href="https://community.techalier.com" class="font-weight-bold ml-1"
              target="_blank">Techalier Community</a>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/dashboard/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="/dashboard/assets/js/dashboard.js?v=1.2.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="/dashboard/assets/js/demo.min.js"></script>
  <script type="text/javascript">
    function checkPassword(form) {
      var password1 = form.creden.value;
      var password2 = form.credencnfm.value;

      if (password1 != password2) {
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong>Danger!</strong> This is a danger alert—check it out!</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


      }
      else {
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong>Success!</strong> This is a success alert—check it out!</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      }

    }
  </script>
  <script src="meterjs.js"></script>
  <script src="email.js"></script>
</body>

</html>