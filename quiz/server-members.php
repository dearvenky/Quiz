<?php

    session_start(); 
    include('data.php'); 
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
 
if (isset($_POST['reg_member'])) 
{
		// receive all input values from the form
		$first= mysqli_real_escape_string($db, $_POST['First_Name']);
		$last= mysqli_real_escape_string($db, $_POST['Last_Name']);
		$mobile= mysqli_real_escape_string($db, $_POST['Mobile_Number']);
		$gender= mysqli_real_escape_string($db, $_POST['Gender']);
		$college= mysqli_real_escape_string($db, $_POST['college']);
		$rollno= mysqli_real_escape_string($db, $_POST['rollno']);
		$branch= mysqli_real_escape_string($db, $_POST['BRANCH']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$sql_e = "SELECT * FROM members WHERE email='$email'";
		$sql_r = "SELECT * FROM members WHERE roll='$rollno'";
		$res_e = mysqli_query($db, $sql_e);
		$res_r = mysqli_query($db, $sql_r);
		// form validation: ensure that the form is correctly filled
		if (empty($first)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		//$reg=$_SESSION['username'];
		// register user if there are no errors in the form
		if(mysqli_num_rows($res_r) > 0)
		{
  		  array_push($errors, "Sorry... roll number already taken"); 	
  		}

		// register user if there are no errors in the form
		if(mysqli_num_rows($res_e) > 0)
		{
  		  array_push($errors, "Sorry... email already taken"); 	
  		}
  		else
  			{
			if (count($errors) == 0) 
			{
				$email=strtolower($email);
			$password = md5($password_1);//encrypt the password before saving in the database
			$query="INSERT INTO members (`first_name`, `roll`, `email`, `mobile`, `branch`, `college`, `password`, `gender`,last_name) VALUES ('$first', '$rollno', '$email', '$mobile', '$branch', '$college', '$password','$gender','$last')";
			mysqli_query($db, $query);
			sendmail($first,$email,$password_1);
			$_SESSION['member'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location:index.php');
			}
		}

	}

function sendmail($name, $email,$password)
 {
    
    date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

/*
 * Server Configuration
 */
$mail->SMTPDebug = 1; 
$mail->Host = 'sg2plcpnl0080.prod.sin2.secureserver.net'; // Which SMTP server to use.
$mail->Port = 25; // Which port to use, 587 is the default port for TLS security.
//$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
//$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.


$mail->SMTPSecure = "none";
$mail->SMTPAuth = false;
$mail->Username = "admin@acumenece.co.in"; // Your Gmail address.
$mail->Password = "18acumen20"; // Your Gmail login password or App Specific Password.

/*
 * Message Configuration
 */

$mail->setFrom('admin@acumenece.co.in', 'ACUMEN ECE'); // Set the sender of the message.
$mail->addAddress($email, $name); // Set the recipient of the message.
$mail->Subject = 'Thank you'; // The subject of the message.
$mail->IsHTML(true);
/*
 * Message Content - Choose simple text or HTML email
 */
$msg='<h4> Dear '.$name.'</h4><br>'.'Thank you for registering for ACUMEN ECE 2K18';
$msg=$msg."<br> Your password: ".$password;

// Choose to send either a simple text email...
$mail->Body = $msg; // Set a plain text body.

// ... or send an email with HTML.
//$mail->msgHTML(file_get_contents('contents.html'));
// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
//$mail->AltBody = 'This is a plain-text message body'; 

// Optional: attach a file
//$mail->addAttachment('images/phpmailer_mini.png');

if ($mail->send()) {
    echo "Your message was sent successfully!";
} else {
    echo "Mailer Error: " . $mail->ErrorInfo;
sleep(5);
}
}
?>