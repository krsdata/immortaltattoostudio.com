<?php include_once('header.php'); ?>
<style>
.gm-style-iw{ position: absolute; left: 15px; width: 326px; font-family: serif !important; top: 9px; font-size: 17px !important; color:#333333 !important; }
</style>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>
<script>

var myCenter=new google.maps.LatLng(22.723698,75.882423);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:'<div style="overflow: auto; font-family: serif; font-size: 17px;"><br><b>Immortal Creative Tattoo Studio & Academy</b> <br><br> Address :  Lg-1, Diamond Colony, Opp Bansi Trade Center, <br> MG Road, Indore 452001(MP) <br> Phone : 091799 97492</div>'
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

	<div class="panel-3" style="height:auto">
		<div class="faq-main">
			<h2 class="page-title">Reach Us</h2>
			 <div class="c1">
			   	 <div class="c2">
			     <!-- <div id="googleMap" style="width:100%;height:380px;"></div> -->
			     <p> 3D View of Immortal tattoo Studio</p>
			      <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2s!4v1493443566580!6m8!1m7!1s-oiqd2gJq5AAAAQ8sTWGog!2m2!1d22.72367200923838!2d75.88243623921687!3f142.29035794082898!4f27.577502729308577!5f0.6005546584629357" width="100%" height="480px" frameborder="0" style="border:0" allowfullscreen></iframe>
			    </div>
			  
			     </div>
			      <div class="c2">
			          <p>Address</p>
			           <div id="googleMap" style="width:100%;height:380px;"></div> 
			     </div>
			 </div>
		 	
        </div>
	</div> 
	<div class="panel-3" style="height:auto; margin-left:12%; "> 
	<p sty="font-size:20px">Immortal Creative Tattoo Studio & Academy  </p>
<p style="line-height:25px">
<b>Address : </b> <br>
Prosperity building, LG1 diamond colony opposite bansi trade centre, <br>
Mg road, landmark janjeerwala square, Indore (MP) <br>
Call us, 07314222237, 9179997492</p>
	
	</div>

<?php include_once('footer.php'); ?>
