<?php
$curPage='user';
$curSubPage='add_keyword'; 
include("includes/header.php");
include("global.php");



$pageHead = 'Add keyword';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable('keyword','id',$_GET['editid']);
	$pageHead = 'View keyword';
	
	 
} 

if(isset($_POST['submit']) && $_POST['submit']!='')
{
	 
	 extract($_POST);   
			$arr['keyword'] 		= $keyword;	 

		if($_POST['submit']=='add')
		{
			 		 
				insertQuery("keyword", $arr);			 
							 	 	 
				$obj->setMessageForNextPage('New  keyword added successfully','MESSAGE_GREEN');
				?>
				
				<script>
				 window.location = "view-keyword.php";
				</script>
	<?php
		 
		}
		elseif($_POST['submit']=='edit') //
		{ 	 
					 $condition = "Where id=".$_REQUEST['editid']."";
					 updateQuery('keyword', $arr, $condition);				 
					 $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
					 if(!empty($_REQUEST['pagename']))
					 {
					    $location = 'location:view-keyword.php'; 
					 }
					 else
					 {
					    $location = 'location:add-keyword.php'; 
					 }
					  header($location.DEF_QRY_STR);
		 
	}	 
	 
}
?>
<!-- start content-outer ........................................................................................................................START -->
<style>
#id-form th {
    line-height: 28px;
    min-width: 130px;
    padding: 0 0 10px;
    text-align: left;
    width: 240px;
}
</style>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1><?php echo $pageHead;?></h1>
    </div>
    <!-- end page-heading -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
      <tr>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
      </tr>
      <tr>
        <td id="tbl-border-left"></td>
        <td><!--  start content-table-inner ...................................................................... START -->
          <div id="content-table-inner" style="margin-left:180px;">
            <?php include('includes/message.php');?>
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr valign="top">
                <td><!-- start id-form -->
                  <form name="addEditForm" id="addEditForm" method="post" action="" >
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                       
                      <tr>
                        <th valign="top">Keyword:</th>
                        <td> 
						
						<textarea rows="" cols="" name="keyword" id="keyword" class="form-textarea "><?php echo $_POST['keyword']=='' ? $datauser['keyword'] : $_POST['address'];?></textarea>
						</td>
                        <td><div id="addressError" class="errormessage"></div></td>
                      </tr>
					    
					 
                      <tr>
                        <th>&nbsp;</th>
                        <?php
                        if(isset($_GET['editid']) && $_GET['editid']!='')
						{
						?>
                        <input type="hidden" name="submit" value="edit" />
                        <?php
						}
						else
						{
						?>
                        <input type="hidden" name="submit" value="add" />
                        <?php
						}
						?>
                        <td valign="top"><input type="submit" value="" class="form-submit"  id="submit_form" onclick="submitform();" />
                          <input type="reset" value="" class="form-reset"  /></td>
                        <td></td>
                      </tr>
                    </table>
                  </form>
                  <!-- end id-form  --></td>
              </tr>
              <tr>
                <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                <td></td>
              </tr>
            </table>
            <div class="clear"></div>
          </div>
          <!--  end content-table-inner ............................................END  --></td>
        <td id="tbl-border-right"></td>
      </tr>
      <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
      </tr>
    </table>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<script type="text/javascript">
$(document).ready(function(){
	$("#addEditForm").validate();
});
</script>
<?php include("includes/footer.php");?>


<script type="text/javascript">
var i=1;
var j=1;
var k=1;
var l=1;
var result ="ds";

var filedname;
function addtextfield(filedname)
{
//alert(filedname);

if(filedname=='phn_mul')
{
      var e = "phone_"+i+"Error";
	  var id = "phone_"+i;
	  var title = "Secondary Phone Number";
	  var v = '<tr class="'+id+'"><th valign="top">'+title+':</th><td>';
      v += '<input type="text" class="inp-form phone required" name="phone[]" id="'+id+'" maxlength="10"  mlength="10" name="phone[]" value=""    style="float:left" placeholder="Enter Phone number" /><img src="images/remove.jpg"   class="'+id+'"    width="28"  onclick="removesphn('+i+')" /></td><td><div id="'+e+'" class="errormessage"></div></td></tr>';
    $('#phn_mul').after(v);
	i++;
}

if(filedname=='email_mul')
{
      var e = "email_"+i+"Error";
	  var id = "email_"+i;
	  var title = "Secondary Email ID";
	  var v = '<tr class="'+id+'"><th valign="top">'+title+':</th><td>';
      v += '<input type="email" class="inp-form " name="email[]" id="'+id+'" value=""    style="float:left" placeholder="Enter Email ID" /><img src="images/remove.jpg"   class="'+id+'"    width="28"  onclick="removesemail('+i+')" /></td><td><div id="'+e+'" class="errormessage"></div></td></tr>';
    $('#email_mul').after(v);
	i++;
}

if(filedname=='stampcase')
{
  
  var id = "stampcase_"+i;
  var v = '<tr class="'+id+'"><th valign="top" style="float: left; margin-left: 15px;">Stamp:</th><th valign="top">Case Number: </th></tr>';
						 
 v += '<tr id="stamp_case" class="'+id+'"><td style="float: left; margin-left: 15px;"><input type="text" class="inp-form " name="stamp[]" id="stamp" /> <br /><br />';
						
					
		
		v += '<input type="text" class="inp-form " name="stamp_yr[]" id="stamp_yr" placeholder="Enter Year" /></td>'; 
                        
       v +=   '<td><input type="text" class="inp-form " name="case_no[]" id="case_no" /> <img src="images/remove.jpg"   class="'+i+'"    width="28"  onclick="removestampcase('+i+')" /><br /><br />';
	   v +=	'<input type="text" class="inp-form " name="case_no_yr[]" id="case_no_yr" placeholder="Enter Year" style="float:left" />'; 
			
	   v += '</td></tr>';
					  
			   $('#stamp_case').after(v);
			   
		i++;	  

}  
if(filedname=='stage_step_mul')
{
var cname = "stage_step_mul_"+k;
var id = k; 
var v ='<tr class="'+cname+'"><th valign="top">Stage/Step to be taken:</th>'+
                        '<td><input type="text" class="inp-form " name="stage_step[]" id="'+cname+'"  style="float:left"  placeholder="Enter Stage/Step" /> '+
						'<img src="images/remove.jpg"   class="'+cname+'"    width="28"  onclick="removestage('+id+')" /></td>'+
                        '<td><div id="'+cname+'+Error"  class="errormessage"></div></td>'+
                        '</tr>';
					  
   $('#stage_step_mul').before(v);
   k++;
}


if(filedname=='fee_paid_n_date')
{
 
var id = i; 
var cname = "fee_paid_n_date_"+i;
var v ='<tr class="'+cname+'">'+
                        '<th valign="top">Fee paid:</th>'+
                        '<td><input type="text" class="inp-form  number required" name="fee_paid[]" id="fee_paid"  placeholder="Enter Fee" /> '+
						' <input type="text" class="inp-form datepick"    name="fee_paid_date[]"  id="datepicker1"  placeholder="Enter Date"     />'+
						'<img src="images/remove.jpg"        width="28"  onclick="removefeepaid('+id+')" /></td>'+
                        '<td><div id="fee_paid_calenderError" class="errormessage"></div></td>'+
                      '</tr>';
					  
   $('.fee_paid_n_date').after(v);
   i++;
}

if(filedname=='fee_exp_date')
{
 
var id = i; 
var cname = "fee_exp_date_"+i;
var v ='<tr class="'+cname+'">'+
                        '<th valign="top">Fee Expenses:</th>'+
                        '<td><input type="text" class="inp-form  feedate number required" name="expense[]" id="expense"  placeholder="Enter expense" /> '+  
						' <input type="text" class="inp-form datepick"    name="expense_date[]"  id="datepick"  placeholder="Enter Date"    />'+  
						' <img src="images/remove.jpg"        width="28"  onclick="removeexpense('+id+')" /></td>'+  
                        '<td><div id="datepickError" class="errormessage"></div></td>'+
                      '</tr>';
					  
   $('.fee_exp_date').after(v);
   i++;
}

if(filedname=='multi_file')
{
var id = i; 
var cname = "multi_file_"+i;
 var v=  ' <tr class="'+cname+'"><th>File upload :</th>'+
                        '<td><input type="file" name="file_upload[]" id="file_upload[]"   style="display:inline;width:300px"  class="file_1 " />'+						
						'</td>'+
                        '<td> <img src="images/remove.jpg"  width="28" onclick="removemulti('+id+')" /><div id="file_uploadError" class="errormessage"></div></td>'+
                      '</tr><tr>';
$('#multi_file').after(v);
   i++;
}
}
  
  function datepick()
  {
  //  alert('ok');
	$(this).datePicker();
  }
    
 function removeexpense(c)
 { 
   $('.fee_exp_date_'+c).hide(); 
}
 
 function removemulti(c)
 { 
   $('.multi_file_'+c).hide(); 
}
function removestage(c)
 { 
   $('.stage_step_mul_'+c).hide(); 
}


function removesphn(c)
{
 
 $('.phone_'+c).hide();
 
} 
function removefeepaid(c)
{
 
 $('.fee_paid_n_date_'+c).hide();
 
}
function removesemail(c)
{

 $('.email_'+c).hide();
}
function removestampcase(c)
{
   $('.stampcase_'+c).hide();
}

function submitform()
{

 
 var v =  $('input[type="file"]').val();
 
 var uploadName = v.split('.');
 
 uploadName = uploadName[1];
 $("form").submit();
 
 if(v=='')
{
$('#file_uploadError').css('color','red').html('Upload file').css('display','block');
 
}
 
if(uploadName=='pdf' || uploadName=='doc' || uploadName=='docx' || uploadName=='dot' || uploadName=='xls' || uploadName=='xlsx')
			{
$("form").submit();

}
else
{
if(v!='')
{
$('#file_uploadError').css('color','red').html('Upload valid file format').css('display','block');
 
}
}
}

function balance()
{
 
// var v1 =  parseFloat($('#fee_agreed').val());
// var v2 =  parseFloat($('#fee_paid').val());
// var v3 =  parseFloat($('#expense').val());
// 
// var f = $('#blance').val();
//  var fee_agreed =  $('#fee_agreed').val();
// var fee_paid =   $('#fee_paid').val();
// var expn = $('#expense').val();
// 
// if(fee_paid=='')
// {
//    v2=0;
// }
// if(expn=='')
// {
//    v3=0;
// }

 
 
}

</script>
<style >
img{ cursor:pointer;}
</style>