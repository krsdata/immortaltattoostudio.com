<?php
$curPage='user';
$curSubPage='add_user'; 
include("includes/header.php");
include("global.php");



$pageHead = 'Add New Case';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable(TBL_CLIENT_CASE,'id',$_GET['editid']);
	$pageHead = 'View Case';
	
	$datauser2  = mysql_query("select * from stamp_case_no where client_id = ".$_GET['editid']."");
}

if(isset($_GET['case_file_no']) && $_GET['case_file_no']!='')
{
	
	extract($_GET); 
	
	 
	
	$sql = mysql_query("SELECT * FROM `client_records`  as cr left join stamp_case_no scn on scn.client_id=cr.id where cr.parties_name = '".$parties_name."' AND (cr.file_no = '".$case_file_no."' AND  cr.file_no_yr ='".$year."') OR (scn.case_no = '".$case_file_no."' AND  scn.case_no_yr ='".$year."') OR (scn.stamp = '".$case_file_no."' AND  scn.stamp_yr ='".$year."') AND cr.court = '".$court."' AND cr.calender= '".$calender."'");
	
	$datauser  = mysql_fetch_array($sql);
	
		
	$pageHead = 'Search  Case';
}






if(isset($_POST['submit']) && $_POST['submit']!='')
{
	 //$MESSAGE_RED[] = $obj->requiredField($_POST['fname'],'first name','');
	//$MESSAGE_RED[] = $obj->requiredField($_POST['lname'],'last name','');
	//$MESSAGE_RED[] = $obj->validNumberRequired($_POST['phone'],'phone number','');
	//$MESSAGE_RED[] = $obj->validEmailRequired($_POST['email'],'email address','');
	//$MESSAGE_RED[] = $obj->requiredField($_POST['category'],'category','Please select category');
	//$MESSAGE_RED[] = $obj->requiredField($_POST['description'],'description',''); 

	 
	 extract($_POST);  
	 
	 
			$arr['parties_name'] 	= $parties_name;
			$arr['appellant'] 	= $appellant;
			$arr['respondent'] 	= $respondent;
			$arr['address'] 		= $address;
			//$arr['email'] 		= $email;
			$arr['reference_by'] 	= $reference_by;
			$arr['court'] 		    = $court;
			
			$arr['file_on'] 		= $file_on;
			$arr['filled_on_date']  = $filled_on_date;
			$arr['filled_no']		= $filled_no;
			$arr['filled_no_text'] 	= $filled_no_text;
			
			$arr['case_cat'] 		= $case_cat;
			$arr['file_no'] 		= $file_no;
			$arr['file_no_yr'] 		= $file_no_yr;
		//	$arr['file_upload'] 	= $_FILES['file_upload']['name'];
			
			$arr['case_petition_arg'] 	= $case_petition_arg;
			$arr['inward_outward_reg'] 	= $inward_outward_reg;
			$arr['case_reg_date'] 	= $case_reg_date;
			$arr['remark'] 			= $remark;
			$arr['notes'] 			= $notes;
			$arr['result'] 			= $result;
			$arr['calender'] 		= $calender;
			
			$md = explode('/',$arr['calender']);
			
			if(count($md))
			{
			$arr['month'] 			= $md[1];
			$arr['year'] 			= $md[2];
			}else{
			 	$arr['month'] 			= date('m');
			$arr['year'] 			= date('Y');
			}
		
			
			// payment  - 7 
			$arr['fee_agreed'] 		= $fee_agreed;
			$arr['fee_agreed_date'] = $fee_agreed_date; 
			
			$arr['blance'] 			= $blance;
	 /*-----------------------------------------*/  
	  $phn_num ='';
	  foreach($phone as $phn)
	  {	  
	     $phn_num =  $phn_num.','.$phn; 
	  }
	   
	  $phn_num 			= ltrim($phn_num,','); 
	  $arr['phone'] 	= $phn_num;
	  
	  //--------------------------Email----------------------
	  $emailid ='';
	  foreach($email as $mail)
	  {	  
	     $emailid =  $emailid.','.$mail; 
	  }
	   
	   $mail_id 			= ltrim($emailid,','); 
	   $arr['email'] 		= $mail_id;
	  //-----------------------------Stage step-------------- 
	  $stagestep1=''; 
	  foreach($stage_step as $stagestep)
	  { 
	     $stagestep1 =  $stagestep1.','.$stagestep; 
	  } 
	   $stage_step2 = ltrim($stagestep1,','); 
	   $arr['stage_step'] 		= $stage_step2;
	   
	   //----------------FEE section----------- 
	   
	  $feepaid=''; 
	  foreach( $fee_paid as $fee_pay)
	  { 
	     $feepaid =  $feepaid.','.$fee_pay; 
	  } 
	   $feepaid = ltrim($feepaid,','); 
	   $arr['fee_paid'] 		= $feepaid;
	   
	    /*-----------------------------------------*/
	   $paiditem=''; 
	  foreach($paid_item_name as $pin)
	  {
	  
	     $paiditem =  $paiditem.','.$pin; 
	  }
	   
	   $arr['paid_item_name']  = ltrim($paiditem,','); 
	    
	   
	    /*-----------------------------------------*/
	  $feepaid_date=''; 
	  foreach( $fee_paid_date as $fee_pay_date)
	  {
	  
	     $feepaid_date =  $feepaid_date.','.$fee_pay_date; 
	  }
	   
	   $feepaid_date = ltrim($feepaid_date,','); 
	   $arr['fee_paid_date'] 		= $feepaid_date;
	   /*-----------------------------------------*/ 
	  $fee_exp=''; 
	  foreach( $expense as $fee_expense)
	  {
	  
	     $fee_exp =  $fee_exp.','.$fee_expense; 
	  }
	   
	   $expense = ltrim($fee_exp,','); 
	   $arr['expense'] 		= $expense;
	   /*-----------------------------------------*/
	   $expense_item=''; 
	  foreach( $expense_item_name as $expenseitemname)
	  { 
	     $expense_item =  $expense_item.','.$expenseitemname; 
	  } 
	    
	   $arr['expense_item_name'] 	= ltrim($expense_item,',');
	   
	    /*-----------------------------------------*/
	   $fee_exp_date=''; 
	  foreach( $expense_date as $fee_expense_date)
	  { 
	     $fee_exp_date =  $fee_exp_date.','.$fee_expense_date; 
	  } 
	   $expense_date = ltrim($fee_exp_date,','); 
	   $arr['expense_date'] 		= $expense_date;  
	   
	   /*-----------------------------Stamp----case----number---calender------------------*/  //  $arr['fee_paid_date'] 	= $fee_paid_date; 
	 
	 
	 //$result = insertQuery("shipping_billing_details", $arr);
	 
 

		if($_POST['submit']=='add')
		{
			 		
				 	
					    $c =  count($_FILES['file_upload']['name']);
					    $fileName = '';
						if($c>0)
						{
						
						
						for($i=0;$i<$c; $i++)
						{
						
						$fileName =  $fileName.','.$_FILES['file_upload']['name'][$i];
						
						 
						move_uploaded_file($_FILES['file_upload']["tmp_name"][$i],'images/uploadUserImages/'.$_FILES['file_upload']['name'][$i]);
						
						}
						
						}	
					//  echo $fileName; die;
					   $arr['file_upload'] = ltrim($fileName,',');
					   
					 //  echo ltrim($fileName,','); die;
						$last_id =  insertQuery("client_records", $arr);
						
						$total =  count($stamp);  
						for($i=0;$i<$total; $i++)
						{						
						$caseStamparr['stamp'] 		= $stamp[$i]; 
						$caseStamparr['stamp_yr'] 	= $stamp_yr[$i]; 
						$caseStamparr['case_no'] 	= $case_no[$i];
						$caseStamparr['case_no_yr'] = $case_no_yr[$i]; 
						$caseStamparr['client_id'] 	= $last_id; 
					 
						insertQuery("stamp_case_no", $caseStamparr);
				
			 	 	 
				$obj->setMessageForNextPage('New  Case successfully','MESSAGE_GREEN');
				header('location:manage-user.php'.DEF_QRY_STR);
	
			}
		}
		elseif($_POST['submit']=='edit') //
		{
			
			            $c =  count($_FILES['file_upload']['name']);
					    $fileName = '';
						if($c>0)
						{ 
						for($i=0;$i<$c; $i++)
						{ 
							$fileName =  $fileName.','.$_FILES['file_upload']['name'][$i]; 
							move_uploaded_file($_FILES['file_upload']["tmp_name"][$i],'images/uploadUserImages/'.$_FILES['file_upload']['name'][$i]); 
						} 
						}
						$fileName   = ltrim($fileName,',');
			           if($fileName!='')
					   {
			 	              $arr['file_upload'] = $uploaded_file.','.$fileName;
					   }
					   else
					   {
					          $arr['file_upload'] = $uploaded_file;
					   }
					   $condition = " Where id=".$_REQUEST['editid']."";
					  
					  
					//  print_r($arr); die;
					  
					    updateQuery(TBL_CLIENT_CASE, $arr, $condition);
						
						$total =  count($case_stamp_id);  
						for($i=0;$i<$total; $i++)
						{
						
						$caseStamparr['stamp'] 		= $stamp[$i]; 
						$caseStamparr['stamp_yr'] 	= $stamp_yr[$i]; 
						$caseStamparr['case_no'] 	= $case_no[$i];
						$caseStamparr['case_no_yr'] = $case_no_yr[$i]; 
						//$caseStamparr['case_stamp_id'] = $case_stamp_id[$i];  
						//case_stamp_id
						 
						 $condition = " Where id=".$case_stamp_id[$i]."";
						 updateQuery("stamp_case_no", $caseStamparr, $condition);
						 
					  
					  
				    $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
					
					if(!empty($_REQUEST['pagename']))
					{
					  $location = 'location:manage-user.php'; 
					}
					else
					{
					    $location = 'location:manage-page.php'; 
					}
					
						header($location.DEF_QRY_STR);
			}
		 
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
    width: 215px;
}
</style>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1><?php echo $pageHead; ?></h1>
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
                  <form name="addEditForm" id="addEditForm" method="post" action="" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top">Name of Parties:</th>
                        <td><input type="text" name="parties_name" id="parties_name" class="inp-form required" value="<?php echo $_POST['parties_name']=='' ? $datauser['parties_name'] : $_POST['parties_name'];?>"  placeholder="Enter parties name"/></td>
                        <td><div id="parties_nameError" class="errormessage"></div></td>
                      </tr>
					   <tr>
                        <th valign="top">Appellant:</th> 
                        <td><input type="text" name="appellant" id="appellant" class="inp-form required" value="<?php echo $_POST['appellant']=='' ? $datauser['appellant'] : $_POST['appellant'];?>" placeholder="Enter appellant" /></td>
                        <td><div id="appellantError" class="errormessage"></div></td>
                      </tr>
					  <tr>
                        <th valign="top">Respondent:</th> 
                        <td><input type="text" name="respondent" id="respondent" class="inp-form " value="<?php echo $_POST['respondent']=='' ? $datauser['respondent'] : $_POST['respondent'];?>" placeholder="Enter respondent"  /></td>
                        <td><div id="respondentError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Address:</th>
                        <td> 
						
						<textarea rows="" cols="" name="address" id="address" class="form-textarea "><?php echo $_POST['address']=='' ? $datauser['address'] : $_POST['address'];?></textarea>
						</td>
                        <td><div id="addressError" class="errormessage"></div></td>
                      </tr>
					  
					  <?php $phone2 =  explode(',',$datauser['phone']);
					  
					  if(count($phone2)>1)
					  {
					  
					  for($i=0; $i<count($phone2); $i++)
					  {
					   ?>
					   <tr id="phn_mul">
					  <th valign="top"><?php 
					  
					  if($i==0)
					  echo "Primary Phone Number:" ; else echo "Secondary Phone Number:";  ?></th>
                        <td><input type="text" class="inp-form phone required" maxlength="10"  mlength="10" name="phone[]" id="phone" value="<?php echo $_POST['phone']=='' ? $phone2[$i] : $_POST['phone'];?>" style="float:left"  placeholder="Enter phone number" /> <img src="images/plus.png"  width="28" onclick="addtextfield('phn_mul')" />
						</td>
                        <td><div id="phoneError" class="errormessage"></div></td>
                      </tr>
					  <?php } } else { ?>
					  
					   <tr id="phn_mul">
					  <th valign="top">Phone:</th>
                        <td><input type="text" class="inp-form phone required" maxlength="10"  mlength="10" name="phone[]" id="phone" value="<?php echo $_POST['phone']=='' ? $phone2[$i] : $_POST['phone'];?>" style="float:left"  placeholder="Enter phone number" /> <img src="images/plus.png"  width="28" onclick="addtextfield('phn_mul')" />
						</td>
                        <td><div id="phoneError" class="errormessage"></div></td>
                      </tr>
					  
					  <?php } ?> 
					  <!----- phn append----------->
					  
					  
					  <?php $emailid =  explode(',',$datauser['email']);
					  
					  if(count($emailid)>0)
					  {
					  
					  for($i=0; $i<count($emailid); $i++)
					  {
					   ?>
					   <tr id="email_mul">
					  <th valign="top"><?php 
					  
					  if($i==0)
					  echo "Email Address:" ; else echo "Secondary Email Address:";  ?></th>
                        <td><input type="text" class="inp-form  email required" name="email[]" id="email" value="<?php echo $_POST['email']=='' ? $emailid[$i] : $_POST['email'];?>" style="float:left"  placeholder="Enter email ID" /> <img src="images/plus.png"  width="28" onclick="addtextfield('email_mul')" /></td>
                        <td><div id="emailError" class="errormessage"></div></td>
						
                      </tr>
					   <?php } } ?> 
					  <!-----------------Email------------->
					   
					   
					  <!-------------end----------------->
					  
                        <tr>
                        <th valign="top">Reference:</th>
                        <td><input type="text" class="inp-form " name="reference_by" id="reference_by" value="<?php echo $_POST['reference_by']=='' ? $datauser['reference_by'] : $_POST['reference_by'];?>" placeholder="Enter reference" /></td>
                        <td><div id="reference_byceError" class="errormessage"></div></td>
                      </tr>
                        <tr>
                        <th valign="top">Court:</th>
                        <td><input type="text" class="inp-form required" name="court"  id="court" value="<?php echo $_POST['court']=='' ? $datauser['court'] : $_POST['court'];?>" placeholder="Enter court" /></td>
                        <td><div id="courtError" class="errormessage"></div></td>
                      </tr>
					  
					  
					  <tr>
                        <th valign="top">Fielled on:</th>
                        <td> 
						 <select name="file_on" id="file_on"  class="styledselect_form_1 required">
                            <option value="">select</option>
                            <option value="case" <?php if(!empty($datauser['file_on']) && $datauser['file_on']=='case') echo "selected"; ?>>Case </option>
                            <option value="vp" <?php if(!empty($datauser['file_on']) && $datauser['file_on']=='vp') echo "selected"; ?>>VP </option>  
                          </select>
						  
						   <input  type="text" class="inp-form  required" name="filled_no_text"   id="filled_no_text"  required value="<?php echo $_POST['filled_no_text']=='' ? $datauser['filled_no_text'] : $_POST['filled_no_text'];?>"   placeholder="Enter filled name"  />
						
						 <input  type="text" class="inp-form number required" name="filled_no"   id="filled_no"   value="<?php echo $_POST['filled_on_date']=='' ? $datauser['filled_no'] : $_POST['filled_no'];?>" required  placeholder="Enter filled on number" />
						 
						 
						 <input type="text" class="inp-form required" required name="filled_on_date" id="filled_on_date" value="<?php echo $_POST['filled_on_date']=='' ? $datauser['filled_on_date'] : $_POST['filled_on_date'];?>"  placeholder="Enter Date"/>
						 
						 </td>
						 
                         <td><div id="filled_on_dateError" class="errormessage"></div><div id="filled_on_dateError" class="errormessage"></div></td>
                      </tr> 
					  
					  <tr>
                        <th valign="top">File Number:</th>
                        <td><input type="text" class="inp-form  required" name="file_no" required id="file_no" value="<?php echo $_POST['file_no']=='' ? $datauser['file_no'] : $_POST['file_no'];?>"  placeholder="Enter file number" />
						<input type="text" class="inp-form   required" name="file_no_yr"  maxlength="4" id="file_no_yr1" value="<?php echo $_POST['file_no_yr']=='' ? $datauser['file_no_yr'] : $_POST['file_no_yr'];?>"  placeholder="Enter Year"/>
						</td>
                        <td><div id="file_no_yr1Error" class="errormessage"></div></td>
                      </tr>
					  </table>
					  <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; width:60%">
					  
					  
					   <?php 
					   if(isset($_GET['editid']) && $_GET['editid']!='')
{
					   
					   while($row=mysql_fetch_array($datauser2)) { ?> 
					   <tr> <input type="hidden" name="case_stamp_id[]"  value="<?php echo $row['id'];  ?>" />
                        <th valign="top" style="float: left; margin-left: 15px;">Stamp:</th>
						 <th valign="top">Case Number:</th>
						 </tr>
						 <tr id="stamp_case" class="stamp_case"> 
                        <td style="float: left; margin-left: 15px;"><input type="text" class="inp-form required" required name="stamp[]" id="stamp"  value="<?php echo $row['stamp']; ?>" /> <br /><br />
						<input type="text" class="inp-form required" required name="stamp_yr[]" maxlength="4" id="stamp_yr"   value="<?php echo $row['stamp_yr']; ?>" />
						</td> 
                        
                        <td><input type="text" class="inp-form required" required name="case_no[]" id="case_no"  value="<?php echo $row['case_no']; ?>" /> <br /><br />
						<input type="text" class="inp-form " name="case_no_yr[]" required id="case_no_yr"  maxlength="4" value="<?php echo $row['case_no_yr']; ?>"  placeholder="Enter Year" style="float:left" /> 
						
						</td>   
						                          
                      </tr>
					  <?php } } else {?> 
					   <tr>
                        <th valign="top" style="float: left; margin-left: 15px;">Stamp:</th>
						 <th valign="top">Case Number:</th>
						 </tr>
						 <tr id="stamp_case" class="stamp_case"> 
                        <td style="float: left; margin-left: 15px;"><input type="text" required class="inp-form required" name="stamp[]" id="stamp"  placeholder="Enter Stamp"   /> <br /><br />
						<input type="text" class="inp-form required"  required name="stamp_yr[]" id="stamp_yr"   placeholder="Enter Year" />
						</td> 
                        
                        <td><input type="text" class="inp-form required" required name="case_no[]" id="case_no"  placeholder="Enter Case number"  /> <br /><br />
						<input type="text" class="inp-form required" required name="case_no_yr[]" id="case_no_yr"   placeholder="Enter Year" style="float:left" /> 
						
						</td>  
						             
                      </tr>
					  
					  <?php } ?>
					  
					  <!------------------stamp sace------------------>
					   
					  <!-----------end----------------------------->
					  
					    <img src="images/plus.png"  width="28" style="float:right; margin-right:365px;" onclick="addtextfield('stampcase')"  />
					  </table>
					   <table border="0" cellpadding="0" cellspacing="0"  id="id-form" >
					  <tr>
                        <th valign="top">Case Category :</th>
                        <td>
						<select name="case_cat" id="case_cat"  class="styledselect_form_1 required ">
                            <option value="">select</option>
                            <option value="Civil" <?php if(!empty($datauser['case_cat']) && $datauser['case_cat']=='Civil') echo "selected"; ?>>Civil </option>
                            <option value="Criminal" <?php if(!empty($datauser['case_cat']) && $datauser['case_cat']=='Criminal') echo "selected"; ?>>Criminal </option>
                            <option value="Others" <?php if(!empty($datauser['Others']) && $datauser['Others']=='Others') echo "selected"; ?>>Others </option>
                            
                          </select></td>
                        <td><div id="case_catError" class="errormessage"></div></td>
                      </tr>
					  </table>
					  
					    <table border="0" cellpadding="0" cellspacing="0"  id="id-form"  >
					    <tr><td><b title="Payment" style="font-size:18px; color:#990066">Payment : - </b> </td></tr>
						<tr>
						<td> 
					  <tr>
                        <th valign="top">Fee agreed:</th>
                        <td><input type="text" class="inp-form  number required" name="fee_agreed" id="fee_agreed" value="<?php echo $_POST['fee_agreed']=='' ? $datauser['fee_agreed'] : $_POST['fee_agreed'];?>" placeholder="Enter fee agreed"/>
						<input type="text" class="inp-form required" name="fee_agreed_date" id="fee_agreed_date" value="<?php echo $_POST['fee_agreed_date']=='' ? $datauser['fee_agreed_date'] : $_POST['fee_agreed_date'];?>" placeholder="Enter Date"/>
						</td>
                        <td><div id="fee_agreedError" class="errormessage"></div></td>
                      </tr>
					   <?php $fee_paid =  explode(',',$datauser['fee_paid']);
					         $fee_paid_date =  explode(',',$datauser['fee_paid_date']);
							 $paid_item_name = explode(',',$datauser['paid_item_name']);
					  if(count($fee_paid)>0)
					  {
					  
					  for($i=0; $i<count($fee_paid); $i++)
					  {
					   ?>
					   <tr class="fee_paid_n_date">
                        <th valign="top">Fee paid:</th>
                        <td>
						<input type="text" class="inp-form   required" name="paid_item_name[]" id="paid_item_name" value="<?php echo $paid_item_name[$i]; ?>" placeholder="Enter fee paid Item Name" />
						<input type="text" class="inp-form  number required" name="fee_paid[]" id="fee_paid" value="<?php echo $fee_paid[$i]; ?>" placeholder="Enter fee paid" />
						<input type="text" class="inp-form  required " name="fee_paid_date[]" required id="fee_paid_date" value="<?php echo   $fee_paid_date[$i]; ?>" placeholder="Enter Date"/>
						<img src="images/plus.png"  width="28" onclick="addtextfield('fee_paid_n_date')" />
						</td>
                        <td><div id="fee_paidError" class="errormessage"></div></td>
                      </tr>
					   <?php 
					   }}
					         $expense =  explode(',',$datauser['expense']);
					         $expense_date =  explode(',',$datauser['expense_date']);
							 $expense_item_name =  explode(',',$datauser['expense_item_name']);
					  if(count($expense)>0)
					  {
					  
					  for($i=0; $i<count($expense); $i++)
					  {
					   ?>
					  <tr class="fee_exp_date" id="fee_exp_date"> 
                        <th valign="top">Expenses:</th>
                        <td>
						<input type="text" class="inp-form   required" name="expense_item_name[]" id="expense_item_name" required value="<?php echo $expense_item_name[$i]; ?>" placeholder="Enter expense item name"/>
						
						<input type="text" class="inp-form  number required" name="expense[]" id="expense" required value="<?php echo $expense[$i]; ?>" placeholder="Enter expense"/>
						
						<input type="text" class="inp-form   required date-pick" name="expense_date[]" id="expense_date1" value="<?php echo $expense_date[$i]; ?>" placeholder="Enter expense date" />
						
						<img src="images/plus.png"  width="28" onclick="addtextfield('fee_exp_date')" />
						</td>
                        <td><div id="expense_dateError" class="errormessage"></div></td>
                      </tr>
					  <?php }} ?>
					  <tr>
                        <th valign="top">Blance:</th>
                        <td><input type="text" class="inp-form  number  required"    onclick="balance();" name="blance" id="blance" value="<?php echo $_POST['blance']=='' ? $datauser['blance'] : $_POST['blance'];?>" placeholder="Enter Blance" /></td>
                        <td><div id="blanceError" class="errormessage"></div></td>
                      </tr>
					 
					  </table>
					     
					   <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
					
					  					  <tr>
                        <th valign="top"> Notes of Argument:</th>
                        <td> 
						<textarea rows="" cols="" name="case_petition_arg" id="case_petition_arg" class="form-textarea "><?php echo $_POST['case_petition_arg']=='' ? $datauser['case_petition_arg'] : $_POST['case_petition_arg'];?></textarea>
						</td>
                        <td><div id="case_petition_argError" class="errormessage"></div></td>
                      </tr>
					  
					  <!---------------stage step------------->
					  
					   <?php $stage =  explode(',',$datauser['stage_step']);
					  
					  if(count($stage)>0)
					  {
					  
					  for($i=0; $i<count($stage); $i++)
					  {
					   ?>
					  <tr id="stage_step_mul" class="stage_step_mul">
                        <th valign="top">Stage/Step to be taken:</th>
                        <td><input type="text" class="inp-form   required" name="stage_step[]" id="stage_step" value="<?php echo $_POST['stage_step']=='' ? $stage[$i] : $_POST['stage_step'];?>"  style="float:left" placeholder="Enter Stage/Step" /> <img src="images/plus.png"  width="28" onclick="addtextfield('stage_step_mul')" /></td>
                        <td><div id="stage_stepError" class="errormessage"></div></td>
                      </tr>
					  <?php } } ?>
					  
					  
					   <tr>
                        <th valign="top">Inward and Out-ward Register:</th>
                        <td><input type="text" class="inp-form   required" name="inward_outward_reg" id="inward_outward_reg" value="<?php echo $_POST['inward_outward_reg']=='' ? $datauser['inward_outward_reg'] : $_POST['inward_outward_reg'];?> "  placeholder="Enter Inward and Out-ward Register" />
						
						<input type="text" class="inp-form   required" required name="case_reg_date" id="case_reg_date" value="<?php echo $_POST['case_reg_date']=='' ? $datauser['case_reg_date'] : $_POST['case_reg_date'];?>"  placeholder="Enter Date" />
						
						</td>
                        <td><div id="inward_outward_regError" class="errormessage"></div></td>
                      </tr>
					 
					   <tr>
                        <th valign="top">Remark/ Judgments:</th>
                        <td><input type="text" class="inp-form  required " name="remark" id="remark" value="<?php echo $_POST['remark']=='' ? $datauser['remark'] : $_POST['remark'];?>" placeholder="Enter Remark"  /></td>
                        <td><div id="remarkError" class="errormessage"></div></td>
                      </tr>
					  
					  
					  <tr>
                        <th valign="top">Result:</th>
                        <td><input type="text" class="inp-form   required" name="result" id="result" value="<?php echo $_POST['result']=='' ? $datauser['result'] : $_POST['result'];?>" placeholder="Enter Result" /></td>
                        <td><div id="resultError" class="errormessage"></div></td>
                      </tr>
					   
					  <tr>
                        <th valign="top">Date(DD/MM/YYYY):</th>
                        <td><input type="text" class="inp-form  required " name="calender" id="date-pick" value="<?php echo $_POST['calender']=='' ? $datauser['calender'] : $_POST['calender'];?>" placeholder="Enter Date" /></td>
                        <td><div id="date-pickError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top"> Notes:</th>
                        <td><textarea rows="" cols="" name="notes" id="notes" class="form-textarea "><?php echo $_POST['notes']=='' ? $datauser['notes'] : $_POST['notes'];?></textarea></td>
                        <td><div id="notesError" class="errormessage"></div></td>
                      </tr>
                      
                      <?php $file_upload =  explode(',',$datauser['file_upload']);
					  
					  if(count($file_upload)>0 && isset($_GET['editid']))
					  { 
					  for($i=0; $i<count($file_upload); $i++)
					  {
					   ?>
						<tr>
						<th>File uploaded: </th>
						<td><a href="<?php SITE_URL; ?>images/uploadUserImages/<?php echo $file_upload[$i]; ?>" target="_blank" >View uploaded file</a></td>
						</tr>
						<input type="hidden" name="uploaded_file" value="<?php  echo $datauser['file_upload']; ?>" >
						<?php }
						 }    ?>
                      	 
                      <tr id="multi_file">
                        <th>File upload :</th>
                        <td><input type="file" name="file_upload[]" id="file_upload" class="file_1" />
						
						</td>
                        <td> <img src="images/plus.png"  width="28" onclick="addtextfield('multi_file')" />
						</td>
						<td><div id="file_uploadError" class="errormessage"></div></td>
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
						'<td><input type="text" class="inp-form   required" name="paid_item_name[]" id="paid_item_name"  placeholder="Enter paid item name" /> '+
                        '<input type="text" class="inp-form  number required" name="fee_paid[]" id="fee_paid"  placeholder="Enter Fee" /> '+
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
						'<td><input type="text" class="inp-form    required" name="expense_item_name[]" id="expense_item_name"  placeholder="Enter expense item name" /> '+
                        '<input type="text" class="inp-form   number required" name="expense[]" id="expense"  placeholder="Enter expense" /> '+  
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