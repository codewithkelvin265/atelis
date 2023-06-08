<?php  
/**
 * 

 */
class Notification
{
	public $db;
	private $_data;

	function __construct()
	{
		$db=database::getInstance();
	}

	public static function getNotifications($userid = null)
	{
		$db=database::getInstance();

		$data= $db->get('notifications', array('userid', '=', $userid));
		//$data= $db->getNotifications($userid);
        $count= $db->count();
        if ($count<1) {
        	echo '<h1 style="color:white;">You Have 0 Notifications.</h1>';
        }
		$notifications= $db->results();
		
		for ($i=1; $i <=$count; $i++) { 
			//$ii=$count-$i;
			$notification= $db->results()[$count-$i];
			//echo "<script>alert('".$ii."')</script>";
                                              /*echo'<script>alert("'.$notification->sender.'")</script>';
                                              echo'<script>alert("'.$notification->amount.'")</script>';
                                              echo'<script>alert("'.$notification->notificationdate.'")</script>';
                                              echo'<script>alert("'.$notification->message.'")</script>';*/

            $record='<div class="author">'.
                                        '<button name="Notification" onclick="setAsRead(this.id);" class='.'"'.$notification->status.'"'.'value='.'"'.$notification->notificationID.'"'.'>'.
                                          
                                          '<div class="name notcontainer" >'.$notification->message.'</div>'.
                                          '<small>'.$notification->notificationdate.'</small>
                                          
                                          
                                      </button></div>';
            /*$record='<div class="dropdown-menu" id="Noti" aria-labelledby="Anots">'.
                       		'<a class="dropdown-item nots" href="#">'.
                       			'<small><i>'.$notification->notificationdate.'</i></small><br/>'.
                        		$notification->message.
                      		'</a>'.
                    '</div class="dropdown-divider">';*/
                    //echo "<script>alert('".$i."')</script>";
	        echo $record;
	        
	        
    	}

	}
	public function getCount($userid)
	{
		# code...
	}

	public static function sendNotification($userid, $message, $sender, $date)
	{
		$db=database::getInstance();

		$db->insert('notifications', 

		array(
            'userid'   => $userid,
            'message'    => $message,
            'sender'     => $sender,
            'status'     => 'unread',
            'notificationdate'    => $date,
            
        ));

        //echo "<script>alert('inserted notification')</script>";

	}
}
?>