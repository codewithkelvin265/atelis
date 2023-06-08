<?php  
/**
 * 

 */
class Report
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
	public function generate($uid)
	{
		$reportValues = array();
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$db=database::getInstance();
		$data= $db->get('notifications', array('userid', '=', $uid));
        
        $notificationcount= $db->count();
        $reportValues["notificationcount"]=$notificationcount;

        //array_push($reportValues, $notificationcount);

        $data= $db->get('enrollments', array('studentid', '=', $uid));
        $coursescount= $db->count();
        $reportValues["coursescount"]=$coursescount;

        $data= $db->get('songlyrics', array('studentid', '=', $uid));
        $songcount= $db->count();
        $reportValues["songcount"]=$songcount;

        $data= $db->get('collabmembers', array('member', '=', $uid));
        $groupsongcount= $db->count() + $songcount;
        $reportValues["groupsongcount"]=$groupsongcount;


        $data= $db->get('assignmentsubmissions', array('studentid', '=', $uid));
        $ascount= $db->count();
        $reportValues["ascount"]=$ascount;

        $data= $db->get('feedback', array('studentid', '=', $uid));
        $receivedfeedback= $db->count();
        $reportValues["receivedfeedback"]=$receivedfeedback;

        $data= $db->get('feedback', array('instructor', '=', $uid));
        $givenfeedback= $db->count();
        $reportValues["givenfeedback"]=$givenfeedback;

        $singingcomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=1 and status="complete"'))['count(*)'];
        $reportValues["singingcomplete"]=$singingcomplete;
        $singingincomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=1 and status="locked"'))['count(*)'];
        $reportValues["singingincomplete"]=$singingincomplete;
        $guitarcomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=2 and status="complete"'))['count(*)'];
        $reportValues["guitarcomplete"]=$guitarcomplete;
        $guitarincomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=2 and status="locked"'))['count(*)'];
        $reportValues["guitarincomplete"]=$guitarincomplete;
        $songwcomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=3 and status="complete"'))['count(*)'];
        $reportValues["songwcomplete"]=$songwcomplete;
        $songwincomplete = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from studentlessons where studentid='.$uid.' and courseid=3 and status="locked"'))['count(*)'];
        $reportValues["songwincomplete"]=$songwincomplete;

        //print_r($singingcomplete);
        $singingprogress = ($singingcomplete / 10) * 100;
        $reportValues["singingprogress"]=$singingprogress;

        $guitarprogress = ($guitarcomplete / 10) * 100;
        $reportValues["guitarprogress"]=$guitarprogress;
        $songwprogress = ($songwcomplete / 10) * 100;
        $reportValues["songwprogress"]=$songwprogress;

        $singingavg = mysqli_fetch_assoc(mysqli_query($conn, 'select avg(grade) from feedback where studentiD='.$uid.' and lessonid <=10'))['avg(grade)'];
        $reportValues["singingavg"]=$singingavg;

        $guitaravg = mysqli_fetch_assoc(mysqli_query($conn, 'select avg(grade) from feedback where studentiD='.$uid.' and lessonid > 10 and lessonid < 21'))['avg(grade)'];
        $reportValues["guitaravg"]=$guitaravg;

        $songwavg = mysqli_fetch_assoc(mysqli_query($conn, 'select avg(grade) from feedback where studentiD='.$uid.' and lessonid > 20'))['avg(grade)'];
        $reportValues["songwavg"]=$songwavg;

        $userscount =mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from users'))['count(*)'];
        $reportValues["userscount"]=$userscount;
        
        $studentcount = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from users where usertype="Student"'))['count(*)'];
        $reportValues["studentcount"]=$studentcount;
        $instructorcount = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from users where usertype="Instructor"'))['count(*)'];
        $reportValues["instructorcount"]=$instructorcount;
        $managercount = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from users where usertype="Manager"'))['count(*)'];
        $reportValues["managercount"]=$managercount;
        $applicationscount = mysqli_fetch_assoc(mysqli_query($conn, 'select count(*) from applications'))['count(*)'];
        

        $reportValues["applicationscount"]=$applicationscount;
        $_SESSION['reportValues']=$reportValues;
        return $reportValues;

        //print_r($reportValues);
        //die();

        //echo "<script>window.open('dashboard.php?reportValues=".json_encode($reportValues)."','_self')</script>";

	}
}
?>