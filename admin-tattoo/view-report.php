<?php $curPage='user';
$curSubPage='view_report'; 
include("includes/header.php");

/* ******** start delete record ************** */
if ((isset($_GET['delid']) && $_GET['delid'] != ""))
{	
	$dataDel = $obj->getRowFromAnyTable('tbl_user','id',$_GET['delid']);
	@unlink('images/uploadUserImages/'.$dataDel['image']);
	$obj->deleteRowFromAnyTable('tbl_user','id',$_GET['delid']);
	 
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end delete record ************** */

/* ******** start multi delete record ************** */
if ((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "delete"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataDel = $obj->getRowFromAnyTable('tbl_user','id',$_POST['checkbox'][$di]);
		@unlink('images/uploadUserImages/'.$dataDel['image']);
		$obj->deleteRowFromAnyTable('tbl_user','id',$_POST['checkbox'][$di]);
		 
	}
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end multi delete record ************** */

/* ******** start change status ************** */
if ((isset($_GET['statusid']) && $_GET['statusid'] != "") && (isset($_GET['status']) && $_GET['status'] != ""))
{	
	$update= ($_GET['status'] == 1) ? 2 : 1;
	$obj->updateRowFromAnyTable('tbl_user','status="'.$update.'"','id="'.$_GET['statusid'].'"');
	 
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end change status ************** */ 

/* ******** start multi change status ************** */
if((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "status"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataStatus = $obj->getRowFromAnyTable('tbl_user','id',$_POST['checkbox'][$di]);
		$update= ($dataStatus['status'] == 1) ? 2 : 1;
		$obj->updateRowFromAnyTable('tbl_user','status="'.$update.'"','id="'.$_POST['checkbox'][$di].'"');
		$dataStatusUser = $obj->getRowFromAnyTable('tbl_user','id',$_POST['checkbox'][$di]);
		$update= ($dataStatusUser['status'] == 1) ? 2 : 1;
	 
	}
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end multi change status************** */ 


$recordPerPage = 10; 
 
$sql = "SELECT *,count(*) as cs,sum(fee_agreed) as fee_agree FROM client_records group by year order by year DESC"; 	 
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
      <h1>Manage Client Case</h1>
    </div>
    <!-- end page-heading -->
    <!--  start top-search -->
    <div class="search-box">
      <table align="right" width="" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><form id="searchFrm" name="searchFrm" method="get" action="">
            
			  
			  
			  <input type="text" name="search" value="<?php if(!empty($_GET['search'])) echo $_GET['search']; ?>" placeholder="Search"  class="top-search-inp" />
            </form></td>
          <td><input type="image" onclick="$('#searchFrm').submit();" src="images/shared/top_search_btn.gif"></td>
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
           if($numRows)
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
                     
                      <th class="table-header-repeat line-left">Report</th>
                    </tr>
                  </thead>
				  </table>
                  <?php
				 
                  while($data = $obj->fetchRow($query))
				  {
				    $yr =  $data['year'];
				
					 $sum=0;
					  $fee =  explode(',',$data['fee_paid']);
					   for($i=0;$i<count($fee); $i++)
					  {
					    $sum = $sum+$fee[$i];
					  }
					  $f_paid = $sum;
					
				 
					 
					 $sql1 = "select * from client_records where year='".$yr."' group by month order by month ASC";
					 $query1 = $obj->executeQry($sql1,$link);
					 $numRows1=$obj->getRow($query1);
						echo '<div style="border:1px solid #ccc; float:left; width:30.9%; padding:5px;margin:5px;">';
						echo '<b>Year : '.$yr .'</b><br><br>'; 
						echo '<b style="color:blue">Total Number Case : '.$data['cs'] .'</b><br><br>';
				
						echo '<b style="color:red">Total Agreed Amount in This Year: Rs. '.number_format((float)$data['fee_agree'], 2, '.', '').'</b><br><br>';
						echo '<b style="color:green">Total Amount Paid in This Year: Rs. '.number_format((float)$f_paid, 2, '.', '').'</b><br><br>';
						echo '<table border="1" width="100%" border="0" width="100%" cellpadding="10" cellspacing="10">';
						echo '<tr><td width="70%" style="padding:5px;"  bgcolor="#FF0066">Month</td><td width="30%" style="padding:5px;"  bgcolor="#FF0066">Total Case</td></tr></table>';
					 if($numRows1)
					 {
					   while($data1 = $obj->fetchRow($query1))
				     {
					     $data1['month'];
					     $sql2 = "select count(*)  as c from client_records where month='".$data1['month']."' and  year='".$yr."'";
					    $query2 = $obj->executeQry($sql2,$link);
						echo '<table border="1" width="100%">';
					    
					    while($data2 = $obj->fetchRow($query2))
				     {
					    echo '<tr>';
						
						if($data1['month']==1)
						{
						  echo '<td width="70%" style="padding:5px;">January</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==2)
						{
						  echo '<td width="70%" style="padding:5px;">February</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==3)
						{
						  echo '<td width="70%" style="padding:5px;">March</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==4)
						{
						  echo '<td width="70%" style="padding:5px;">April</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==5)
						{
						  echo '<td width="70%" style="padding:5px;">May</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==6)
						{
						  echo '<td width="70%" style="padding:5px;">June</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==7)
						{
						  echo '<td width="70%" style="padding:5px;">July</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==8)
						{
						  echo '<td width="70%" style="padding:5px;">August</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==9)
						{
						  echo '<td width="70%" style="padding:5px;">September</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==10)
						{
						  echo '<td width="70%" style="padding:5px;">October</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==11)
						{
						  echo '<td width="70%" style="padding:5px;">Novmember</td><td width="30%">'.$data2['c'].'</td> ';
						}
						if($data1['month']==12)
						{
						  echo '<td width="70%" style="padding:5px;">December</td><td width="30%">'.$data2['c'].'</td> ';
						}
						echo  '</tr>';
					 }
					  echo  '</table>';
					 }
					}
					?>
					
					</div>
					 
				 
                 
                  <?php
				  }
				 
				  ?>
               
                <!--  end product-table................................... -->
                <input type="hidden" id="multiType" value="" name="sub_multiform">
              </form>
            </div>
            <!--  end content-table  -->
            <!--  start paging..................................................... -->
            <table border="0" cellpadding="0" cellspacing="0" id="paging-table" width="100%" align="center">
              <tr>
                <td align="left"><div id="actions-box"> <a href="javascript:void(0);" class="action-slider"></a>
                    <div id="actions-box-slider">
                 <!----------   <a onClick="javascript:return check_all('status');" href="javascript:void(0);" class="action-edit">Status</a> 
                    --><a onClick="javascript:return check_all('delete');" href="javascript:void(0);" class="action-delete">Delete</a> </div>
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
