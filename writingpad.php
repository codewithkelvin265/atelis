<?php
require_once 'core/init.php'; 

  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
  elseif (isset($_SESSION['user_loggedin']) && $_SESSION['user_type']!== 'Student') {
    echo "<script>window.open('index.php','_self')</script>";
  }
  $lesson=new Lesson();
  $db=database::getInstance();
  //echo'<script>alert('.$_GET["sid"].')</script>';
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
    <link rel="stylesheet" type="text/css" href="public/style.css" />
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
                        <li class="nav-item"><a class="nav-link" href="courses.php"><i class="fa fa-graduation-cap"></i>Learn</a></li>
                        <li class="nav-item"><a class="nav-link" href="vocalranger/index.php"><i class="fas fa-table"></i>Vocal Ranger</a></li>
                        <li class="nav-item"><a class="nav-link" href="guitartuner.php"><i class="fas fa-guitar"></i>Guitar Tuner</a></li>
                        <li class="nav-item"><a class="nav-link active" href="writingpad.php"><i class="far fa-edit"></i><span>Writing Pad</span></a></li>
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
                        <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-users"></i><span>User Management</span></a></li>
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
                    <h3 class="text-dark mb-4">Writing Pad</h3>
                </div><!-- Start: Bold BS4 One Column Portfolio Layout -->
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-md-7 mb-4">
                            <div class="card h-100"><a href="#"></a>
                                <h4 style="margin-right: 0px;margin-left: 20px;margin-top: 8px;">Simple Word Processor
                                    </h4><br>
                                <h5 style="margin-right: 0px;margin-left: 20px;margin-top: 8px;"><?php if (isset($_GET['sid'])) {
                                    echo "Song Title: ".$lesson->getSong($_GET["sid"])["title"];
                                    echo '<form style=""  action="" method="post">
                                            <input value="" style="width: 62%; margin-left:20px;" class="form-control d-inline" type="text" id="username" placeholder="Enter Title Here" value="'.$lesson->getSong($_GET["sid"])["title"].'" name="Song_Title">
                                            <button class="btn btn-primary" name="cmdChangeTitle" type="submit">Change Title</button>
                                        </form>';
                                } ?></h5>
                                <?php if (!isset($_GET['sid'])) {
                                    echo '<form style=""  action="" method="post">
                                            <input value="" style="width: 62%; margin-left:20px;" class="form-control d-inline" type="text" id="username" placeholder="Enter Title Here" name="Song_Title">
                                            <button class="btn btn-primary" name="cmdSaveTitle" type="submit">Save Title</button>
                                        </form>';
                                } ?>
                                <hr>
                                <div class="row">
                                    
                                    <div class="col" style="width: auto;margin-left: 8px;"><div>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('bold');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-bold"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('italic');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-italic"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('underline');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-underline"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('strikeThrough');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-strikethrough"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('justifyLeft');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-align-left"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('justifyCenter');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-align-center"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('justifyRight');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-align-right"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('justifyFull');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-align-justify"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('cut');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-cut"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('copy');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-copy"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('indent');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-indent"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('outdent');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-dedent"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('subscript');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-subscript"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('superscript');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-superscript"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('undo');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-undo"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('redo');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-repeat"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('insertUnorderedList');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-list-ul"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('insertOrderedList');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-list-ol"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('insertParagraph');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-paragraph"></i></button>
<select onchange="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('formatBlock', this.value);" data-cf-modified-d652245f44cab16b794af1b4-="">
<option value="H1">H1</option>
<option value="H2">H2</option>
<option value="H3">H3</option>
<option value="H4">H4</option>
<option value="H5">H5</option>
<option value="H6">H6</option>
</select>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('insertHorizontalRule');" data-cf-modified-d652245f44cab16b794af1b4-="">HR</button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('createLink', prompt('Enter a URL', 'http://'));" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-link"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('unlink');" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-unlink"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; toggleSource();" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-code"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; toggleEdit();" data-cf-modified-d652245f44cab16b794af1b4-="">Toggle Edit</button>
<br>
<select onchange="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('fontName', this.value);" data-cf-modified-d652245f44cab16b794af1b4-="">
<option value="Arial">Arial</option>
<option value="Comic Sans MS">Comic Sans MS</option>
<option value="Courier">Courier</option>
<option value="Georgia">Georgia</option>
<option value="Tahoma">Tahoma</option>
<option value="Times New Roman">Times New Roman</option>
<option value="Verdana">Verdana</option>
</select>
<select onchange="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('fontSize', this.value);" data-cf-modified-d652245f44cab16b794af1b4-="">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
Fore Color: <input type="color" onchange="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('foreColor', this.value);" data-cf-modified-d652245f44cab16b794af1b4-="">
Background: <input type="color" onchange="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('hiliteColor', this.value);" data-cf-modified-d652245f44cab16b794af1b4-="">
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCommandWithArg('insertImage', prompt('Enter the image URL', ''));" data-cf-modified-d652245f44cab16b794af1b4-=""><i class="fa fa-file-image-o"></i></button>
<button onclick="if (!window.__cfRLUnblockHandlers) return false; execCmd('selectAll');" data-cf-modified-d652245f44cab16b794af1b4-="">Select All</button>
</div>
<hr>
<div style="border-style: inset; width: 98%">
<iframe name="richTextField" id="richTextField" style="width: 100%; height: 500px; border: 1px solid #dee2e6 !important;"></iframe></div>
<script type="text/javascript">

			var showingSourceCode = false;
			var isInEditMode = false;

			function enableEditMode () {
				richTextField.document.designMode = 'On';
			}

			function execCmd (command) {
				richTextField.document.execCommand(command, false, null);
			}

			function execCommandWithArg (command, arg) {
				richTextField.document.execCommand(command, false, arg);
			}

			function toggleSource () {
				if(showingSourceCode){
					richTextField.document.getElementsByTagName('body')[0].innerHTML = richTextField.document.getElementsByTagName('body')[0].textContent;
					showingSourceCode = false;
				}else{
					richTextField.document.getElementsByTagName('body')[0].textContent = richTextField.document.getElementsByTagName('body')[0].innerHTML;
					showingSourceCode = true;
				}
			}

			function toggleEdit () {
				if(isInEditMode){
					richTextField.document.designMode = 'Off';
					isInEditMode = false;
				}else{
					richTextField.document.designMode = 'On';
					isInEditMode = true;
				}
			}

		</script>
<script src="rocket-loader.min.js" data-cf-settings="d652245f44cab16b794af1b4-|49" defer=""></script>
<script src="aac5c45839.js" defer=""></script>
<br>
<form action="" method="post">
    <button class="btn btn-primary" type="submit" name="cmdSaveSong">Save Song</button>
    <a href="collaboration2.php?sid=<?php echo $_GET['sid']; ?>" class="btn btn-primary">Add Collaborators</a>
    <input type="hidden" id="lyrichtml" name="LyricHTML">
    <input type="hidden" id="lyricholder" name="">
</form>
<br>
<br>
<?php
/*$db=database::getInstance();
$sid=$_GET['sid'];
$revdata=$db->get('songrevisions', array('lyricid' => $sid));
print_r($revdata);
foreach ($revdata as $key => $value) {
    echo $value["revisor"];*/
//}
?>
<button class="btn btn-primary" type="button">Show Revisions</button>
</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="card border-white h-100">
                                <div class="card-body">
                                    <h4 style="margin-right: 0px;margin-left: 20px;margin-top: 8px;">English Dictionary Lookup</h4>
                                    <hr>
                                    <h4 style="color: black;" class="card-title">Meanings &amp; Synonyms</h4>
                                    <div class="col ed">
                                        <div class="container">
                                            
                                            <div class="input">
                                                <input onkeypress="handle(event)" type="text" class="search-field" placeholder="type here to search">
                                                <button onclick="handle(event)" class="search-field" onmousedown="handle(event)">Search</button>
                                            </div>
                                            <div class="result">
                                                <h1 style="color: #FE6874;" class="word">hello</h1>
                                                <p class="phonetics">/ha'lou/</p>
                                                <audio class="audio" controls></audio>
                                                <strong><p style="color: black;" class="wordmeaning">Word Meaning</p></strong>
                                                <p class="word-definition">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                                                <strong><p style="color: black;" class="word-definition">Synonyms</p></strong>
                                                <div class="synonyms">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <script src="dictionaryapp.js"></script>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <h4 style="color: black;" class="card-title">Rhymes</h4>
                                    <div class="col rhymess">
                                        <main id="main">
                                            <div class="container">

                                              <h1>Enter a Word</h1>

                                              <form id="form" autocomplete="off">
                                                <input type="text" id="input" value="">
                                                <button id="submit">SUBMIT</button>
                                              </form>

                                              <div id="responseField">

                                              </div>

                                            </div>
                                        
                                        </main>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="public/main.js"></script>
    <script src="public/helperFunctions.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js'></script>
    <script src="toastr/toastr.min.js"></script>
    <?php
    if (isset($_GET["sid"])) {
        $data=$lesson->getSong($_GET["sid"]);
         echo '
        <script>
        var iframe1 = document.getElementById("richTextField");
        '."iframe1.contentWindow.document.body.innerHTML="."'".$data["lyrics"]."';</script>";
     }
     else
     {

     } 
    ?>
    <script>
    function slideSwitch() {
        var iframe = document.getElementById("richTextField");
        var elmnt = iframe.contentWindow.document.body;
        var lyrics = document.getElementById("lyrichtml");

            lyrics.value = elmnt.innerHTML;
            localStorage.setItem("innerlyrics", lyrics.value);
            let song = localStorage.getItem('innerlyrics');
        

        //alert(song);
    }
    $(function() {
        setInterval( "slideSwitch()", 3000 );
    });
    function giveLyrics()
    {
        var lyrics1 = document.getElementById("lyrichtml");
        lyrics1.value = localStorage.getItem('innerlyrics');
    }
    
    </script>
    
                                        
</body>

</html>

<?php
  
  if (Input::exists() && isset($_POST['cmdSaveSong'])) 
  {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(

        'LyricHTML' => array(
          'required'=>true
        )

      ));

      if ($validation->passed()) 
      {
            
            if (isset($_SESSION['current_song_id']) && !isset($_GET["newsong"])) 
            {
                $fields=array(
                'lyrics' => Input::get('LyricHTML')
                  );

                try
                {

                    $sid=$_SESSION['current_song_id'];
                    $db->updateAny('songlyrics', 'lyricid', $sid, $fields);

                    $revfields=array(
                        'lyricid' => $_SESSION['current_song_id'],
                        'lyrics' => Input::get('LyricHTML'),
                        'revisor' => $_SESSION["user_id"],
                        'datecreated' => date('y-m-d')
                        );
                    $db->insert('songrevisions', $revfields);
                }
                catch(Exception $e)
                {

                  die($e->getMessage());
                }

                echo '<script>toastr.success("Lyrics Saved");</script>';
            }
            elseif(!isset($_GET["sid"]))
            {
                $validate = new Validate();
                  $validation = $validate->check($_POST, array(
                ));

                if ($validation->passed()) 
                {
                    $fields=array(
                    'lyrics' => Input::get('LyricHTML'),
                    'studentiD' => $_SESSION["user_id"],
                    'datecreated' => date('y-m-d')
                    );

                    

                    try
                    {
                        //echo'<script>alert("'.$sid.'")</script>';
                        //$db->insert('songlyrics', $fields);
                        $songID=$db->getSongID(Input::get('LyricHTML'), $_SESSION["user_id"], date('y-m-d'));
                        $revfields=array(
                        'lyricid' => $songID,
                        'lyrics' => Input::get('LyricHTML'),
                        'revisor' => $_SESSION["user_id"],
                        'datecreated' => date('y-m-d')
                        );
                        $db->insert('songrevisions', $revfields);
                    }
                    catch(Exception $e)
                    {

                      die($e->getMessage());
                    }

                    echo '<script>toastr.success("Song Saved");</script>';
                }
                else
                {

                }
            }
            elseif (isset($_GET["sid"]))
            {
                $fields=array(
                'lyrics' => Input::get('LyricHTML')
                  );

                try
                {

                    $sid=$_GET["sid"];
                    $db->updateAny('songlyrics', 'lyricid', $sid, $fields);
                    $revfields=array(
                        'lyricid' => $sid,
                        'lyrics' => Input::get('LyricHTML'),
                        'revisor' => $_SESSION["user_id"],
                        'datecreated' => date('y-m-d')
                        );
                    $db->insert('songrevisions', $revfields);
                }
                catch(Exception $e)
                {

                  die($e->getMessage());
                }

                echo '<script>toastr.success("Lyrics Saved");</script>';
            }
        
        }
    else
    {

      //echo'<script>alert("validation Failed")</script>';

      $msg="";
      foreach ($validation->errors() as $err => $value) 
      {
        //$msg +=$value."<br>";
        $msg.="*".$value."*".'\n';
        
      }
      

      echo '<script>function displayErrMsg() {
        var target= document.getElementById("errmsg");
        var targetdiv= document.getElementById("diverrmsg");
        target.innerText="'.$msg.'"; 
        targetdiv.style.display=""; 
        }
        displayErrMsg();</script>';
    }
  }
  elseif (Input::exists() && isset($_POST['cmdSaveTitle']) && !isset($_GET["sid"]))
  {
    $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'Song_Title' => array(
          'required'=>true,
          'min'=>2 
        )
      ));
      if ($validation->passed()) 
      {
        $db=database::getInstance();

        try
        {
          $fields=array(
            'title' => Input::get('Song_Title'),
            'studentiD' => $_SESSION["user_id"],
            'datecreated' => date('y-m-d')
          );

          //$db->insert('songlyrics', $fields);
          //print_r($db->_pdo->insert_id);
          $songID=$db->getSongID(Input::get('Song_Title'), $_SESSION["user_id"], date('y-m-d'));
          $_SESSION['current_song_title'] = Input::get('Song_Title');
          //echo'<script>alert("'.$songID.'")</script>';
          $_SESSION['current_song_id'] = $songID;
          echo '<script>toastr.success("Song Added!")</script>';
          echo '<script>window.open("writingpad.php?sid='.$songID.'","_self")</script>';
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }
        }
    }
    elseif (Input::exists() && isset($_POST['cmdChangeTitle']))
  {
    $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'Song_Title' => array(
          'required'=>true,
          'min'=>2 
        )
      ));
      if ($validation->passed()) 
      {
        $db=database::getInstance();

        try
        {
          $fields=array(
            'title' => Input::get('Song_Title')
          );

          $db->updateAny('songlyrics', 'lyricid', $_GET['sid'], $fields);
          echo '<script>toastr.success("Title Changed!")</script>';
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }
        }
    }
  else
  {
    //echo "Please enter values";
  }
?>