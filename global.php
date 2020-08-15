<?php
session_start();
//error_reporting("E_ALL & ~E_NOTICE");
include('connection.php');
function getDataByJson($cdata)
{
   $data = array();
    if(isset($cdata))
    {
    	$data = json_decode($cdata);
	    return $data;
	}
}
/* used to insert records in DB */
function insertQuery($table, $arr) {

    $sql = "insert into $table SET ";
    $c = 0;
    foreach ($arr as $key => $val) {
        if ($c == 0) {

            $sql .= "$key='" . htmlentities($val, ENT_QUOTES) . "'";
        } else {
            $sql .= ", $key='" . htmlentities($val, ENT_QUOTES) . "'";
        }
        $c++;
    }

    @mysql_query($sql) or die(mysql_error());
   
    return mysql_insert_id();
}
/* used to update records in DB */
function updateQuery($table, $arr, $condition) {
    
    $sql = "update $table SET ";
       
    $c = 0;
    foreach ($arr as $key => $val) {
        if ($c == 0) {
            $sql .= "$key='" . htmlentities($val, ENT_QUOTES) . "'";
        } else {
            $sql .= ", $key='" . htmlentities($val, ENT_QUOTES) . "'";
        }
        $c++;
    }
    $sql.=$condition;
	
    $result = mysql_query($sql) or die(mysql_error());
    return $result;
}

function getdataTable($sql) {

// Array ( [email] => krishna [password] => krishna ) 

    $result = mysql_query($sql) or die(mysql_error());
    return $result;
}

function getRecods($table,$fields='*',$cond="",$grp="",$limit="",$ord="") {

// Array ( [email] => krishna [password] => krishna ) 
     $sql = "select $fields from $table ";
     if($cond!=""){
        $sql.=" where $cond";
     }
     if($ord!=""){
        $sql.=" GROUP BY $grp";
     }
      if($grp!=""){
        $sql.=" ORDER BY $grp";
     }
      if($limit!=""){
        $sql.=" LIMIT $limit";
     }
    $result = mysql_query($sql) or die(mysql_error());
    return $result;
}

function getDataRowById($table, $id) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where id='$id'";

    $result = mysql_query($sql) or die(mysql_error());
   // $rs = mysql_num_rows($result);
    $rs= mysql_fetch_assoc($result);
    return $rs;
}

function getDataRowByUserId($table, $id, $field_name) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where $field_name='$id'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_num_rows($result);
    return $rs;
}

function getDataRowById2($table, $id, $field_name) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where $field_name='$id'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_fetch_object($result);
    return $rs;
}

function getDataRowById3($table, $id, $fid, $field1_name, $field2_name) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from $table where $field1_name='$id'and $field2_name='$fid'";

    $result = mysql_query($sql) or die(mysql_error());
    $rs = mysql_fetch_object($result);
    return $sql;
}

/* user deletion  code */

function deleteDataRowByUserId($table, $field_name, $id) {
    
    $sql = "update $table SET is_delete=2 where $field_name='$id'";
  
    $result = mysql_query($sql) or die(mysql_error());
    echo $result;
}
/* Delete all selected user*/
function deleteAllDataRow($table, $field_name, $id) {
      
    for($i=1;$i<=count($id);$i++)
    {
    $sql = "update $table SET is_delete=2  where $field_name='".$id[$i]."'";
    $result = mysql_query($sql) or die(mysql_error());
    }
    echo $result;
}

/* user status change code */

function userStatus($uid, $status, $table) {

    if ($status == 1) {
        $sql = "update $table set status='2' where id='$uid'";
    } else {
        $sql = "update $table set status='1' where id='$uid'";
    }
    $result = mysql_query($sql) or die(mysql_error());
    echo $result;
}
function adminLogin($data)
{
   $username= mysql_real_escape_string($data['username']);
   
   $sql=  mysql_query("select count(*) as result from admin where username='".$username."' and  password='".$data['password']."'");
   $row =  mysql_fetch_array($sql);
   return $row['result'];
 }
 
 function getSearchData($data)
 {
     $sql=mysql("select * from sign_up where first_name like '%$data%'");
     
 }
 function getDataByCid($id) {
//	Array ( [email] => krishna [password] => krishna ) 

    $sql = "select * from states where countryid='$id'";
 
    $result = mysql_query($sql) or die(mysql_error());
   // $rs = mysql_num_rows($result);
   
    return $result;
}
// get number of existing row
function getCountRowById($table, $id) {
//	Array ( [email] => krishna [password] => krishna ) 

   
    $sql="SELECT count(*) as num_row FROM $table WHERE user_id='$id'";
    $result = mysql_query($sql) or die(mysql_error());
   // $rs = mysql_num_rows($result);
    $rs= mysql_fetch_array($result);
    return $rs['num_row'];
}
?>