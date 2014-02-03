<?php
	require "config.php";
	
	$date = date('Y-M-j');
	$email = $_POST['email'];
	$email = mysql_real_escape_string($email);
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	
	//checking for empty email field
	if($email=='') {
		echo "Error! Email field is empty.";	
		exit;
	}
	
	//checking for valid email
	if(!preg_match($email_exp,$email)) {
		echo "Error! Please enter a valid email.";	
		exit;
	}
	
	//check for existing email
	$sqlc = "SELECT * FROM signup WHERE email= '$email'";
	$result = mysql_query($sqlc);	
	$result= mysql_num_rows($result);
	if ($result>0) {
		echo "Error! You are already signed up.";
		exit;
		}
				
	
	$sql="INSERT INTO signup (email, date) VALUES ('$_POST[email]', '$date')";
	
	if (!mysql_query($sql))
	{
		die('Error! ' . mysql_error());
	}
	else
	{
		echo 'ok';
	}

	$subject = "Kickstarter signup";
	$combined = "email: " . $email;

	$error = '';

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

	$headers  =  'MIME-Version: 1.0' . "\r\n";
	$headers .=  'Content-type: text/html; charset=utf-8' . "\r\n";

	$headers .=  "From: site <".$email."> \r\n";
	$headers .= "Reply-To: $email \r\n";
	$headers .=	'X-Mailer: PHP/' . phpversion();

	$mail_to_send_to = "info@3dprintsexpress.com";				/*sending to*/
	$your_feedbackmail = "noreply@3dprintsexpress.com ";			/*sent from*/

	$a = mail( $mail_to_send_to, $subject, $combined, $headers );

	mysql_close($conn);
?>