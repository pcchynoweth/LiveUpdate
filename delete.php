<?php  
 require_once './connection_info_live_test.php';
 
 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  $sql = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";  
  if ($connect->exec($sql))  
  {  
      echo 'Data Deleted';  
  }  
?>
