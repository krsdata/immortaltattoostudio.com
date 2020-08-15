<?php 
error_reporting(0);
mysql_connect('localhost','immortal_user','@123!user@');
mysql_select_db('immortal_db');
$sql = mysql_query("select * from subscribe order by id DESC");
?>
<table align="center" border="1" width="70%">
<tr>
<td colspan="7" align="center">
<strong style="color:#00CC33"> Subscriber List</strong>
</td>
</tr>
<tr>
<td><strong>Srn.</strong></td>
<td><strong>Name</strong></td>
<td><strong>Email</strong></td>
<td><strong>Phone</strong></td>
<td><strong>Comments</strong></td>
<td><strong>Interested in</strong> </td>
<td><strong>Submited date</strong> </td>
</tr>
<?php 
$i=1;
while($row = mysql_fetch_assoc($sql))
{
 
?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['comments']; ?></td>
<td><?php echo $row['interest_in']; ?></td>
<td><?php echo $row['created_at']; ?></td>
</tr>
<?php } ?>
</table>