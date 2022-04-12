<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>Admin List</title>
     
</head>

<body>



     <div class="table-responsive mt-4 mx-auto" style="width: 70%;">
          <h5><Button class="btn btn-primary btn-lg" id="toAddNewUser">ADD NEW USER</Button></h5>
          <h1>Admin list</h1>
          <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
               <thead>
                    <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th class="text-center">Actions</th>
                    </tr>
               </thead>
               <tbody id="userTable">
                    <?php
                    foreach ($users as $user) {
                         echo '<tr userID="' . $user["id"] . '"><td>' . $user["name"] . '</td><td>' . $user["email"] . '</td><td class="action-btn wspace-no text-center"><button class="btn btn-primary edit mx-2">Edit</button><button class="btn btn-danger delete">Delete</button></td></tr>';
                    }
                    ?>
               </tbody>
          </table>
     </div>











     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <script src="assets/js/main.js"></script>

</body>

</html>