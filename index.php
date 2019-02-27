<?php include_once('header.php'); ?>
<style>
 
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 0px; /* Location of the box */
  left: 0;
  top: 0;
   
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
  //  width: 100%;
  }
}
</style>
 	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
  	<script type="text/javascript" src="js/jcarousel.responsive.js"></script> 
<div class="panel-3" style="height:500px">
	<div class="get_tattoo_deserv" style="width:980px">
		<div style="float:left; margin-top:-100px; margin-right:10px; margin-left:-50px" > 
			<img src="images/final13.png" width="500"  height="600"/>
		</div>
	 

			<div class="get_tattoo" align="right" style="width:450px; margin-right:0px;">
			<img width="401" height="111" src="images/get_tattoo.jpg">
				<div class="jcarousel-wrapper" style="width:458px; padding:10px; padding-right:0px; ">
                <div class="jcarousel">
                    <ul>
                        
                        <li><img src="images/003.jpg" alt="immortal tattoo"></li>
                            
                
                        <li><img src="images/004.jpg" alt="Image 5"></li>
                        <li><img src="images/005.jpg" alt="Image 5"></li>
                        <li><img src="images/001.jpg" alt="Image 1"></li>
                       
                        <li><img src="images/002.jpg" alt="Image 3"></li>
                     
                    </ul>
                </div> 

                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>

                <!-- <p class="jcarousel-pagination"></p> -->
            </div>
			<div align="justify" style="font-family:BlackChancery;color:#FFFFFF; font-size:17px;">
			 The company's main focus is tattooing, but artists work in other mediums such as: Tattoo Training, Nail Art, Permanent cosmetic make-up, charcoal, pencil drawings, and Mehndi.We are a artists with a full range of talents, whose specialty is keeping customers happy.
			<a href="about.php">Read More..</a>
			</div>
			<div>  
			<a href="https://www.facebook.com/immortalcreativestudio" target="_blank"><img src="img/f3.png" width="48" /></a>
			<a href="https://plus.google.com/+DinaKaranimmortalcreativetattoostudio" target="_blank"><img src="img/g6.png" width="48" /></a>
			<a href="https://twitter.com/Karan_Immortal"><img src="img/t4.png" width="48" /></a>

			</div>
			</div>	
			</div>
		</div>
		
		<div class="panel-4">
		 	
		</div>
		
		<div class="our-tattoo panel-5">
			<span style="color:rgb(134, 107, 86);">Our </span>  Tattoos </span> <span style="font-family: blackchancery; font-size: 30px;"> (First tattooist in MP)</span> 
		</div>
		<div class="abt-tattoo">
			<p align="justify" style="font-size:x-large">
				 I am Dina-Karan from Bangalore, I have <b>11 years </b> experience in tattoo field I love to do larger black & gray pieces as well as crazy color blending. I give 110% on every tattoo no matter how big or small it may be. my customers satisfaction is my main focus and I want to help you design your tattoo and take your idea to the next level. Behind and your imagination, the job is watching your excitement the first time you look at your new tattoo in the mirror.
			</p>
		</div>
		
		<div class="panel-6">
				<a href="gallery.php"><p align="right" class="go-to-gall"> <strong style="color: rgb(255, 255, 255);">GO TO OUR</strong> <strong style="color: rgb(185, 148, 122);">GALLERY </strong></p></a>
		</div>
<?php include_once('footer.php'); ?>	


	
	 <link rel="stylesheet" href="style/bootstrap.css">
 <script type="text/javascript"> 
		  
		   $(document).ready(function() {
		   
		  	  bootbox.dialog({
                title: "Subscribe ( <span style='color:green'> Flat 50% Discount on religeous Tattoo)</span>",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal" id="subs" method="post" action=""> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Name</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md" required> ' +
					'</div> ' +
                    '</div> ' + 
					 '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Email</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="email" name="email" type="text" placeholder="Your Email" class="form-control input-md" required> ' +
					'</div> ' +
                    '</div> ' + 
					 '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Phone</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="phone" name="phone" type="text" placeholder="Your Phone" class="form-control input-md" required> ' +
					'</div> ' +
                    '</div> ' + 
					 '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Comments( If any )</label> ' +
                    '<div class="col-md-4"> ' +
                    '<textarea id="comments" name="comments"   placeholder="Your comments" class="form-control input-md" required></textarea> ' +
					'</div> ' +
                    '</div> ' + 
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="awesomeness">You interested in ?</label> ' +
                    '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                    '<input type="checkbox" name="checkbox1[]" id="awesomeness-0" value="Want Tattoo" checked="checked"> ' +
                    'Want Tattoo </label> ' +
                    '</div><div class="radio"> <label for="awesomeness-1"> ' +
                    '<input type="checkbox" name="checkbox1[]" id="awesomeness-1" value="Tattoo course"> Tattoo course </label> ' +
                    '</div> <div class="radio"> <label for="awesomeness-1"> ' +
					 '<input type="checkbox" name="checkbox1[]" id="awesomeness-1" value="Learn Tattoo"> Learn Tattoo</label> ' +
                    '</div><div class="radio"> <label for="awesomeness-1"> ' +
					 '<input type="checkbox" name="checkbox1[]" id="awesomeness-1" value="Just love Tattoo"> Just love Tattoo</label> ' +
                    '</div></div> </div>' +
                    '</form> </div>  <div class="Error" align="center" style="color:rgb(100,112,125)"><b>To avail discount please subscribe.</b> For more details call us @ +91-9179997492</div> </div>',
                buttons: {
                    success: {
                        label: "Submit",
                        className: "btn-success",
                        callback: function () {
                            var name = $('#name').val().trim();
							var email = $('#email').val().trim();
							var phone = $('#phone').val().trim();
                            var answer = $("input[name='checkbox']:checked").val();
											  
							var values = new Array();
							$.each($("input[name='checkbox1[]']:checked"), function() {
							  values.push($(this).val());
							  });
						   
							var subs =  $('#subs').serialize();
							 if(name.length==0)
							 {
							 	$('#name').after('<div class="Errorname" align="center" style="color:red"></div>');
								$('.Errorname').html('Please enter name').show();
								return false;
							 }else{
							 	$('.Errorname').hide();
							 }
							 if(email.length==0)
							 {
							 	//$('#email').css('color','red').after('Please enter your email id');
								$('#email').after('<div class="Erroremail" align="center" style="color:red"></div>'); 
								$('.Erroremail').html('Please enter email').show();
								return false;
							 }else
							 {
							 	$('.Erroremail').remove();
								
								 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 								 var e = emailReg.test(email);
								 if(!e)
								 {
								 	$('#email').after('<div class="Erroremail" align="center" style="color:red"></div>'); 
									$('.Erroremail').html('Please enter correct email').show();
									return false;
								 }else
								 {
								 	$('.Erroremail').hide();
								 }
								 
							 }
							 if(phone.length==0)
							 { 
							    $('#phone').after('<div class="Errorphone" align="center" style="color:red"></div>'); 
								$('.Errorphone').html('Please enter phone').show();
								return false;
							 }else
							 {
							 	$('.Errorphone').hide();
							 	var regexp = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
       							var phoneNumber = regexp.test(phone);
								 
								  if(!phoneNumber || phone.length<10)
								 {
								 	$('#phone').after('<div class="Errorephone" align="center" style="color:red"></div>'); 
									$('.Errorphone').html('Enter Valid mobile number').show();
									return false;
								 }else
								 {
								 	$('.Errorphone').hide();
								 }
							 	
							 } 
							 var comments = $('#comments').val().trim();
							 $.post( "db.php", { name: name,email:email,phone:phone,comments:comments,interest:values })
							  .done(function( data ) {
								   bootbox.dialog({
               						 title: "Thank you !",
									 message: 'You have subscribed successfully',
									  buttons: {
										success: {
											label: "Close",
											className: "btn-success",
											callback: function () {
													}
										 		}
											 }
										 });	
									 
							  });
							}
                    },
					    danger: {
						  label: "Close!",
						  className: "btn-danger",
						  callback: function() {
							 
						  }
						}

                }
            }
        );

		  });
		</script>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>