<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "it_spark";
$baseUrl  = "http://localhost:3000/";



$conn = mysqli_connect($serverName,$userName,$password,$dbName);

if (!$conn) {
    die("connect failed".mysqli_connect_error());
}

$sql = "SELECT * FROM users";

$users = mysqli_query($conn,$sql);

// if (mysqli_num_rows($result) > 0) {
//    while ($row = mysqli_fetch_assoc($result)) {
//        echo $row["id"]."<br/>";
//    }
// }else{
//      echo "0 result";
// }

// var_dump($result);