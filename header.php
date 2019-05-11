<?php 
error_reporting(0);
        //define('HOST_NAME','localhost');
	//define('USER_NAME','immortal_user');
	//define('PASSWORD','@123!user@');
	//define('DATABASE_NAME','immortal_db'); 

mysql_connect('localhost','immortal_user','@123!user@');
mysql_select_db('immortal_db');
 
$sql2 = mysql_query("select * from keyword");
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>
  	 Immortal Creative Tattoo Studio & Academy Indore | Tattoo academy | Best tattoo in indore  | Tattoo near Palasiya | Tatto near 56 dukan | immortaltattoo | immortaltattooistudio.com | ictsa | Immortal tattoo indore
   </title>
  <meta name="msvalidate.01" content="B2AA87E04E1D5A187082DA1923F0A963" />
  <meta name="google-site-verification" content="eSYk1d-GlGyh1vA74_W4FNMdJjHS_AkHMCcifAiOZBo" />
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta http-equiv="cache-control" content="private"/>
  <meta content="all" name="robots" /> 
  <meta name="language" content="EN" />
  <meta name="robots" content="index, follow" />  
  <meta name="revisit-after" content="2 days" />
  <?php 
	   $s = "";
		while($row2=mysql_fetch_array($sql2))
		{
		  $s = $s.','.$row2['keyword'];
		} 
		
	?>
  <meta name="keywords" content="<?php echo ltrim($s,',');  ?>">
  <meta name="description" content="Immortal Creative Tattoo Studio & Academy Indore. First Tattoo artist in mp indore. I am Dina-Karan from Bangalore, I have 6 years experience in tattoo field I love to do larger black & gray pieces as well as crazy color blending">
  <meta name="copyright" content="http://ictsatattooindore.com" />
  <meta name="author" content="Immortal Creative Tattoo Studio & Academy">
  <meta name="document-classification" content="Internet" />
  <meta name="document-type" content="Public" />
  <meta name="document-rating" content="Safe for Kids" />
  <meta name="document-distribution" content="Global" />
  <link rel="stylesheet" type="text/css" href="style/menu.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/jcarousel.responsive.css">
   <!-- <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">-->
	  
	<script src="js/jquery.min.js"></script> 
	<script src="js/bootbox.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script> 
	 
 
	<style>
	.page-title {
    color: #fff;
    font-family: "blackchanceryregular";
    font-size: 28px;
    margin: 25px 0;
    text-align: center;
}
.faq-main {
  color: #ffffff;
  font-family: blackchanceryregular;
  font-size: 19px;
  margin: 20px auto 0;
  padding-bottom: 30px;
  width: 980px;
  text-align:justify;
}
p.fq {
  color: rgb(190, 163, 118);
  font-size: 19px;
  margin: 12px 0;
}
p.fa{font-size: 16px;}
.footer {
  background: url("images/footer-bg.jpg") repeat-x scroll 0 0 rgba(0, 0, 0, 0);
  height: 70px;
  margin: 0 auto;
  width: 100%;
  margin-top: 10px; 
  float: left;
  }
	</style>
	
	
</head>
<body >
<!--<div  style="position:fixed; left:0px"> <img src="img/logo.png" width="60"></div>
<div  style="position:fixed; right:0px"> <img src="img/logo.png" width="60"></div>
-->
<div style="display:none">Immortal tattoo studio</div>
<div class="main-container">
   <div class="panel-1"  style="width:100%;" >
   <div style="width:950px; margin:0 auto;  text-align:center">
    <nav >
   <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About Us</a></li>
   <!-- <li><a href="#">Services</a></li>-->
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="#">Training</a>
      <ul>
	     <li><a href="tattoo-training.php">Tattoo Trainig</a></li>
        <li><a href="Piercing-Course.php">Piercing Course</a></li>
        <li><a href="nail-art.php">Nail Art</a></li>
        <li><a href="mehndi-art.php">Mehendi Art</a>
        <li><a href="Permanent-Cosmetic.php">Permanent Cosmetic</a>
         </li> 
        <li><a href="drawing.php">Drawing & Sketches</a> 
        </li>
      </ul>
    </li>
    <li><a href="/faq.php">FAQ</a></li>
    <li><a href="/contact.php">Contact us</a></li>
   </ul> 
   </nav>
   </div>
  </div>
<div class="panel-2" >
<div class="title1" style="margin:0 auto; width:950px" align="center">
<img src="images/logo1.png" width="479">
</div>
    </div>