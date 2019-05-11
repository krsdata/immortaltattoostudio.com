<!--

http://www.maning.ca/blog/nice-registration-form/

-->


<?php
	define('INCLUDE_CHECK',1);
	require "functions.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>

<link rel="stylesheet" type="text/css" href="demo.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>


</head>

<body>
<h1 align="center">
<br /><br>
Imortal Creative TaTToo Studio Academy</h1> 
<marquee behavior="scroll" scrolldelay="200">Grand opening on 25 March 2015 (50% discount)</marquee>
<div id="div-regForm" style="width:50%; padding-left:20%; padding-bottom:100px;">

<div class="form-title">Sign Up</div>
<div class="form-sub-title">It's free and anyone can join</div>

<form id="regForm" action="submit.php" method="post" style="width:100%">
<table >
  <tbody>
   <tr>
    <td><label for="fname" </label></td>
    <td>  </td>
  </tr>
  <tr>
    <td><label for="fname">First Name:</label></td>
    <td><div class="input-container"><input name="fname" id="fname" type="text" /></div></td>
  </tr>
  <tr>
    <td><label for="lname">Last Name:</label></td>
    <td><div class="input-container"><input name="lname" id="lname" type="text" /></div></td>
  </tr>
  <tr>
    <td><label for="email">Your Email:</label></td>
    <td><div class="input-container"><input name="email" id="email" type="text" /></div></td>
  </tr>
    <tr>
    <td><label for="pass">Phone:</label></td>
    <td><div class="input-container"><input name="phone" id="phone" type="number" min="0" maxlength="10" /></div></td>
  </tr>
  <tr>
    <td><label for="pass">New Password:</label></td>
    <td><div class="input-container"><input name="pass" id="pass" type="password" /></div></td>
  </tr>
 
  <tr>
    <td><label for="sex-select">I am:</label></td>
    <td>
    <div class="input-container">
    <select name="sex-select" id="sex-select">
    <option value="0">Select Sex:</option>
    <option value="1">Female</option>
    <option value="2">Male</option>
    </select>
    </div>
    
    </td>
  </tr>
 <!-- <tr>
    <td><label>Birthday:</label></td>
    <td>
    <div class="input-container">
    <select name="month"><option value="0">Month:</option><?=generate_options(1,12,'callback_month')?></select>
    <select name="day"><option value="0">Day:</option><?=generate_options(1,31)?></select>
	<select name="year"><option value="0">Year:</option><?=generate_options(date('Y'),1900)?></select>
    </div>
    </td>
  </tr>-->
  <tr>
  <td>&nbsp;</td>
  <td><input type="submit" class="greenButton" value="Sign Up" /><img id="loading" src="img/ajax-loader.gif" alt="working.." />
</td>
  </tr>
  
  
  </tbody>
</table>

</form>

<div id="error">
&nbsp;
</div>

</div>

</body>
</html>
