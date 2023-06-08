<?php 
  require_once 'core/init.php';

  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
  /*elseif (isset($_SESSION['user_loggedin']) && ($_SESSION['user_type']=== 'Agent') || $_SESSION['user_type']=== 'Super Agent') {
    echo "<script>window.open('index.php','_self')</script>";
  }*/
   $report = new Report();
   $report->generate($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">

    <link rel="stylesheet" href="assets/css/--mp---Masonry-Gallery-with-Loader.css">
    <link rel="stylesheet" href="assets/css/Accordion-with-custom-design.css">
    <link rel="stylesheet" href="assets/css/Color-Contact-List.css">
    <link rel="stylesheet" href="assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="assets/css/Custom-product-list-audio---black.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing-1.css">
    <link rel="stylesheet" href="assets/css/Forum---Thread-listing.css">
    <link rel="stylesheet" href="assets/css/Landing-Section-with-Call-to-Action-BS4.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/some-message.css">
</head>



<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(25,34,58);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div><img src="logo/logo.png" style="width: 50px;height: 50px;font-size: 16px;">
                    <div class="sidebar-brand-text mx-3"><span>Atelis</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>

                    <?php

                    if ($_SESSION['user_type']==="Student") 
                    {
                        echo '
                        <li class="nav-item"><a class="nav-link" href="courses.php"><i class="fa fa-graduation-cap"></i>Learn</a></li>
                        <li class="nav-item"><a class="nav-link" href="vocalranger/index.php"><i class="fas fa-table"></i>Vocal Ranger</a></li>
                        <li class="nav-item"><a class="nav-link" href="guitartuner.php"><i class="fas fa-guitar"></i>Guitar Tuner</a></li>
                        <li class="nav-item"><a class="nav-link" href="writingpad.php"><i class="far fa-edit"></i><span>Writing Pad</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="collaboration.php"><i class="far fa-edit"></i><span>Songwriting Collaboration</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="dictionary.php"><i class="fa fa-book"></i><span>Dictionary Lookup</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="songlyrics.php"><i class="fa fa-align-center"></i><span>Song Lyrics</span></a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="feedbackcentre.php"><i class="la la-comment-o"></i><span>Check Feedback</span></a></li>
                        ';
                    }
                    elseif ($_SESSION['user_type']==="Instructor") 
                    {
                        echo '
                        <li class="nav-item"><a class="nav-link" href="lessons.php"><i class="fa fa-graduation-cap"></i>Lessons</a></li>
                        <li class="nav-item"><a class="nav-link" href="guitartuner.php"><i class="fas fa-guitar"></i>Guitar Tuner</a></li>
                        <li class="nav-item"><a class="nav-link" href="assignmentsubmissions.php"><i class="la la-comment-o"></i><span>Give Feedback</span></a></li>
                        ';
                    }
                    else
                    {
                        echo '
                        <li class="nav-item"><a class="nav-link" href="usermanagement.php"><i class="fa fa-users"></i><span>User Management</span></a></li>
                        ';

                    }

                    ?>
                    
                    
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><strong><?php echo $_SESSION["user_name"]; ?></strong></span><img class="border rounded-circle img-profile" src="assets/img/user.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="dashboard.php"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Dashboard</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>AVAILABLE COURSES</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>3</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-graduation-cap fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>STUDENTS ENROLLED</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>20</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-graduation-cap fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>AVAILABLE INSTRUCTORS</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>12</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-graduation-cap fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="row">
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">STUDENTS VS COURSES</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{
                                        &quot;labels&quot;:[
                                        &quot;Singing Students&quot;,
                                        &quot;Songwriting Students&quot;,
                                        &quot;Guitar Students&quot;],
                                        &quot;datasets&quot;:[
                                        {
                                            &quot;label&quot;:
                                            &quot;&quot;,
                                        &quot;backgroundColor&quot;:[
                                        &quot;#4e73df&quot;,
                                        &quot;#1cc88a&quot;,
                                        &quot;#36b9cc&quot;],
                                        &quot;borderColor&quot;:[
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;],
                                        &quot;data&quot;:[
                                        &quot;20&quot;,
                                        &quot;80&quot;,
                                        &quot;20&quot;]}]},
                                        &quot;options&quot;:{
                                        &quot;maintainAspectRatio&quot;:false,
                                        &quot;legend&quot;:{
                                            &quot;display&quot;:false,
                                            &quot;labels&quot;:{
                                                &quot;fontStyle&quot;:
                                                &quot;normal&quot;}},
                                                &quot;title&quot;:{
                                                    &quot;fontStyle&quot;:
                                                    &quot;normal&quot;
                                                }
                                            }
                                        }"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Singing</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Songwriting</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Guitar</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">USERS</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{
                                        &quot;labels&quot;:[
                                        &quot;Students&quot;,
                                        &quot;Instructors&quot;,
                                        &quot;Managers&quot;],
                                        &quot;datasets&quot;:[
                                        {
                                            &quot;label&quot;:
                                            &quot;&quot;,
                                        &quot;backgroundColor&quot;:[
                                        &quot;#4e73df&quot;,
                                        &quot;#1cc88a&quot;,
                                        &quot;#36b9cc&quot;],
                                        &quot;borderColor&quot;:[
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;],
                                        &quot;data&quot;:[
                                        &quot;20&quot;,
                                        &quot;15&quot;,
                                        &quot;2&quot;]}]},
                                        &quot;options&quot;:{
                                        &quot;maintainAspectRatio&quot;:false,
                                        &quot;legend&quot;:{
                                            &quot;display&quot;:false,
                                            &quot;labels&quot;:{
                                                &quot;fontStyle&quot;:
                                                &quot;normal&quot;}},
                                                &quot;title&quot;:{
                                                    &quot;fontStyle&quot;:
                                                    &quot;normal&quot;
                                                }
                                            }
                                        }"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Students</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Instructors</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Managers</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">ENROLLMENT APPLICATIONS</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{
                                        &quot;labels&quot;:[
                                        &quot;Pending&quot;,
                                        &quot;Waitlisted&quot;,
                                        &quot;Approved&quot;],
                                        &quot;datasets&quot;:[
                                        {
                                            &quot;label&quot;:
                                            &quot;&quot;,
                                        &quot;backgroundColor&quot;:[
                                        &quot;#4e73df&quot;,
                                        &quot;#1cc88a&quot;,
                                        &quot;#36b9cc&quot;],
                                        &quot;borderColor&quot;:[
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;,
                                        &quot;#ffffff&quot;],
                                        &quot;data&quot;:[
                                        &quot;20&quot;,
                                        &quot;30&quot;,
                                        &quot;20&quot;]}]},
                                        &quot;options&quot;:{
                                        &quot;maintainAspectRatio&quot;:false,
                                        &quot;legend&quot;:{
                                            &quot;display&quot;:false,
                                            &quot;labels&quot;:{
                                                &quot;fontStyle&quot;:
                                                &quot;normal&quot;}},
                                                &quot;title&quot;:{
                                                    &quot;fontStyle&quot;:
                                                    &quot;normal&quot;
                                                }
                                            }
                                        }"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Pending</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Waitlisted</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Approved</span></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End: Chart <li class="nav-item"><a class="nav-link" href="audionotes.php"><i class="fa fa-file-audio-o"></i><span>Audio Notes</span></a></li> -->
                    <div class="row">
                        
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Kelvin Msiska_001198239</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/--mp---Masonry-Gallery-with-Loader.js"></script>
    <script src="assets/js/Accordion-with-custom-design.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>