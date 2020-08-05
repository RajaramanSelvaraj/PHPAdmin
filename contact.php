<?php 
// Pear Mail Library
//require_once "Mail.php";

$errors = '';
$myemail = 'mysarawakhub@gmail.com';
if(empty($_POST['Name'])  || 
   empty($_POST['Message']) || 
   empty($_POST['ToEmailId']))||
   empty($_POST['Department']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['Name']; 
$email_address = $_POST['ToEmailId']; 
$message = $_POST['Message']; 
$department = $_POST['Department']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	
	
	$from = $myemail;
$to = $myemail;
$subject = "Contact form submission: $name";
$body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message \n Department \n $department"; 

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'mysarawakhub@gmail.com',
        'password' => 'Team5036'
    ));

$mail = $smtp->send($to, $headers, $body);



	
	//$to = $myemail; 
	//$email_subject = "Contact form submission: $name";
	//$email_body = "You have received a new message. ".
	//" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message \n Department \n $department"; 
	
	//$headers = "From: $myemail\n"; 
	//$headers .= "Reply-To: $email_address";
	
	//mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	//header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>