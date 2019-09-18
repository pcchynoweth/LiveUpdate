<?php  
  require_once './connection_info_live_test.php';
try {
 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "SELECT * FROM tbl_sample ORDER BY id DESC";  
 $stmt = $connect->prepare($sql);
 $stmt->execute();
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} 
 $output = '';
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Id</th>  
                     <th width="20%">First Name</th>  
                     <th width="20%">Last Name</th>  
                     <th width="5%">Delete</th>  
                </tr>';  
 if ($result)  
 {  
      foreach ($result as $row)
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
                     <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
