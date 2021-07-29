<?php 
$errors = '';
$myemail = 'cameronhirbodi@outlook.com';//<-----Put Your email address here.
if(empty($_POST['firstname'])  || 
   empty($_POST['lastname']) || 
   empty($_POST['attendance']) || 
   empty($_POST['email']) || 
   empty($_POST['guests']) || 
   empty($_POST['food']) || 
   empty($_POST['comments']))
{
    $errors .= "\n Error: all fields are required";
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$attendance = $_POST['attendance'];
$email = $_POST['email'];
$guests = $_POST['guests'];
$guests = $_POST['guests'];
$food = $_POST['food'];
$comments = $_POST['comments'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $firstname $lastname";
	$email_body = "You have received a new message. ".
	" Here are the RSVP details:\n First name: $firstname \n Last name: $lastname \n Attending: $attendance \n Email: $email \n Guests: $guests \n Food restrictions: $food \n Comments: $comments"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: rsvp-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>RSVP form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>