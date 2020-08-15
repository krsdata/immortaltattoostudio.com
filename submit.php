<?php
// we check if everything is filled in
// is the sex selected?
if(!(int)$_POST['sex-select'])
{
	die(msg(0,"You have to select your sex"));
}

// is the birthday selected?

if(!(int)$_POST['phone'] )
{
	die(msg(0,"Enter 10 digit mobile number"));
}


// is the email valid?

if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email'])))
	die(msg(0,"You haven't provided a valid email"));



// Here you must put your code for validating and escaping all the input data,
// inserting new records in your DB and echo-ing a message of the type:

// echo msg(1,"/member-area.php");

// where member-area.php is the address on your site where registered users are
// redirected after registration.
if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass']) || empty($_POST['phone']))
{
	die(msg(0,"All the fields are required"));
}
else{
    $subject  = "new user sign up";
	$message = "Name: ".$_POST['fname'].' '.$_POST['lname'].'<br>';
	$message .= "email: ".$_POST['email'].'<br>';
	$message .= "phone: ".$_POST['phone'].'<br>';
	$rs = mail("immortaltattoostudio@mailinator.com",$subject ,$message);
		if($rs)
		{
			echo msg(1,"registered.html");
		}else
		{
			die(msg(0,"Something went wrong !"));
		}
	} 

function msg($status,$txt)
{
	return '{"status":'.$status.',"txt":"'.$txt.'"}';
}
?>
