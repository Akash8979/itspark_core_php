<?php
include_once 'connection.php';

// get the post records
if($_POST['formData']['type'] == 1){
     $id = str_replace("'", "\'", $_POST['formData']['id']);
     $name = str_replace("'", "\'", $_POST['formData']['name']);
     $email = $_POST['formData']['email'];
     
     
     
     // database insert SQL code
     $sqlUpdate = "UPDATE  `users` SET `name`='$name', `email`='$email' WHERE `id` = '$id'";
     
     
     // insert in database 
     $rs = mysqli_query($conn, $sqlUpdate);
     
     
     if ($rs) {
          $data = 1;
     
          echo json_encode($data);
          return;
     }
     echo json_encode($rs);
     return;
}else if($_POST['formData']['type'] == 2){
     $id = str_replace("'", "\'", $_POST['formData']['id']);
       
     // database insert SQL code
     $sqldelete = "DELETE FROM `users` WHERE `id` = '$id'";
     
     
     // insert in database 
     $rs = mysqli_query($conn, $sqldelete);
     
     
     if ($rs) {
          $data = 1;
     
          echo json_encode($data);
          return;
     }
     echo json_encode($rs);
     return;
}else if($_POST['formData']['type'] == 3){
     $name = str_replace("'", "\'", $_POST['formData']['name']);
     $email = $_POST['formData']['email'];
     $password = '$2y$10$oWgRzax6mHSqliMKhbGdnOehIrc9hpFzJNMY/cX2RafHFfQMGVmJW';
     
     
     
     // database insert SQL code
     $sqladd = "INSERT INTO  `users` ( `name`, `email`,`password`) VALUES ('$name', '$email','$password')";
     
     
     // insert in database 
     $rs = mysqli_query($conn, $sqladd);
     
     
     if ($rs) {
          $data = 1;
     
          echo json_encode($data);
          return;
     }
     echo json_encode($rs);
     return;
}

