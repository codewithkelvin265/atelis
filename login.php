<?php 
  require_once 'core/init.php';

  if (isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('dashboard.php','_self')</script>";
  }
  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
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
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/forms/guitarguy2.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                  <center><img style="width: 70px; height: 70px;" src="logo/logo.png"></center>
                                  
                                    <!-- Start: Section Title -->
                                    <div class="title-div">

                                        <h1>ATELIS</h1>
                                    </div><!-- End: Section Title -->
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login Here!</h4>
                                    </div>
                                    <form class="user" method="post">
                                        <div id="diverrmsg" style="display: none;" class="bs-callout bs-callout-danger" style="font-size:14px;">
                                          <h4 style="font-size:19px;">Login Failed!</h4>
                                          <p class="bs-callout-danger" id="errmsg"></p>
                                        </div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="Email" required="" value=""></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="Password"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="apply.php">Don't Have an Account? Apply For Enrollment!</a></div>
                                </div>
                            </div>
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
</body>

</html>


<?php 
  

  if (Input::exists()) 
  {
    if (isset($_SESSION['user_attempts']) && $_SESSION['user_attempts']>=3) {
              echo '<script>function displayErrMsg() {
              var target= document.getElementById("errmsg");
              var logbtn= document.getElementById("logbtn");
              logbtn.disabled=true;
              var targetdiv= document.getElementById("diverrmsg");
              target.innerText="'."Sorry, your account has been locked for 30 seconds, please wait.".'"; 
              targetdiv.style.display=""; 
              setInterval( "unlockAccount()", 30000 );
              }
              displayErrMsg();</script>';
              $_SESSION['user_attempts']=0;
              exit();
    }
    //if (Token::check(Input::get('token'))) 
    //{
      
      $validate=new Validate();

      $validation= $validate->check($_POST, array(
        'Email'=> array(
          'required'=>true
        ),
        'Password'=> array(
          'required'=>true
        )
      ));


      if ($validation->passed()) 
      {
        
        $user = new User();
        $login= $user->login(Input::get('Email'), Input::get('Password'));

        if ($login) 
        {
          $_SESSION['welcomed']=0;
          $_SESSION['user_attempts']=0;
          echo "<script>window.open('dashboard.php','_self')</script>";      
        }
        else
        {
          $_SESSION['user_attempts']+=1;
          $attempts=4-$_SESSION['user_attempts'];
          echo '<script>function displayErrMsg() {
          var target= document.getElementById("errmsg");
          var targetdiv= document.getElementById("diverrmsg");
          target.innerText="'."Wrong Email or Password, Your Account Will Be Locked After ".$attempts." More Attempt(s).".'"; 
          targetdiv.style.display=""; 
          }
          displayErrMsg();</script>';
        }
      }
      else
      {
        
        $msg="";
        foreach ($validation->errors() as $err => $value) 
        {
          $msg.="*".$value."*".", ";
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
 ?>
