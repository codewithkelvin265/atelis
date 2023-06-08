
<?php 
  require_once 'core/init.php';
  $report = new Report();
  $reportValues=$report->generate($_SESSION['user_id']);
  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
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
    <link rel="stylesheet" href="assets/css/Bootstrap-Callout-Danger.css">
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
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>

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
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Current Vocal Range</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small fw-bold">Classification: BASS<span class="float-end">(E3-D3)</span></h4>
                                    
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Course Progress</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small fw-bold">Guitar<span class="float-end"><?php echo $reportValues['guitarprogress']; ?>%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="<?php echo $reportValues['guitarprogress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reportValues['guitarprogress']; ?>%;"><span class="visually-hidden"><?php echo $reportValues['guitarprogress']; ?>%</span></div>
                                    </div>
                                    
                                    <h4 class="small fw-bold">Singing<span class="float-end"><?php echo $reportValues['singingprogress']; ?>%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-info" aria-valuenow="<?php echo $reportValues['singingprogress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reportValues['singingprogress']; ?>%;"><span class="visually-hidden"><?php echo $reportValues['singingprogress']; ?>%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Songwriting<span class="float-end"><?php echo $reportValues['singingprogress']; ?>%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-success" aria-valuenow="<?php echo $reportValues['singingprogress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reportValues['singingprogress']; ?>%;"><span class="visually-hidden"><?php echo $reportValues['singingprogress']; ?>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input value="<?php echo $_SESSION['username']; ?>" class="form-control" type="text" id="username" placeholder="username" name="Username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input value="<?php echo $_SESSION['emailToVerify']; ?>" class="form-control" type="email" id="email" placeholder="user@example.com" name="Email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input value="<?php echo $_SESSION['user_fname']; ?>" class="form-control" type="text" id="first_name" placeholder="Jn" name="FirstName"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input value="<?php echo $_SESSION['user_lname']; ?>"  class="form-control" type="text" id="last_name" placeholder="Doe" name="LastName"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button name="cmdChangeName" class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Password Settings</p>
                                        </div>
                                        <div class="card-body">
                                           <div id="diverrmsg3" style="display: none;" class="bs-callout bs-callout-danger" style="font-size:14px;">
                                      <p class="bs-callout-danger" id="errmsg3"></p>
                                  </div>
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Current Password</strong></label><input class="form-control" type="password" id="username" placeholder="Current Password" name="Current_Password"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>New Password</strong></label><input class="form-control" type="password" id="username" placeholder="New Passowrd" name="New_Password"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Confirm New Password</strong></label><input class="form-control" type="password" id="username" placeholder="Confirm New Password" name="Repeat_Password"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" name="cmdChangePassword" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="toastr/toastr.min.js"></script>
</body>

</html>

<?php
  
  if (Input::exists() && isset($_POST['cmdChangeName'])) 
  {
      //echo'<script>alert("'.Input::get('Account_Type').'")</script>';

      $validate = new Validate();
      $validation = $validate->check($_POST, array(

        'FirstName' => array(
          'required'=>true,
          'min'=>2,
          'validName'=>Input::get('FirstName'),
          'max'=>20
          
        ),

        'LastName'=> array(
          'required'=>true,
          'min'=>2,
          'validName'=>Input::get('LastName'),
          'max'=>20
         
        )
      ));

      if ($validation->passed()) 
      {
        $db=database::getInstance();
        $user=new User();
        $ffname=strtolower(Input::get('FirstName'));
        $llname=strtolower(Input::get('LastName'));
        $uffname=ucwords($ffname);
        $ullname=ucwords($llname);

        try
        {
          $fields=array(
            'firstname'   => $uffname,
            'lastname'    => $ullname,
            'username'    => Input::get('Username'),
            'email'    => Input::get('Email')
          );

          $db->update('users', $_SESSION['user_id'], $fields);
          $_SESSION['user_name']=$uffname." ".$ullname;
          $_SESSION['user_fname']=$uffname;
          $_SESSION['user_lname']=$ullname;
          $_SESSION['username']=Input::get('Username');

          echo '<script>toastr.success("Details Changed")</script>';
        
        }
        catch(Exception $e)
        {

          die($e->getMessage());
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
  else
  {
    //echo "Please enter values";
  }


    if (Input::exists() && isset($_POST['cmdChangePassword'])) 
  {
      //echo'<script>alert("'.Input::get('Account_Type').'")</script>';

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'Current_Password'=> array(
          'correctPassword'=>Input::get('Password'),
          'required'=>true
        ),
        'New_Password'=> array(
          'required'=>true,
          'strongPassword'=>Input::get('Password'),
          
          'min'=>8
        ),

        'Repeat_Password'=> array(
          'required'=>true,
          'matches'=> 'New_Password'
        )

      ));

      if ($validation->passed()) 
      {
        $db=database::getInstance();
        
        $user=new User();
        try
        {
          $salt= Hash::salt(32);
          $fields=array(
            'password'    => Hash::make(Input::get('New_Password'), $salt)
          );

          $db->update('users', $_SESSION['user_id'], $fields);

          try 
          {
            echo '<script>toastr.success("Password Changed")</script>';
            $_SESSION['user_password']=Hash:: make(Input::get('New_Password'), $_SESSION['user_salt']);
          } 
          catch (Exception $e) 
          {
            
          }
        }
        catch(Exception $e)
        {

          die($e->getMessage());
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
        var target= document.getElementById("errmsg3");
        var targetdiv= document.getElementById("diverrmsg3");
        target.innerText="'.$msg.'"; 
        targetdiv.style.display=""; 
        }
        displayErrMsg();</script>';
    }
  }
  else
  {
    //echo "Please enter values";
  }
?>