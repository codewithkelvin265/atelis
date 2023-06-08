

 <?php  
/**
 * 
 */
class User
{
	private $_db;
	private $_data;
	private $_sessionName;

	private $_isLoggedIn;

	function __construct($user= null)
	{
		$this->_db=database::getInstance();
		$this->_sessionName=Config::get('session/sessionname');

		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user=Session::get($this->_sessionName);

				if ($this->find($user)) 
				{
					$this->_isLoggedIn=true;
				}
				else
				{

				}
			}
			else
			{
				$this->find($user);
			}
		}
	}

	public function create($fields = array())
	{
		if (!$this->_db->insert('users', $fields)) 
		{
			throw new Exception("There was a problem creating an account");
			
		}
	}
	public function find($user = null)
	{
		if ($user) 
		{
			
			$field = 'email';
			
			$data= $this->_db->get('users', array($field, '=', $user));
			
			if ($data->count()) {
				
				$this->_data=$data->firstrecord();
				return true;
				
			}
		}
		return false;
	}

	public function login($email= null, $password = null)
	{

		$user =$this->find($email);
		//print_r($this->_data);
		
		if ($user) {
			
			if ($this->data()->password === Hash:: make($password, $this->data()->salt)) 
			{
				
				Session::put($this->_sessionName, $this->data()->userid);

				$_SESSION['user_name']= $this->data()->firstname." ".$this->data()->lastname;
				$_SESSION['user_fname']= $this->data()->firstname;
				$_SESSION['user_lname']= $this->data()->lastname;
				$_SESSION['username']= $this->data()->username;
				$_SESSION['user_password']= $this->data()->password;
				$_SESSION['user_salt']= $this->data()->salt;
          		$_SESSION['user_id']= $this->data()->userid;
          		$_SESSION['user_email']= $this->data()->email;
          		$_SESSION['user_type']= $this->data()->usertype;
          		$_SESSION['user_verified']= $this->data()->verified;
          		$_SESSION['user_locked']= $this->data()->locked;
          		$_SESSION['user_attempts']= $this->data()->attempts;
          		$_SESSION['user_loggedin']= true;
          		$_SESSION['user_registered']= true;
          		$_SESSION['emailToVerify']= $this->data()->email;
          		$_SESSION['user_email']= $this->data()->email;

          		$_SESSION['NoOfNotifications']= $this->_db->getNotificationCount($_SESSION['user_id']);
          		
				
				return true;
			}
		}
		return false;

	}
	public function logout()
	{
		Session::delete($this->_sessionName);
	}

	public function data()
	{
		return $this->_data;
	}

	public function isLoggedIn()
	{
		return $this->_isLoggedIn;
	}

	public function updateUser($userid, $field)
	{

		$this->_db->updateUser('users', $userid, $field);
		
	}
}


 ?>