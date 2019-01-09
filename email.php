<?php
$errors = '';
$myemail = 'ebrnc@yahoo.com';//<-----Put Your email address here.
if(empty($_POST['fname'])  ||
   empty($_POST['lname']) ||
   empty($_POST['email'])) ||
   empty($_POST['subject'])
{
    $errors .= "\n Error: all fields are required";
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email_address = $_POST['email'];
$message = $_POST['subject'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail;
	$email_subject = "Contact form submission: $fname $lname";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $fname $lname \n Email: $email_address \n Message \n $message";



	mail($to,$email_subject,$email_body);
	//redirect to the 'thank you' page
	header('Location: index.html');
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
