<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Activity Points Dashboard</title>
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/tcfavicon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/tcfavicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/tcfavicon.png">
  <link rel="manifest" href="../dashboard/assets/img/favicon/tcfavicon.png">
  <link rel="mask-icon" href="../dashboard/assets/img/favicon/tcfavicon.png" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="../../assets/vendor/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../../css/dashboard.css" type="text/css">

</head>


<body>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="col-6 collapse-brand">
            <img src="/assets/img/brand/TechalierWhiteT.png" height="50" alt="Logo Impact">
          </div>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto ">
            <a href="/register.html" target="_blank" class="btn btn-md btn-secondary animate-up-2"><i class="ni ni-user-run"></i> Logout</a>
            
           
            
          </ul>
          
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0 usn">USN</h5>
                      <span class="h2 font-weight-bold mb-0 name">Name</span>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Email</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              
              <div class="card card-stats">
                
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Points Recieved</h5>
                      <span class="h2 font-weight-bold mb-0">35</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 35%</span>
                    <span class="text-nowrap">Till Now</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Points yet to recieve</h5>
                      <span class="h2 font-weight-bold mb-0">23</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 23%</span>
                    <span class="text-nowrap">By End of Course</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Events Attended</h5>
                      <span class="h2 font-weight-bold mb-0">9</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 9%</span>
                    <span class="text-nowrap">Since starting of course</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Event Details</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Points Alloted</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      NSS Plog run
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Rotract iTeach
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Team Hasiru Clean-a-thon
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      NSS Plog run
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Rotract iTeach
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Team Hasiru Clean-a-thon
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      NSS Plog run
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Rotract iTeach
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Team Hasiru Clean-a-thon
                    </th>
                    <td>
                      20
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="https://community.techalier.com" class="font-weight-bold ml-1" target="_blank">Techalier Community</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/dashboard.js?v=1.2.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="../../assets/js/demo.min.js"></script>
</body>

</html>