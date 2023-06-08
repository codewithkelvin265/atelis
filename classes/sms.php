<?php

/**
 * 
 */
class SMS
{
	
	public function sendSMS($phonenum, $OTP)
	{
		//echo'<script>alert("ndili ku sms kuja")</script>';
		// Authorisation details.
		$username = "kelvin.s.msiska@gmail.com";
		$hash = "1e4da3a05fa6930a909b78c97bafb418602f209d386478a34476428f18960dbc";

		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "ACC"; // This is who the message appears to be from.
		$numbers = $phone; // A single number or a comma-seperated list of numbers
		$message = "Verification Code is ".$OTP.".";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.txtlocal.com/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);

		if (!$result) {
			echo'<script>toastr.info("message not sent")</script>';
		}
		else
		{
			$kaya= $numbers." ". $message;
			echo'<script>alert("'.$kaya.'")</script>';
			echo'<script>toastr.info("message sent")</script>';
		}
	}


	public function sendOzekiSMS($phone, $OTP)
	{
		########################################################
		# Login information for the SMS Gateway
		########################################################

		$ozeki_user = "admin";
		$ozeki_password = "admin";
		$ozeki_url = "http://127.0.0.1:9500/api?";

		########################################################
# Functions used to send the SMS message
########################################################
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: Ozeki PHP client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}



function ozekiSend($phone, $msg, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype=SMS:TEXT';
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($msg);

      $urltouse =  $ozeki_url.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }

      return($response);
		}

		########################################################
		# Send Message
		########################################################

		$message = "Your Verification Code is ".$OTP.".";
		$debug = true;

		ozekiSend($phonenum,$message,$debug);
	}

	public function generateOTP()
	{
		$otp=rand(100000, 999999);
		return $otp;
	}


}



 ?>