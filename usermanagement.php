<?php 
require_once 'core/init.php';

  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
  elseif (isset($_SESSION['user_loggedin']) && $_SESSION['user_type']!== 'Manager') {
    echo "<script>window.open('index.php','_self')</script>";
  }
?>
<?php
  
  $application=new Application();
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
                    <h3 class="text-dark mb-4">Student Enrollment</h3>
                    <div class="card shadow mb-5"></div>
                </div>
                <div class="container">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-7 d-none d-lg-flex">

                                    <div class="container-fluid">
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Select An Applicant From List</p> <a class="align-self-right" href="usermanagement.php">Refresh Applicants List</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 text-nowrap">
                                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                                    <option value="All" onclick="sortApplicants(this)" selected="">All</option>
                                                                    <option value="pending" onclick="sortApplicants(this)">Pending</option>
                                                                    <option value="Waitlisted" onclick="sortApplicants(this)">Waitlisted</option>
                                                                    <option value="Ignored" onclick="sortApplicants(this)">Ignored</option>
                                                                </select>&nbsp;</label></div>
                                                    </div>
                                        
                                                </div>
                                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                    <table class="table my-0" id="dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Status</th>
                                                                <th>User Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $application->getAllApplicants();
                                                            ?>
                                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td><strong>Status</strong></td>
                                                                <td><strong>User Email</strong></td>
                                                                <td><strong>Action</strong></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 align-self-center">
                                                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                            <ul class="pagination">
                                                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-lg-5">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Enroll A Student</h4>
                                        </div>
                                        <form class="user" method="post">
                                            <div>
                                                <label class="form-label">Name : &nbsp;</label><label id="nameval">&nbsp;</label>
                                                <p></p>
                                                <label class="form-label">Email : &nbsp;</label><label id="emailval">&nbsp;</label><p></p>
                                                <label class="form-label">Date Applied : &nbsp;</label><label id="dateval">&nbsp;</label><p></p>
                                                 <label class="form-label">Application Status : &nbsp;</label><label id="statusval"></label><p></p>
                                                 <label class="form-label">This applicant applied for : &nbsp;</label><label id="scval"></label><p></p>
                                            </div>
                                            <p> </p>
                                            <button class="btn btn-primary" type="button">Waitlist</button>
                                            <button class="btn btn-primary" type="button">Delete</button>
                                            <button class="btn btn-primary" type="button">Ignore</button>
                                            <button class="btn btn-primary d-block btn-user w-100" type="submit">Approve/Enroll Student</button>
                                            <input id="appid" name="Appid" type="hidden">
                                            <hr>
                                            <hr>
                                        </form>
                                        <div class="text-center">
                                            
                                        </div>
                                        <div class="text-center"></div>
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

    <script type="text/javascript">
        function sendApplicantValues(btn)
        {
            var id = btn.id;
            //from values
            var name = document.getElementById("name"+id) ;
            var status = document.getElementById("status"+id) ;
            var sc = document.getElementById("sc"+id) ;
            var da= document.getElementById("dateapplied"+id) ;
            var email = document.getElementById("email"+id) ;


            //to values
            var nameval = document.getElementById("nameval") ;
            var emailval = document.getElementById("emailval") ;
            var scval = document.getElementById("scval") ;
            var dateval = document.getElementById("dateval") ;
            var statusval = document.getElementById("statusval") ;
            var appid = document.getElementById("appid") ;


            nameval.innerHTML = name.innerHTML;
            statusval.innerHTML = status.innerHTML;
            scval.innerHTML= sc.value;
            dateval.innerHTML=da.value;
            emailval.innerHTML=email.innerHTML;
            appid.value=id;
           //alert(name.innerHTML);
        }
        function sortApplicants(col)
        {
            var collection = document.getElementsByClassName("appclass");

            if (col.value === "All") 
            {
                for (let i = 0; i < collection.length; i++) 
                {

                    collection[i].hidden = false;
                }
                
            }
            else
            {
                for (let i = 0; i < collection.length; i++) 
                {
                    //alert(collection[i].childNodes[3].innerHTML);
                    if (collection[i].childNodes[3].innerHTML === col.value) 
                  {

                    collection[i].hidden=false;
                  }

                  else if (collection[i].childNodes[3].innerHTML != col.value) 
                  {

                    collection[i].hidden=true;
                  }
                  
                }
            }
            
        }

    </script>
</body>

</html>

<?php
  
  if (Input::exists()) 
  {

        $salt= Hash::salt(32);
        $createdpwd = uniqid();
        $hashedpwd = Hash::make($createdpwd, $salt);
        

        try
        {
            $db=database::getInstance();
            $user= new User();

            $data= $db->get('Applications', array('applcationid', '=', Input::get('Appid')));


              $applicant=$data->getAppObj(Input::get('Appid'));
              //echo $uid;
              $user->create(array(
                'firstname'   => $applicant->firstname,
                'lastname'    => $applicant->lastname,
                'username'     => uniqid(),
                'email'     => $applicant->email,
                'password'    => $hashedpwd,
                'salt'    => $salt,
                'joined'=> date('y-m-d'),
                'usertype'    => 'Student',
                'locked'    => '0',
                'verified'    => '0',
                'attempts'    => '0'    
              ));

            try
            {
                $data1= $db->get('users', array('email', '=', $applicant->email));
            
                $lstatus = "Current";
                $uid=$data1->getID();
                //die($uid);

                for ($i=1; $i < 31; $i++) 
                {
                    if ($i <= 10) {
                        $cid = 1;
                    }
                    elseif ($i>=11 && $i<=20) {
                       $cid = 2;
                    }
                    elseif ($i>=21 && $i<320) {
                       $cid = 3;
                    }

                    if ($i === 1 || $i=== 11 || $i===21 ) {
                         $lstatus = "Current";
                    }
                    else{
                        $lstatus = "Locked";
                    } 
                    $fields=array(
                    'lessonid'      => $i,
                    'studentid'        => $uid,
                    'courseid'        => $cid,
                    'status'            => $lstatus
                    );

                    $db->insert('STUDENTLESSONS', $fields);

                }
            }
            catch(Exception $e)
            {

              die($e->getMessage());
            }

            $to_email = $applicant->email;
            $subject = "Atelis Enrollment Confirmation";
            $body = "Dear $applicant->firstname,"."\r\n"."Congratulations for getting enrolled to our art firm."."\r\n"."The password you can use to login is $createdpwd" ."\r\n"."You can change it anytime. Please do not share your password with anyone. ";
            $headers = "From: calvinkenn2001@gmail.com";
             
            if (mail($to_email, $subject, $body, $headers)) {
                echo '<script>toastr.success("Email sent containing login details", "Student Enrolled!");</script>';
                $db->deleteRecord('applications', 'email', $applicant->email);
                //echo "Email successfully sent to $to_email...";
            } else {
                echo '<script>toastr.error("Email is Invalid", "Student Not Enrolled!");</script>';
                //echo "Email sending failed...";
            }
              
        

        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }

        
   }
?>