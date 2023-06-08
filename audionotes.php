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
    <style>
      .soundBite input {
        margin-right: 4px;
      }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(25,34,58);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div><img style="width: 50px;height: 50px;font-size: 16px;">
                    <div class="sidebar-brand-text mx-3"><span>Atelis</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="lessons.html"><i class="fa fa-graduation-cap"></i>Learn</a><a class="nav-link" href="vocalranger/index.html"><i class="fas fa-table"></i>Vocal Ranger</a><a class="nav-link" href="guitartuner.html"><i class="fas fa-guitar"></i>Guitar Tuner</a></li>
                    <li class="nav-item"><a class="nav-link" href="writingpad.html"><i class="far fa-edit"></i><span>Writing Pad</span></a><a class="nav-link" href="songlyrics.html"><i class="fa fa-align-center"></i><span>Song Lyrics</span></a><a class="nav-link" href="dictionary.html"><i class="fa fa-book"></i><span>English Dictionary</span></a><a class="nav-link" href="chat.html"><i class="fa fa-wechat"></i><span>Chat</span></a><a class="nav-link" href="feedbackcentre.html"><i class="la la-comment-o"></i><span>Feedback Centre</span></a><a class="nav-link active" href="audionotes.html"><i class="fa fa-file-audio-o"></i><span>Audio Notes</span></a><a class="nav-link" href="login.html"><i class="fa fa-users"></i><span>User Management</span></a><a class="nav-link" href="login.html"><i class="fa fa-graduation-cap"></i><span>Course Management</span></a></li>
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
                    <h3 class="text-dark mb-4">Audio Notes</h3>
                    <div class="card shadow mb-5"></div>
                </div>
                <div class="container-fluid">
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
                       
                </div>
                <!--  <button class="btn btn-primary" type="button">Record New Audio Note</button>Start: Forum - Thread listing -->
                <div class="container" style="width: 100%;">
                    <h2>Audio Notes List</h2>
                    <div class="row">
                        <div class="col">
                            <ul class="list-group"></ul>
                        </div>
                    </div>
                </div><!-- End: Forum - Thread listing -->
                <ul class="list-group" style="width: 98%;margin-left: 8px;">
                    <!-- Start: Custom product list audio - black -->
                    <li class="list-group-item" style="background-color: rgb(59,59,59);font-size: 15px;padding-top: 3px;padding-right: 3px;padding-bottom: 3px;padding-left: 3px;width: 100%;color: var(--bs-white);">
                        <div class="row" style="width: 100%;max-height: 46px;">
                            <div class="col" style="margin-right: 0px;padding-right: 169px;width: 30%;"><label class="form-label" style="font-family: Quicksand, sans-serif;font-size: 16px;width: 213px;margin-bottom: 0px;margin-left: 20px;">Morning Sunshine</label><label class="form-label" style="font-family: Quicksand, sans-serif;font-size: 11px;width: 213px;margin-bottom: 0px;font-weight: 600;font-style: italic;margin-left: 20px;">NUMOSH LABS</label></div>
                            <div class="col text-center" style="width: 5%;"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;">00:14</label></div>
                            <div class="col" style="margin-right: 0px;padding-right: 237px;margin-top: 3px;width: 30%;"><audio controls="" style="height: 27px;filter: grayscale(0%);margin-top: 5px;width: 280px;">
                                    <source src="C:\Users\Kelvyn\Desktop\KAMARIH - SINGLE\zz.mp3" type="audio/mpeg">
                                </audio></div>
                            <div class="col text-center" style="width: 5%;"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;">Cmaj</label></div>
                            <div class="col text-center" style="font-size: 12px;font-weight: 700;font-family: Quicksand, sans-serif;width: 5%;"><label class="col-form-label text-center" style="margin-top: 7px;">120</label></div>
                            <div class="col text-center" style="margin-right: 0px;padding-right: 0px;padding-left: 0px;width: 4%;"><i class="fas fa-download" style="margin-top: 12px;"></i></div>
                        </div>
                    </li><!-- End: Custom product list audio - black -->
                    <!-- Start: Custom product list audio - black -->
                    <li class="list-group-item" style="background-color: rgb(59,59,59);font-size: 15px;padding-top: 3px;padding-right: 3px;padding-bottom: 3px;padding-left: 3px;width: 100%;color: var(--bs-white);">
                        <div class="row" style="width: 100%;max-height: 46px;">
                            <div class="col" style="margin-right: 0px;padding-right: 169px;width: 30%;"><label class="form-label" style="font-family: Quicksand, sans-serif;font-size: 16px;width: 213px;margin-bottom: 0px;margin-left: 20px;">Morning Sunshine</label><label class="form-label" style="font-family: Quicksand, sans-serif;font-size: 11px;width: 213px;margin-bottom: 0px;font-weight: 600;font-style: italic;margin-left: 20px;">NUMOSH LABS</label></div>
                            <div class="col text-center" style="width: 5%;"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;">00:14</label></div>
                            <div class="col" style="margin-right: 0px;padding-right: 237px;margin-top: 3px;width: 30%;"><audio controls="" style="height: 27px;filter: grayscale(0%);margin-top: 5px;width: 280px;"></audio></div>
                            <div class="col text-center" style="width: 5%;"><label class="col-form-label" style="font-size: 12px;font-family: Quicksand, sans-serif;margin-top: 7px;">Cmaj</label></div>
                            <div class="col text-center" style="font-size: 12px;font-weight: 700;font-family: Quicksand, sans-serif;width: 5%;"><label class="col-form-label text-center" style="margin-top: 7px;">120</label></div>
                            <div class="col text-center" style="margin-right: 0px;padding-right: 0px;padding-left: 0px;width: 4%;"><i class="fas fa-download" style="margin-top: 12px;"></i></div>
                        </div>
                    </li><!-- End: Custom product list audio - black -->
                </ul>
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

    <script type="text/javascript">
      $(window).load(function()
      {
        $('.editor.container').addClass('invisible');
        onDocumentLoaded();
      });
    </script>
</body>

</html>