<?php include_once('header.php'); ?>
<?php 

$limit = 16;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;

$sql = mysql_query("select * from gallery order by id DESC  LIMIT $start_from , $limit");
//$row =  mysql_fetch_array($sql);

//var_dump($row);  die;
?>
<style>
	.image img {
  height: 170px;
  width: 100%;
}
	</style>
		<div class="panel-3" style="height:auto">
			<div class="faq-main">
				<h2 class="page-title">Gallery</h2>
					<div  align="right" style="color:#fff;font-size: 25px;font-family: -webkit-body;padding-right: 58px;padding-bottom: 6px;" >
		<?php  
$sql2 = "SELECT COUNT(id) FROM gallery";  
$rs_result = mysql_query($sql2);  
$row2 = mysql_fetch_row($rs_result);  
$total_records = $row2[0];  
 
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
    
    if($i==1){
        $delimeter = 'First';
    }elseif($i==$total_pages){
        $delimeter = "Last";
    }
    else{
        $delimeter = $i;
    }
    
             $pagLink .= "<a href='gallery.php?page=".$i."'> ".$delimeter." </a>";  
};  
echo $pagLink . "</div>";  
?>

	</div>	
					<div class="grid-list-tattoo">
						<?php 
							while($row =  mysql_fetch_array($sql))
							{
							
						?>
						<div class="image">
				        <a href="admin-tattoo/uploads/<?php echo $row['file_name']; ?>" title="" class="group1">
				        <img src="admin-tattoo/uploads/<?php echo $row['file_name']; ?>">				
				        </a>
				        </div>
						<?php } ?>
					</div>	
</div>



		</div>
	
	
		
		<div class="our-tattoo panel-5" align="center">
			 Our   Tattoos 
		</div> 
		 
<?php include_once('footer.php'); ?>		