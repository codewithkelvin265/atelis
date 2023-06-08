<?php 

  if (isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('dashboard.php','_self')</script>";
  }
  
?>
<?php
  require_once 'core/init.php';
  $_SESSION['loggedin']=false;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
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
    <link rel="stylesheet" href="assets/css/Bootstrap-Callout-Danger.css">
    <link rel="stylesheet" href="toastr/toastr.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/forms/guitarguy1.jpg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <!-- Start: Section Title -->
                            <div class="title-div">
                                <h1>atelis</h1>
                            </div><!-- End: Section Title -->
                            <div class="text-center">
                                <h4 class="text-dark mb-4">&nbsp;Apply for Enrollment</h4>
                                <div id="diverrmsg" style="display: none;" class="bs-callout bs-callout-danger" style="font-size:14px;">
                                      <h4 style="font-size:19px;">Submission Unsuccessful</h4>
                                      <p class="bs-callout-danger" id="errmsg"></p>     
                                </div>
                            </div><label class="form-label">Enter Your Full Name</label>
                            <form class="user" method="post">
                                
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="FirstName" value="<?php echo escape(Input::get('FirstName')); ?>"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Last Name" name="LastName" required="" value="<?php echo escape(Input::get('LastName')); ?>"></div>
                                </div><label class="form-label">Enter Your Email Address</label>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="Email" required="" value="<?php echo escape(Input::get('Email')); ?>"></div><label class="form-label">Course(s) You want to Apply For:</label>
                                <div class="mb-3" style="margin-left: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" name="Singing" value="Singing" id="singing"><label class="form-check-label" for="formCheck-3">Singing</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="guitar" name="Guitar" value="Guitar"><label class="form-check-label" for="formCheck-3">Guitar</label></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="songwriting" name="Account_Type" value="Songwriting"><label class="form-check-label" for="formCheck-3">Songwriting</label></div>
                                        </div>
                                        <input type="hidden" id="selectedcourses" name="SelectedCourses">
                                    </div>
                                </div><button onclick="selectCourse()" class="btn btn-primary d-block btn-user w-100" type="submit">Submit Application</button>
                                <hr>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="login.php">Already Enrolled? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.rawgit.com/digistate/resouces/master/multipleFilterMasonry.js"></script>
    <script src="https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="toastr/toastr.min.js"></script>

    <script type="text/javascript">
        function selectCourse()
        {

           var singing = document.getElementById("singing") ;
           var guitar = document.getElementById("guitar");
           var songwriting = document.getElementById("songwriting");
           var selectedcourses = document.getElementById("selectedcourses");

           if (singing.checked == true && guitar.checked == false && songwriting.checked == false) 
           {
                selectedcourses.value = "Singing";
           }
           else if (singing.checked == false && guitar.checked == true && songwriting.checked == false) 
           {
                selectedcourses.value = "Guitar";
           }
           else if (singing.checked == false && guitar.checked == false && songwriting.checked == true) 
           {
                selectedcourses.value = "Songwriting";
           }
           else if (singing.checked == true && guitar.checked == true && songwriting.checked == false) 
           {
                selectedcourses.value = "Singing and Guitar";
           }
           else if (singing.checked == false && guitar.checked == true && songwriting.checked == true) 
           {
                selectedcourses.value = "Guitar and Songwriting";
           }
           else if (singing.checked == true && guitar.checked == false && songwriting.checked == true) 
           {
                selectedcourses.value = "Singing and Songwriting";
           }
           else if (singing.checked == true && guitar.checked == true && songwriting.checked == true) 
           {
                selectedcourses.value = "All";
           }
           //alert(selectedcourses.value);
        }
    </script>
</body>

</html>


<?php
  
  if (Input::exists()) 
  {
      //echo'<script>alert("'.Input::get('Account_Type').'")</script>';

      $validate = new Validate();
      $validation = $validate->check($_POST, array(

        'FirstName' => array(
          'required'=>true,
          'min'=>2,
          'validName'=>Input::get('FirstName')
        ),

        'LastName'=> array(
          'required'=>true,
          'min'=>2,
          'validName'=>Input::get('LastName'),
          'max'=>20
         
        ),

        'Email'=> array(
          'required'=>true,
          'uniqueApplicant'=>'applications'
        ),

        'SelectedCourses'=> array(
          'required'=>true
        )

      ));

      if ($validation->passed()) 
      {
        echo "Passed";
        $application=new Application();

        echo $salt= Hash::salt(32);

        
        
        $salt= Hash::salt(32);

        $ffname=strtolower(Input::get('FirstName'));
        $llname=strtolower(Input::get('LastName'));
        $uffname=ucwords($ffname);
        $ullname=ucwords($llname);

        try
        {
            $application->submitApplication($uffname, $ullname, Input::get('Email'), Input::get('SelectedCourses'), date('y-m-d'));
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }

        echo '<script>toastr.success("We will send you an email to confirm your enrollment", "Application Sent Successfully");</script>';
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
?>