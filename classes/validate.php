<?php
/**
 * 
 */
global $message;
$message= " I love Php";
class Validate
{
	private $_passed=false,
			$_errors=array(),
			
			$_db =  null;
	
	

	public function __construct()
	{
		$this->_db = database::getInstance();
	}

	public function check($source, $items = array())
	{
		foreach ($items as $item => $rules) 
		{
			foreach ($rules as $rule => $rulevalue) 
			{
				//echo "{$item} {$rule} must be {$rulevalue}"."<br>";
				$value =trim($source[$item]);
				$item = escape($item);
				//echo $value. "<br>";

				if ($rule==='required' && empty($value)) 
				{
					$this->addError("{$item} is required");
				}
				elseif(!empty($value))
				{
					switch ($rule) {
						case 'min':
							if (strlen($value)< $rulevalue) 
							{
								$this->addError("{$item} must be a minimum of {$rulevalue} characters");
								echo'<script>displayErrMsg('."{$item} must be a minimum of {$rulevalue} characters".')</script>';
								

								
							}
							break;

						case 'max':
							if (strlen($value)> $rulevalue) 
							{
								$this->addError("{$item} must be a maximum of {$rulevalue} characters");
								
							}
							break;

						case 'matches':
							if ($value !=$source[$rulevalue]) 
							{
								$this->addError("{$rulevalue} must match {$item}");
							}
							break;
						case 'unique':
							//$strphone=ltrim($value, '0');
        					//$phone='+265'.$strphone;
							$check = $this->_db->get($rulevalue, array('email', '=', $value));
							if ($check->count()) 
							{
								$this->addError("{$item} already exists on the network.");
							}
							break;
						case 'uniqueApplicant':
							$check = $this->_db->get('applications', array('email', '=', $value));
							if ($check->count()) 
							{
								$this->addError("An aplication connected to this email has already been sent.");
							}
							break;
						case 'validPhone':
							$strphone=ltrim($value, '0');
							if (strlen($strphone)>9 || strlen($strphone)<9 ) 
							{
								$this->addError("Phone Number is Invalid.");
							}
							break;
						case 'strongPassword':
							$uppercase= preg_match('@[A-Z]@', $value);
							$lowercase= preg_match('@[a-z]@', $value);
							$number= preg_match('@[0-9]@', $value);
							$specialcharacters= preg_match('@[^\w]@', $value);

							if (!$uppercase || !$lowercase || !$number || !$specialcharacters || strlen($value) < 8 ) 
							{
								$this->addError("Password should be at least 8 characters long and should include at least one uppercase letter, one number and one special character.");
							}
							break;
						case 'correctPassword':
							
							if ($_SESSION['user_password'] !== Hash:: make($value, $_SESSION['user_salt'])) 
							{
								$this->addError("You have entered incorrect current password.");
							}
							break;
						case 'validName':
							$number= preg_match('@[0-9]@', $value);
							$specialcharacters= preg_match('@[^\w]@', $value);

							if ($number || $specialcharacters ) 
							{
								$this->addError("A name cannot contain any numbers or special characters.");
							}
							break;
						case 'phoneexists':
							$check = $this->_db->get($rulevalue, array('phone', '=', $value));
							if (!$check->count()) 
							{
								$this->addError("The phone number you entered does not exist on the network.");
							}
							break;

						case 'balancecheck':
							$data= $this->_db->get('users', array('phone', '=', $rulevalue));
            
				            if ($data->count()) 
				            {
				              
				              $uid=$data->getID();
				            }
							$balance = $this->_db->getAccountObj($uid)->balance;
							if ($value>$balance) 
							{
								$this->addError("You have insufficient funds to complete this transaction.");
							}
							break;
						case 'transactionfee':
							$data= $this->_db->get('users', array('phone', '=', $rulevalue));
            
				            if ($data->count()) 
				            {
				              
				              $uid=$data->getID();
				            }
							$balance = $this->_db->getAccountObj($uid)->balance;

							$transactionFee=$value*(5/100);
							
							$finalfee=$value + $transactionFee;
							if ($finalfee>$balance) 
							{
								$this->addError("This transaction requires a small fee deduction.");
							}
							break;	

						case 'checkagent':
							$data= $this->_db->get('users', array('phone', '=', $rulevalue));
            
				            if ($data->count()) 
				            {
				              
				              $uid=$data->getID();
				              $usertype = $this->_db->getUserObj($uid)->usertype;
								//echo'<script>alert("'.$usertype.'");</script>';
				            }

							if ($usertype==='Customer' || $usertype==='Super Agent') 
							{
								$this->addError("Sorry that phone number does not belong to an agent.");
							}
							break;

						case 'checkcustomer':
							$data= $this->_db->get('users', array('phone', '=', $rulevalue));
            
				            if ($data->count()) 
				            {
				              
				              $uid=$data->getID();
				              $usertype = $this->_db->getUserObj($uid)->usertype;
								//echo'<script>alert("'.$usertype.'");</script>';
				            }

							if ($usertype==='Agent' || $usertype==='Super Agent') 
							{
								$this->addError("Sorry that phone number does not belong to a Customer.");
							}
							break;	

						case 'hasLoan':
							$data= $this->_db->get('users', array('phone', '=', $rulevalue));
            
				            if ($data->count()) 
				            {
				              
				              $uid=$data->getID();
				              $hasLoan = $this->_db->getUserObj($uid)->hasloan;
								//echo'<script>alert("'.$usertype.'");</script>';
				            }

							if ($hasLoan>0) 
							{
								$this->addError("Subscriber already has a loan. Please settle it first.");
							}
							break;	

						case 'loanAmount':
							
							if ($rulevalue>10000 || $rulevalue<1000) 
							{
								$this->addError("Sorry a loan must be between K1,000 - K10,000.");
							}
							break;	
					}
				}
			}
		}
		if (empty($this->_errors)) 
		{
			$this->_passed=true;
		}
		return $this;
	}

	private function addError($error)
	{
		$this->_errors[]=$error;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}

	public function showErrorMessage()
	{
		global $message;

		echo $message;
		//echo'<script>msg="Message from PHP";</script>';
		//echo "<p"." id=".'"errmsg"'.">"."message"."</p>";

		/*echo '<script>function displayErrMsg() {
        var target= document.getElementById("errmsg");
        target.innerText="'.$this->_message.'"; 
        //target.style.display="none"; 
        }
        displayErrMsg();</script>';*/
	}

	public function addErrorMessage($string)
	{
		global $message;
		$message = $string;
		
	}
}