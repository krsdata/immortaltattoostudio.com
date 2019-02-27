<?php
$to = "bvbv@mailinator.com";
$subject = "My subject";
$txt = "Hello world!";

 
   $headers  = "From: info@immortaltattoostudio.com\r\n";
    
    $headers .= "X-Mailer: PHP".phpversion();
	$headers .= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1';

$m = mail($to,$subject,$txt,$headers);

var_dump($m);
?> 