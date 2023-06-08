<?php  
/**
 * 

 */
class Lesson
{
	public $db;
	private $_data;

	function __construct()
	{
		$db=database::getInstance();
		
	}


	public static function getLessonList($courseid = null)
	{
		$db=database::getInstance();

		$data= $db->get('lessons', array('courseid', '=', $courseid));
        $count= $db->count();
        if ($count<1) 
        {
        	echo '<h1 style="color:white;">You Have 0 Lessons.</h1>';
        }
        else
        {
        	$Lessons= $db->results();
		
			for ($i=0; $i<$count; $i++) 
			{ 
				$Lesson= $db->results()[$i];
				if ($Lesson->status === "unlocked") {
					# code...
				}
	            $record='<div class="author">'.
	                                        '<button name="Lesson" onclick="setAsRead(this.id);" class='.'"'.$Lesson->status.'"'.'value='.'"'.$Lesson->LessonID.'"'.'>'.
	                                          
	                                          '<div class="name notcontainer" >'.$Lesson->message.'</div>'.
	                                          '<small>'.$Lesson->Lessondate.'</small>
	                                         
	                                      </button></div>';

		        echo $record;
		        
		        
	    	}
        }
		

	}

    public static function getASubmissions()
    {
        $seg ='assignmentsubmissions asub, lessons l, users u where asub.lessonid=l.lessonid AND asub.studentid=u.userid';
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $ss= '"Completed"';

        $sldot='asub.';
        $query = "SELECT * FROM $seg ORDER BY ".$sldot."DOS DESC";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
                $record='

                <li class="thread">
                <a href="givefeedback.php?sid='.$row['submissionid'].'" style="color:grey;">
                <span class="time">'.$row['dos'].'</span>
                <span class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assignment from Lesson: &nbsp;'.$row['lessonname'].', &nbsp; Submitted by: '.$row['firstname'].' '.$row['lastname'].'</span>
                </a>
                <span class="icon"> 
                <a class="subscribe" href="givefeedback.php?sid='.$row['submissionid'].'"><i class="fa fa-star-o"></i></a>
                <a class="flag" href="javascript:void(0)"><i class="fa fa-flag"></i></a>
                </span>
                
                </li>

                ';
                echo $record;                                       
            }
        }

    }

    public static function getSongs($uid)
    {
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $query = "SELECT * FROM songlyrics WHERE studentid=$uid ORDER BY datecreated DESC";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
                $record='

                <li class="thread">
                <a href="writingpad.php?sid='.$row['lyricid'].'" style="color:grey;">
                <span class="time">'.$row['datecreated'].'</span>
                <span class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Song Title: &nbsp;'.$row['title'].', &nbsp; Song Lyrics: '.'Click to view lyrics'.'</span>
                </a>
                <span class="icon"> 
                <a class="subscribe" href="writingpad.php?sid='.$row['lyricid'].'"><i class="fa fa-star-o"></i></a>
                <a class="flag" href="javascript:void(0)"><i class="fa fa-flag"></i></a>
                </span>
                
                </li>

                ';
                echo $record;                                       
            }
        }

    }
    public static function getGroupSongs($uid)
    {
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $query = trim("'SELECT * FROM users u, songlyrics s, collaborations c, collabmembers cm WHERE (u.useriD=cm.studentid AND u.userid=".$uid." AND c.collabid = cm.collabiD AND s.lyricid=c.lyriciD) OR (s.studentid=".$uid." AND c.songowner=s.studentiD AND c.collabid = cm.collabiD AND s.lyricid=c.lyriciD) ORDER BY s.datecreated DESC;'", "'");

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
                $record='

                <li class="thread">
                <a href="writingpad.php?sid='.$row['lyricid'].'" style="color:grey;">
                <span class="time">'.$row['datecreated'].'</span>
                <span class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Song Title: &nbsp;'.$row['title'].', &nbsp; Song Lyrics: '.'Click to view lyrics'.'</span>
                </a>
                <span class="icon"> 
                <a class="subscribe" href="writingpad.php?sid='.$row['lyricid'].'"><i class="fa fa-star-o"></i></a>
                <a class="flag" href="javascript:void(0)"><i class="fa fa-flag"></i></a>
                </span>
                
                </li>

                ';
                echo $record;                                       
            }
        }

    }
    public static function getSongsForCollab($uid)
    {
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $query = "SELECT * FROM songlyrics WHERE studentid=$uid ORDER BY datecreated DESC";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
                $record='

                <li class="thread">
                <a href="collaboration2.php?sid='.$row['lyricid'].'" style="color:grey;">
                <span class="time">'.$row['datecreated'].'</span>
                <span class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Song Title: &nbsp;'.$row['title'].', &nbsp; '.'Click to Select for collaboration'.'</span>
                </a>
                <span class="icon"> 
                <a class="subscribe" href="collaboration2.php?sid='.$row['lyricid'].'"><i class="fa fa-star-o"></i></a>
                <a class="flag" href="javascript:void(0)"><i class="fa fa-flag"></i></a>
                </span>
                
                </li>

                ';
                echo $record;                                       
            }
        }

    }

    public static function getFeedback($userid= null)
    {
        $seg ='feedback f, lessons l where f.lessonid=l.lessonid AND f.studentid='.$userid;
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $sldot='f.';
        $query = "SELECT f.lessonid, l.lessonname, f.grade, f.comment FROM $seg ORDER BY ".$sldot."datecreated DESC";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
                $prog= $row[0] +1;
                if ($row["grade"]>5) 
                {
                    
                    //$prog= $row[0] +1;
                    $record='
                        <div class="shadow accordion__item">
                        <!-- Start: Accordion Head -->
                            <div class="accordion__header"><span><strong>Feedback for: '.$row["lessonname"].' Lesson Assignment</strong><br></span></div><!-- End: Accordion Head -->
                            <!-- Start: Accordion Content -->
                            <div class="accordion__body">
                                <!-- Start: some-message -->
                                <div class="d-flex" id="some-message" style="background: rgb(224,249,240);">
                                    <div class="content">
                                        <h5>Good Work!&nbsp;<span>You May Proceed</span></h5>
                                        <p>'.$row["comment"].'&nbsp;</p>
                                        <p>You scored '.$row["grade"].'&nbsp;out of 10.</p>
                                        
                                    </div>
                                </div><!-- End: some-message -->
                                <!-- Start: Video Link -->
                                <div class="video__link"><a href="in-course-video.html"></a></div><!-- End: Video Link -->
                                <!-- Start: Video Link -->
                                <div class="video__link"><a href="lesson.php?sl='.$prog.'">
                                        <p class="p-2 video__title"><i class="fa fa-paperclip me-1"></i>Continue With Next Lesson<br></p>
                                    </a></div><!-- End: Video Link -->
                            </div><!-- End: Accordion Content -->
                        </div>
                
                    ';
                    echo $record;
                }
                elseif ($row["grade"]<6) {
                    $record='
                        <div class="shadow accordion__item">
                            <!-- Start: Accordion Head -->
                            <div class="accordion__header"><span><strong>Feedback for: '.$row["lessonname"].' Lesson Assignment</strong><br></span></div><!-- End: Accordion Head -->
                            <!-- Start: Accordion Content -->
                            <div class="accordion__body">
                                <!-- Start: some-message -->
                                <div class="d-flex" id="some-message">
                                    <div class="content">
                                        <h5>Try Again!&nbsp;<span>You need to redo the assignment.</span></h5>
                                        <p>'.$row["comment"].'&nbsp;</p>
                                        <p>You scored '.$row["grade"].'&nbsp;out of 10.</p>
                                    </div>
                                </div><!-- End: some-message -->
                                <!-- Start: Video Link -->
                                <div class="video__link"><a href="in-course-video.html"></a></div><!-- End: Video Link -->
                                <!-- Start: Video Link -->
                                <div class="video__link"><a href="lesson.php?sl='.$row[0].'">
                                        <p class="p-2 video__title"><i class="fa fa-paperclip me-1"></i>Redo Assignment<br></p>
                                    </a></div><!-- End: Video Link -->
                            </div><!-- End: Accordion Content -->
                        </div>
                
                    ';
                    echo $record;
                }
                                                       
            }
        }

    }

    public static function getASubmission($sid=null)
    {
        $seg ='assignmentsubmissions asub, lessons l, users u where asub.lessonid=l.lessonid AND asub.submissionid='.$sid.' AND asub.studentid=u.userid';
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $ss= '"Completed"';

        $sldot='asub.';
        $query = "SELECT * FROM $seg";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            $row = mysqli_fetch_array($result);
            return $row;
        }

    }
    public static function getSong($sid=null)
    {
        
        $conn =  mysqli_connect("localhost", "root", "", "atelis");
        $query = "SELECT * FROM songlyrics where lyricid=$sid";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            $row = mysqli_fetch_array($result);
            return $row;
        }

    }

	public function getCompletedLessons($courseid = null, $uid)
	{
		$seg ='studentlessons sl, lessons l where sl.lessonid=l.lessonid AND';
		$sql = "SELECT * FROM users";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$ss= '"Completed"';

        $sldot='sl.';
        $query = "SELECT * FROM $seg ".$sldot."studentid=$uid AND ".$sldot."courseid= $courseid AND ".$sldot."status=$ss";

        //die ($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
		    	$record='

		    	<div class="card-body" style="color: var(--bs-indigo);background: #42d551;border-bottom-style: inset;border-bottom-color: rgb(255,255,255);">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span style="color: rgb(42,42,42);">TENOR BEGINNER</span>
                            </div>
                            <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0 me-3"><span style="color: rgb(255,255,255);">'.$row['lessonname'].'</span>
                                        </div>
                            		</div>
                            </div>
                        </div>
                        <div class="col-auto"><a href="lesson.php?sl='.$row['lessonid'].'" class="btn" style="background-color: white;" role="button">Open</a><i class="fas fa-check-circle fa-2x text-gray-300" style="color: var(--bs-indigo);"></i></div>
                        </div>
                    </div>

		    	';
		        echo $record;                                     	
            }
        }

	}

	public function getCurrentLesson($courseid, $uid)
	{
		//die($courseid);
		$seg ='studentlessons sl, lessons l where sl.lessonid=l.lessonid AND';
		$sql = "SELECT * FROM users";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$ss ='"Current"';
		$sldot='sl.';
        $query = "SELECT * FROM $seg ".$sldot."studentid=$uid AND ".$sldot."courseid= $courseid AND ".$sldot."status=$ss";
        //die($query);
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
		    	$record='

		    	<div class="card-body" style="color: var(--bs-blue);background: #46aecf;border-bottom-style: outset;border-bottom-color: rgba(103,216,252,0.63);">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-info fw-bold text-xs mb-1"><span style="color: rgb(52,49,49);">TENOR BEGINNER</span></div>
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0 me-3"><span style="color: rgb(255,255,255);">'.$row['lessonname'].'</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><a href="lesson.php?sl='.$row['lessonid'].'" class="btn" style="background-color: white;" role="button">Open</a><i class="typcn typcn-chevron-right-outline fa-2x text-gray-300" style="color: var(--bs-indigo);"></i></div>
                        </div>
                    </div>
		    	';
		        echo $record;                                     	
            }
        }

	}
	public function getLockedLessons($courseid = null, $uid=null, $vr)
	{
		$sldot='sl.';
		$seg ='studentlessons sl, lessons l where sl.lessonid=l.lessonid AND';
		$ss= '"Locked"';
		if ($courseid === 1) {
			$vr='"'.$vr.'"';
			$query = "SELECT * FROM $seg ".$sldot."studentid=$uid AND ".$sldot."courseid= $courseid AND ".$sldot."status=$ss";
			//$query = "SELECT * FROM $seg ".$sldot."studentid=$uid AND ".$sldot."courseid= $courseid AND ".$sldot."status=$ss ".$sldot."lessontype=$vr";
			//die($query);
		}
		else 
		{
			
        	$query = "SELECT * FROM $seg ".$sldot."studentid=$uid AND ".$sldot."courseid= $courseid AND ".$sldot."status=$ss";
		}
		$conn =  mysqli_connect("localhost", "root", "", "atelis");

        
        $result = mysqli_query($conn, $query);
        if(mysqli_query($conn, $query))
        {
            while($row = mysqli_fetch_array($result))
            {
		    	$record='

		    	<div class="card-body" style="color: var(--bs-indigo);background: rgba(205,204,204,0);border-color: var(--bs-indigo);">

                        <div class="row align-items-center no-gutters">
                        <hr>
                            <div class="col me-2">
                                <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>TENOR BEGINNER</span></div>
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0 me-3"><span style="color: rgb(168,170,188);">'.$row['lessonname'].'</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-lock fa-2x text-gray-300" style="color: var(--bs-indigo);"></i></div>

                        </div>

                    </div>
		    	';
		        echo $record;                                     	
            }
        }

	}
	public static function getLesson($lid=null)
	{
		$db=database::getInstance();

		$data= $db->get('lessons', array('lessonid', '=', $lid));
        $count= $db->count();
        if ($count<1) 
        {
        	echo '<h1 style="color:white;">Leson Not Found</h1>';
        }
        else
        {
        	$Lesson= $db->results();
        	return $Lesson[0];

        }
	}
	public function getCount($studentid)
	{
		# code...
	}

	public static function sendLesson($studentid, $message, $sender, $date)
	{
		$db=database::getInstance();

		$db->insert('Lessons', 

		array(
            'studentid'   => $studentid,
            'message'    => $message,
            'sender'     => $sender,
            'status'     => 'unread',
            'Lessondate'    => $date,
            
        ));

        //echo "<script>alert('inserted Lesson')</script>";

	}
}
?>