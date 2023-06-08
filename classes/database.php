<?php  
/**
 * 
 */
class database 
{
	private static $_instance = null;
	private 
	$_pdo, 
	$_query, 
	$_error, 
	$_results,
	$_count=0;

	private function __construct()
	{
		try 
		{
			$this->_pdo = new PDO('mysql:host=' .config::get('mysql/host') . ';dbname=' .config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password') ); 

		} 
		catch (PDOException $e) 
		{
			die($e->getMessage());
		}
	}

	public static function getInstance()
	{
		if (!isset(self::$_instance))
		{
			self::$_instance= new database();
		}
		return self::$_instance;
	}

	public function query ($sql, $params = array())
	{
		$this->_error =false;
		if ($this->_query=$this->_pdo->prepare($sql)) 
		{
			$i=1;
			if (count($params)) {
				foreach ($params as $param) {
					$this ->_query->bindValue($i, $param);
					$i++;
				}
			}
			if ($this->_query->execute()) 
			{
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count=$this->_query->rowCount();
			}
			else
			{
				$this->_error=true;
			}
		}
		return $this;
	}


	public function action($action, $table, $where=array())
	{
		if (count($where)===3) 
		{
			$operators= array('=', '>', '<', '>=', '<=');

			$field		=$where[0];
			$operator	=$where[1];
			$value		=$where[2];
			//echo "<br>". $value;

			if (in_array($operator, $operators)) 
			{
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if (!$this->query($sql, array($value))->error()) 
				{
					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}

	public function getNotificationCount($userid)
	{
		$sql = "SELECT notificationid FROM notifications WHERE  userid={$userid} AND status='unread'";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) < 1)
            {
                return false;                
            }
            else
            {
                if($row = mysqli_fetch_assoc($result))
                {
                	//echo'<script>alert("unread notifications")</script>';

                	return mysqli_num_rows($result);
                }
            }
	}

	public function getGraphDetails($userid)
	{
		$sql = "SELECT amount, transactiondate FROM transactions WHERE  userid={$userid} AND (type='Bundle Subscription' OR type='Airtime Purchase' OR type='Boosta Airtime Purchase' OR type='Transfered Funds' OR type='Withdrawal')order by transactiondate asc";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) < 1)
            {
                return false;                
            }
            else
            {
            	$dataPoints = array();
            	$count=0;
            	while($row = mysqli_fetch_array($result))
                {
                	$num=$row["amount"];
                	$tdate=$row["transactiondate"];
                	
					array_push($dataPoints, array("label" => $tdate,  "y" => $num));
						

                }
                //print_r($dataPoints);
                //$_SESSION['dataPoints']=$dataPoints;
                return $dataPoints;
                
                
                
            }
	}

	public function getAllUsers()
	{
		$sql = "SELECT * FROM users";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");

                                    $query = "SELECT * FROM users";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_query($conn, $query))
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
								        	$record='
									            <tr>
									            	<td style="background-color: rgb(1, 2, 3, 0.7);">'.'AM'.$row['userid'].'</td>
									                <td>'.$row['firstname'].'</td>
									                <td style="background-color: rgb(1, 2, 3, 0.7);">'.$row['lastname'].'</td>
									                <td >'.$row['phone'].'</td>
									                <td style="background-color: rgb(1, 2, 3, 0.7);">'.$row['usertype'].'</td>
									                <td style="background-color: rgb(1, 2, 3, 0.7);">'.$row['joined'].'</td>
									                <td style="">'.'<form action="" method="POST"><button style="background-color:red;" name="cmdDelete">Delete</button><input name="idHolder" type="hidden" value="'.$row['userid'].'"/></form>'.'</td>
									                
									                </tr>
									        ';   
									        echo $record;                                     	
                                        }
                                	}

	}
	public function getSongID($title, $sid, $date)
	{
		$sql = "INSERT INTO songlyrics (studentiD, title, datecreated) VALUES ('$sid', '$title', '$date');";
		//die($sql);
		$conn =  new mysqli("localhost", "root", "", "atelis");
		if ($conn->query($sql) === TRUE)
		{
			$last_id = $conn->insert_id;
			return $last_id;
		}
		else
		{
			echo $conn->error;
		}
		$conn->close();
		
	}
	public function getSongID2($lyrics, $sid, $date)
	{
		$sql = "INSERT INTO songlyrics (studentiD, lyrics, datecreated) VALUES ('$sid', '$lyrics', '$date');";
		//die($sql);
		$conn =  new mysqli("localhost", "root", "", "atelis");
		if ($conn->query($sql) === TRUE)
		{
			$last_id = $conn->insert_id;
			return $last_id;
		}
		else
		{
			echo $conn->error;
		}
		$conn->close();
		
	}
	public function getcollabID($sid, $cid, $date)
	{
		//echo'<script>alert("here")</script>';
		$sql = "INSERT INTO collaborations (lyriciD, songowner, datecreated) VALUES ('$sid', '$cid', '$date');";
		//die($sql);
		$conn =  new mysqli("localhost", "root", "", "atelis");
		if ($conn->query($sql) === TRUE)
		{
			
			$last_id = $conn->insert_id;
			return $last_id;
		}
		else
		{
			echo $conn->error;
		}
		$conn->close();
		
	}

	public function getNotifications($userid)
	{
		$sql = "SELECT * FROM notifications WHERE userid={$userid} SORT BY DATE DESC";
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$result = mysqli_query($conn, $sql);

           
                
                	echo'<script>alert("notifications found")</script>';
                	echo'<script>alert("'.$result["message"].'")</script>';
        return $result;
                
          
	}

	public function getID()
	{
		$obj= $this->results()[0];
		return $obj->userid;
	}

	public function getUserObj()
	{
		$obj= $this->results()[0];
		return $obj;
	}

	public function getAppObj($uid)
	{
		$obj= $this->get('Applications', array('applcationid', '=', $uid));
		$acc=$obj->firstrecord();
		return $acc;
	}

	public function delete($table, $where)
	{
		return $this->action('DELETE ', $table, $where);
	}
	public function deleteRecord($table, $place, $value)
	{
		$sql = "DELETE FROM {$table} WHERE {$place}=\"{$value}\"";
		//die($sql);
		$conn =  mysqli_connect("localhost", "root", "", "atelis");
		$result = mysqli_query($conn, $sql);
	}

	public function insert($table, $fields = array())
	{
		if (count($fields))
		{
			
			$keys=array_keys($fields);
			$values=null;
			$i=1;

			foreach ($fields as $field ) 
			{
				//echo $field."<br>";
				$values.="?";

				if ($i< count($fields))
				{
					$values.= ', ';
				}
				$i++;
			}


			$sql ="INSERT INTO {$table}(`".implode('`, `', $keys)."`) VALUES ({$values})";
			//echo $sql;
			
			if (!$this->query($sql, $fields)->error()) {

				return true;
			}
		}
		return false;
	}

	public function update($table, $id, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE {$table} SET {$set} WHERE userid={$id}";
		//echo'<script>alert("'.$sql.'")</script>';

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}
	public function updateAny($table, $idname, $id, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE {$table} SET {$set} WHERE {$idname}={$id}";
		//echo'<script>alert("'.$sql.'")</script>';

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}


	public function updateAccount($table, $id, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE {$table} SET {$set} WHERE accountholder={$id}";
		//echo'<script>alert("'.$sql.'")</script>';
		

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function updateNotification( $id, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE notifications SET {$set} WHERE userid={$_SESSION['user_id']} AND notificationid={$id}";
		//echo'<script>alert("'.$sql.'")</script>';
		

		if (!$this->query($sql, $fields)->error()) {
			if ($value==='unread') {
				$_SESSION['NoOfNotifications']--;
			}
			
			return true;
		}

		return false;
	}

	public function updateLesson( $sid, $lid, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE studentlessons SET {$set} WHERE studentid={$sid} AND lessonid={$lid}";
		//echo'<script>alert("'.$sql.'")</script>';
		

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function updateUser($table, $id, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE {$table} SET {$set} WHERE userid={$id}";
		//echo'<script>alert("'.$sql.'")</script>';
		

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function verifyUser($table, $phone, $fields)
	{
		$set = '';

		$i=	1;

		foreach ($fields as $name => $value) 
		{

			$set .="{$name}= ?";

			if ($i< count($fields)) {
				$set .= ', ';
				
			}
			$i++;
		}

		

		$sql ="UPDATE {$table} SET {$set} WHERE phone={$phone}";
		//echo'<script>alert("'.$sql.'")</script>';
		

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function error()
	{
		return $this->_error;
	}

	public function count()
	{
		return $this->_count;
	}

	public function results()
	{
		return $this->_results;
	}

	public function firstrecord()
	{
		return $this->results()[0];
	}


}