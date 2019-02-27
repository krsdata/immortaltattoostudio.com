<?php
$curPage='user';
$curSubPage='add_user'; 
include("includes/header.php");
include("global.php");



$pageHead = 'Add ';
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
      <h1><?php echo 'Gallery'; ?></h1>
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
            <table border="0"  cellpadding="0" cellspacing="0">
              <tr valign="top">
                <td><!-- start id-form -->
                  <form name="addEditForm" id="addEditForm" method="post" action="" enctype="multipart/form-data" >
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%"> 
                      	 
                      <tr id="multi_file">
                       
                        <td>
					    <div id="mulitplefileuploader">Upload gallery picture</div>

					<div id="status"></div>
						 </td>
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
