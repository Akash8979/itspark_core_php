<?php

class allAction
{
     private $serverName = "localhost";
     private $userName = "root";
     private $password = "";
     private $dbName = "it_spark";

     function __construct()
     {
          $this->connection();
     }

     private function connection()
     {
          $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
     }

     public function addUser($name, $email, $password)
     {

          // database insert SQL code
          $sqladd = "INSERT INTO  `users` ( `name`, `email`,`password`) VALUES ('$name', '$email','$password')";


          // insert in database 
          $rs = mysqli_query($this->conn, $sqladd);


          if ($rs) {
               return 1;
          } else {
               return 0;
          }
     }
     public function updateUser($name, $email, $id)
     {
          // database update SQL code
          $sqlUpdate = "UPDATE  `users` SET `name`='$name', `email`='$email' WHERE `id` = '$id'"; 
          $rs = mysqli_query($this->conn, $sqlUpdate);

          if ($rs) {
               return 1;
          } else {
               return 0;
          }
     }
     public function deleteUser($id)
     {
        
          $sqldelete = "DELETE FROM `users` WHERE `id` = '$id'";

          $rs = mysqli_query($this->conn, $sqldelete);
          if ($rs) {
               return 1;
          } else {
               return 0;
          }
     }
}

// get the post records
if ($_POST['formData']['type'] == 1) {
     $id = str_replace("'", "\'", $_POST['formData']['id']);
     $name = str_replace("'", "\'", $_POST['formData']['name']);
     $email = $_POST['formData']['email'];

     $User = new allAction();

     $responce = $User->updateUser($name, $email, $id);
     if ($responce == 1) {
          $data = 1;

          echo json_encode($data);
          return;
     } else {
          echo json_encode($rs);
          return;
     }
} else if ($_POST['formData']['type'] == 2) {
     $id = str_replace("'", "\'", $_POST['formData']['id']);

     $User = new allAction();

     $responce = $User->deleteUser($id);

     if ($responce == 1) {
          $data = 1;

          echo json_encode($data);
          return;
     } else {
          echo json_encode($rs);
          return;
     }
} else if ($_POST['formData']['type'] == 3) {
     $name = str_replace("'", "\'", $_POST['formData']['name']);
     $email = $_POST['formData']['email'];
     $password = '$2y$10$oWgRzax6mHSqliMKhbGdnOehIrc9hpFzJNMY/cX2RafHFfQMGVmJW';

     $User = new allAction();

     $responce = $User->addUser($name, $email, $password);
     if ($responce == 1) {
          $data = 1;

          echo json_encode($data);
          return;
     } else {
          echo json_encode($rs);
          return;
     }
}
