<?php
include 'config.php';
$msg="";

if(isset($_POST['submit']))
{
    $name=$_POST['namec'];
    $email=$_POST['email'];
    $usn=$_POST['usn'];
    $creden=$_POST['creden'];
    $credencnmf=$_POST['credencnfm'];

    $check=mysqli_num_rows(mysqli_query($link,"SELECT * from activcheckt where usn='$usn'"));


    if($check>0)
    {
      echo "USN already registered";

    }
    else{

      $verification_id=rand(111111111,999999999);
         mysqli_query($link,"INSERT into activcheckt(namec, email, usn, creden, credencnfm,verification_status,verification_id) values ('$name','$email', '$usn', '$creden','$credencnmf','0',$verification_id)");

         $msg="Check your Email to verify the account!"; 
         $mailHTML="Please confirm your account registration by clicking the button or link below:<a href='https://activityportal.techalier.com/check.php?id=$verification_id'>  https://activityportal.techalier.com/check.php?id=$verification_id </a>" ;

        smtp_mailer($email,'ACCOUNT VERIFICATION',$mailHTML);

    }

    



}
function smtp_mailer($to,$subject,$msg)
{
    require_once("PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail -> IsSMTP();
    $mail -> SMTPDebug = 0;

    $mail -> SMTPAuth = true;

    $mail -> SMTPSecure = 'TLS';

    $mail -> Host ='smtp.mail.eu-west-1.awsapps.com';
    $mail -> Port = 465;
    
    $mail -> IsHTML(true);
    $mail -> CharSet ='UTF-8';
    $mail -> Username ="activityportal";
    $mail -> Password ="WinMac@2020";
    $mail -> SetFrom("activityportal@techalier.com");
    $mail -> Subject =$subject;
    $mail -> Body =$msg;
    $mail -> AddAddress($to);
    if(!$mail->Send())
    {
        return 0;

    }
    else{
        return 1;
    }


}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                  <button type="submit" name="submit" class="btn btn-primary mt-4">Create account</button>
                </div>
                <div>
                   <?php
                    echo $msg;
                    ?>
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
  <script src="./assets/js/meterjs.js"></script>
</body>

</html>