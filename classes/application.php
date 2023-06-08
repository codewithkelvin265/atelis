<?php  
/**
 * 

 */
class Application
{
	public $db;
	private $_data;

	function __construct()
	{
		$db=database::getInstance();
	}

	public function getAllApplicants()
	{
		$sql = "SELECT * FROM applications";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");

                                    $query = "SELECT * FROM applications";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_query($conn, $query))
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
								        	$record='

								        					<tr class="appclass">
                                                                <td id="name'.$row['applcationid'].'"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/user.png">'.$row['firstname'].' '.$row['lastname'].'</td>
                                                                <td id="status'.$row['applcationid'].'">'.$row['status'].'</td>
                                                                <td id="email'.$row['applcationid'].'">'.$row['email'].'</td>
                                                                <td><button onclick="sendApplicantValues(this)" class="btn btn-primary" type="button" id="'.$row['applcationid'].'">Select</button>
                                                                <input id="sc'.$row['applcationid'].'" value="'.$row['appliedcourses'].'" type="hidden">
                                                                <input id="dateapplied'.$row['applcationid'].'" value="'.$row['dateapplied'].'" type="hidden">


                                                      

                                                                </td>
                                                            </tr>
									        ';   
									        echo $record;                                     	
                                        }
                                	}

	}
	public function getAllStudents($uid)
	{
		$sql = "SELECT * FROM users where userid!=$uid AND usertype=\"student\"";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");

                                    $query = "SELECT * FROM users where userid!=$uid AND usertype=\"student\"";;
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_query($conn, $query))
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
								        	$record='

								        					<tr class="appclass">
                                                                <td id="name'.$row['userid'].'"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/user.png">'.$row['firstname'].' '.$row['lastname'].'</td>
                                                             
                                                                <td id="email'.$row['userid'].'">'.$row['email'].'</td>
                                                                <td><form action="" method="post"><button onclick="selected(this)" class="btn btn-primary" type="submit" name="cmdAdd" value="'.$row['userid'].'" id="'.$row['userid'].'">Add To Group</button><form>
                                                         

                                                                </td>
                                                            </tr>
									        ';   
									        echo $record;                                     	
                                        }
                                	}

	}
	public function getCount($userid)
	{
		# code...
	}

	public static function submitApplication($firstname, $lastname, $email, $appliedcourses, $date)
	{
		$db=database::getInstance();

		$db->insert('applications', 

		array(
            'firstname'   => $firstname,
            'lastname'    => $lastname,
            'email'     => $email,
            'appliedcourses' => $appliedcourses,
            'status'     => 'pending',
            'dateapplied'    => $date
        ));

        //echo'<script>alert("here")</script>';

        //echo "<script>alert('submitted application')</script>";

	}
}
?>
