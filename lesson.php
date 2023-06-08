<?php 
  require_once 'core/init.php';

  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
  elseif (isset($_SESSION['user_loggedin']) && $_SESSION['user_type']!== 'Student') {
    echo "<script>window.open('index.php','_self')</script>";
  }
?>
<?php 
  $lesson=new Lesson();
  $sl= $_GET["sl"];
  $retlesson = $lesson->getLesson($sl);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="toastr/toastr.min.css">
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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>

                    <?php

                    if ($_SESSION['user_type']==="Student") 
                    {
                        echo '
                        <li class="nav-item"><a class="nav-link active" href="courses.php"><i class="fa fa-graduation-cap"></i>Learn</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="feedbackcentre.php"><i class="la la-comment-o"></i><span>Give Feedback</span></a></li>
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
                    <h3 class="text-dark mb-4"><?php echo $retlesson->lessonname; ?></h3>
                </div><!-- Start: Back-Next Nav -->
                <div><a class="btn btn-outline-primary" role="button" href="lessons.php?sc=Singing">← Back</a><a class="btn btn-outline-primary float-end" role="button" href="#">Next →</a></div><!-- End: Back-Next Nav -->
                <!-- Start: Bold BS4 One Column Portfolio Layout -->
                <div class="container">
                    <h1 class="my-4"><?php echo $retlesson->lessonname; ?>&nbsp;</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-7 mb-4">
                            <div class="card h-100"><a href="#"></a>
                                <h4 style="margin-right: 0px;margin-left: 20px;margin-top: 8px;">Visual Demonstration</h4>
                                <div class="row">
                                    <div class="col"><iframe src="<?php echo urldecode($retlesson->visualdemo); ?>" allowfullscreen="" frameborder="0" width="560" height="315" style="width: 100%;"></iframe></div>
                                </div>
                                <h4 style="margin-left: 20px;">Audio Demonstration</h4>
                                <div class="row">
                                    <div class="col"><audio id="kaya" src="<?php echo urldecode($retlesson->audiodemo); ?>" controls="" style="margin-left: 15px;"></audio></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="card border-white h-100">
                                <div class="card-body">
                                    <h4 class="card-title">Description</h4>
                                    <h6 class="text-muted card-subtitle mb-2"></h6>
                                    <p class="card-text"><?php echo $retlesson->description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <div class="card border-white h-100">
                                <div class="card-body">
                                    <h4 class="card-title">Assignment</h4>
                                    <h6 class="text-muted card-subtitle mb-2"></h6>
                                    <p class="card-text"><?php echo urldecode($retlesson->assignment); ?></p>
                                    <h4 style="margin-left: 20px;">Audio Demonstration</h4>
                                    <div class="row">
                                        <div class="col"><audio controls="" style="margin-left: 15px;"></audio></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 mb-4">
                            <div class="card h-100"><a href="#"></a>
                                <div class="card shadow mb-5">
                                    <div class="recorder container">
                                      <h2>Record New Audio</h2>
                                      <p>Record monitor volume: <input type="range" max="1" step="0.1" value="0" onchange="changeVolume(this.value)"/></p>
                                      <p>
                                        <button class="btn btn-primary" onclick="startRecording(this);">Record</button>
                                        <button class="btn btn-warning" onclick="stopRecording(this);" disabled>Stop</button>
                                      </p>
                                      <table id="recordingslist">
                                        <tbody>
                                            <tr>
                                              <th>
                                                <!-- <input type="checkbox" id="droneToggle" checked/> -->
                                              </th>
                                            </tr>
                                        </tbody>
                                        
                                      </table>
                                    </div>
                                   
                                </div>
                                <form action="" method="post" enctype='multipart/form-data'>
                                    <div style="margin-left: 20px;" class="align-items-center">
                                        <label>Submit Your Recording Here</label>
                                        <br>
                                        <input style="width: 50%; justify-self: center;" accept=".mp3, .m4a, .ogg, .wav" class="form-control" type="file" name="userFile">
                                        <input type="hidden" name="fileValue">
                                    </div>
                                    
                                    <br>
                                    <button class="btn btn-primary" value="upload" name="Submit" id="Submit" type="Submit">Submit Assignment<br></button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <hr>
                </div><!-- End: Bold BS4 One Column Portfolio Layout -->
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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/script.min.js"></script>



        <!-- Placed at the end of the document so the pages load faster -->
    <script src="audiorecorderjquery/js/jquery-1.7.2.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-transition.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-alert.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-modal.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-dropdown.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-tab.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-tooltip.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-popover.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-button.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-collapse.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-carousel.js"></script>
    <script src="audiorecorderbootstrap/js/bootstrap-typeahead.js"></script>


    <script type="text/javascript" src="audiorecorderapp/js/ACFIRFilter.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/ACAAFilter.js"></script> 
    <script type="text/javascript" src="audiorecorderapp/js/ACSpectrum.js"></script>    
    <script type="text/javascript" src="audiorecorderapp/js/ACFFT.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/SpectrumWorker.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/SpectrumDisplay.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/audioplayback.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/filedropbox.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/fft.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/audioLayerControl.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/audiosequence.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/AudioSequenceEditor.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/mathutilities.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/wavetrack.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/binarytoolkit.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/filesystemutility.js"></script>
    <script type="text/javascript" src="audiorecorderapp/js/editorapp.js"></script>

    <script src="audiorecorderjs/lib/recorder.js"></script>
    <script src="audiorecorderjs/recordLive.js"></script>
    <script src="audiorecorderjs/sequencer.js"></script>
    <script src="audiorecorderjs/drone.js"></script>
    <script src="toastr/toastr.min.js"></script>
</body>

</html>


<?php
  
  if (Input::exists()) 
  {

      if ( !empty($_FILES['userFile']['name']))
      {
        
        try
        {
            $info = pathinfo($_FILES['userFile']['name']);
            $ext = $info['extension']; // get the extension of the file
            $newname = rand().".".$ext; 

            $target = 'assets/aud/as/'.$newname;
            move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);

            $db=database::getInstance();
            
            //$_SESSION["user_id"]=14;
            $db->insert("assignmentsubmissions", array(
                'lessonid'   => $retlesson->lessonid,
                'studentid'    => $_SESSION["user_id"],
                'subfile'     => $newname,
                'dos'=> date('y-m-d'),
                'assignmentdemo'    => $retlesson->assignmentdemo
              ));

            echo '<script>toastr.success("Assignment Submited")</script>';

        }
        catch(Exception $e)
        {
            echo '<script>toastr.error("Submission Failed")</script>';

          die($e->getMessage());
        }

    }
    else
    {
        echo '<script>toastr.error("Please Upload A File")</script>';
    }

        
   }
?>