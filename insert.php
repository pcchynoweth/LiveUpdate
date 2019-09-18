<?php  
 require_once './connection_info_live_test.php';
 
 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "INSERT INTO tbl_sample(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
 if ($connect->exec($sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 
