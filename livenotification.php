

<?php 
  require_once 'core/init.php';

  $db=database::getInstance();

  $count= $db->getNotificationCount($_SESSION['user_id']);
  if ($count>=1) 
  {
  echo '&nbsp;<i class="fa fa-bell" aria-hidden="true" id="notnum"></i>';
  echo $count;
  echo " Notifications";
    if ($count>$_SESSION['NoOfNotifications']) {
      echo '<script>toastr.info("You have a new notification", "Access Money");</script>';
    }
  }
  else
  {
  	echo " Notifications";
  }
?>