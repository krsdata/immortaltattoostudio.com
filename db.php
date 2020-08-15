<?php 

mysql_connect('localhost','immortal_user','@123!user@');
mysql_select_db('immortal_db');

if($_POST)
{
	 $interest_in = implode(',',$_POST['interest']);
	 $str = "insert into subscribe set name = '".$_POST['name']."',email = '".$_POST['email']."',phone = '".$_POST['phone']."',comments = '".$_POST['comments']."',interest_in= '".$interest_in."'";
	 $rs = mysql_query($str);
	 if($rs)
	 {
	 	// create email headers
		$$email_from = "kroy.iips@gmail.com";
		$email_message = "message";
		$headers = 'From: '.$email_from."\r\n".
		
		'Reply-To: '.$email_from."\r\n" .
		
		'X-Mailer: PHP/' . phpversion();
		
		@mail($email_to, $email_subject, $email_message, $headers);  
		echo '1';
	 }else
	 {
	 	echo 0;
	 }
}

?>