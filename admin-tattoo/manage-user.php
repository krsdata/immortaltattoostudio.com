<?php $curPage='user';
$curSubPage='view_user'; 
include("includes/header.php");
 
/* ******** start delete record ************** */

if ((isset($_GET['delid']) && $_GET['delid'] != ""))
{	
	$dataDel = $obj->getRowFromAnyTable('gallery','id',$_GET['delid']);
	@unlink('uploads/'.$dataDel['file_name']);
	$obj->deleteRowFromAnyTable('gallery','id',$_GET['delid']);
	 
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end delete record ************** */

/* ******** start multi delete record ************** */
if ((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "delete"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataDel = $obj->getRowFromAnyTable('gallery','id',$_POST['checkbox'][$di]);
		@unlink('images/uploadUserImages/'.$dataDel['image']);
		$obj->deleteRowFromAnyTable(TBL_CLIENT_CASE,'id',$_POST['checkbox'][$di]);
		$obj->deleteRowFromAnyTable(TBL_CLIENT_CASE,'id',$_POST['checkbox'][$di]);
	}
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end multi delete record ************** */

/* ******** start change status ************** */
if ((isset($_GET['statusid']) && $_GET['statusid'] != "") && (isset($_GET['status']) && $_GET['status'] != ""))
{	
	$update= ($_GET['status'] == 1) ? 2 : 1;
	$obj->updateRowFromAnyTable('gallery','status="'.$update.'"','id="'.$_GET['statusid'].'"');
	 
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end change status ************** */ 

/* ******** start multi change status ************** */
if((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "status"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataStatus = $obj->getRowFromAnyTable('gallery','id',$_POST['checkbox'][$di]);
		$update= ($dataStatus['status'] == 1) ? 2 : 1;
		$obj->updateRowFromAnyTable('gallery','status="'.$update.'"','id="'.$_POST['checkbox'][$di].'"');
		$dataStatusUser = $obj->getRowFromAnyTable('gallery','id',$_POST['checkbox'][$di]);
		$update= ($dataStatusUser['status'] == 1) ? 2 : 1;
	 
	}
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end multi change status************** */


$sql = "SELECT * FROM gallery  WHERE 1=1 "; 
$recordPerPage = 5; 
	if(isset($_REQUEST['search_by_date']) && !empty($_REQUEST['search_by_date']))
	{ 
	extract($_GET);  
	$sql .= " AND date = '".$search_by_date."'";    
	} 
 
if($_GET['search']=='' &&  $_REQUEST['search_by_date']=='' && $_REQUEST['search_by_court']=='')
{
	$sql = "SELECT  * from gallery  order by id DESC";
}
	 
include('includes/pagination.php');// FOR PAGINATION $sql SHOULD BE SAME AS $sql
$query = $obj->executeQry($sql,$link);
$numRows=$obj->getRow($query);
?>
<!-- start content-outer ........................................................................................................................START -->

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Manage gallery</h1>
    </div>
    <!-- end page-heading -->
    <!--  start top-search -->
    <div class="search-box">
      <table align="right" width="" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <!--  <td valign="top"><form id="searchFrm" name="searchFrm" method="get" action="">
            
			 
			  <input type="text" name="search_by_date" value="<?php if(!empty($_GET['search_by_date'])) echo $_GET['search_by_date']; ?>" placeholder="Search by Date"   id="search_by_date" class="top-search-inp" />
			  
			  
			  <input type="text" name="search" value="<?php if(!empty($_GET['search'])) echo $_GET['search']; ?>" placeholder="Search"  class="top-search-inp" />
            </form></td>
          <td><input type="image" onclick="$('#searchFrm').submit();" src="images/shared/top_search_btn.gif"></td>-->
        </tr>
      </table>
    </div>
    <!--  end top-search -->
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
          <div id="content-table-inner">
            <?php
           if($numRows > 0)
		   {
           ?>
            <!--  start table-content  -->
            <div id="table-content">
              <?php include('includes/message.php');?>
              <!--  start product-table ..................................................................................... -->
              <form id="mainform" name="mainform" action="" method="post">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                  <thead>
                    <tr>
                      <td style="background:#333333"><span style="color:#FFFFFF">Gallery</span></td>
                       
                    </tr>
                  </thead>
				 
				  </table>
                  <?php
				  $i = 1;
				  $j=1;
                  while($data = $obj->fetchRow($query))
				  {				   
				  ?>
				  
					 <div style="float:left; border:2px solid #666666; margin:5px;">
					  <p>  Picture <?php echo $j++; ?> </p> 
					  <img src="uploads/<?php echo $data['file_name'];?>" width="200px" height="200px" /> 
					 <p style="width:100%;"> Uploaded Date : <?php echo $data['date'];?> </p>
                      <p style="width:100%;" align="center"><a href="manage-user.php?delid=<?php echo $data['id'];?>">Delete</a> </p>
				   </div>
				   
                  <?php
				  $i++;}
				  ?>
                
                <!--  end product-table................................... -->
                <input type="hidden" id="multiType" value="" name="sub_multiform">
              </form>
            </div>
            <!--  end content-table  -->
            <!--  start paging..................................................... -->
            <table border="0" cellpadding="0" cellspacing="0" id="paging-table" width="100%" align="center">
              <tr>
                <td align="left"> 
                   
                    <div class="clear"></div>
                  </div></td>
                <td align="right" style="float:right;"><?php include('includes/paginationLink.php');?></td>
                <td valign="top" align="right" width="140" ><?php include('includes/recordPerpPage.php');?></td>
              </tr>
            </table>
            <!--  end paging................ -->
            <div class="clear"></div>
            <?php
		   }
		   else
		   {
		   ?>
            <div id="table-content">
              <?php $MESSAGE_YELLOW[] = 'No record found...';include('includes/message.php');?>
            </div>
            <?php
		   }
		   ?>
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
<?php include("includes/footer.php");?>

 