<?php

if (isset($_POST['contact_name']) && isset($_POST['contact_address']) && isset($_POST['contact_text'])) {
	$contact_name = $_POST['contact_name'];
	$contact_address = $_POST['contact_address'];
	$contact_text = $_POST['contact_text'];

	if (!empty($contact_name) && !empty($contact_address) && !empty($contact_text)){

		if (strlen($contact_name)>25 || strlen($contact_address)>50 || strlen($contact_text>1000)){
			echo 'Sorry, maxlenght for some fileds are exceeded.';
		}else{

		$to = 'alex@phpacademy.org';
		$subject = 'This is an email.';
		$body = $contact_text;
		$headers = 'From: '.$contact_address;


	if (@mail($to, $subject, $body, $headers)) {

		echo 'Thanks for contacting us. We\'ll be in touch soon.';
	} else {

		echo 'An error has been occurred. Please try later.';
}

}
} else{
	echo 'All fields are required.';
}
}

?>

<form action="email.php" method="POST">
	Name:<br> <input type="text" name="contact_name" maxlength="50"><br><br>
	Email address:<br> <input type="text" name="contact_address" maxlength="50"><br><br>
	Message: 
	<br><textarea name="contact_text" rows="6" cols="30" maxlength="1000"></textarea><br><br>
	<input type="submit" value="Send">

</form>