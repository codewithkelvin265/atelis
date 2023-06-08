
	
<?php
require_once 'core/init.php';

  if (!isset($_SESSION['user_loggedin'])) 
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
    session_unset();
    session_destroy();
    header("Location: index.php");
?>