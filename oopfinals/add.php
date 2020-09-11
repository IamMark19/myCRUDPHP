        
   <?php

require_once 'classes/connect.php';
require_once 'classes/model.php';

$obj = new model();
//$obj = new connection();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $obj->InsertRecord($name,$email);
}//if isset close
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Basic Crud</title>
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
     <script type="text/javascript" src="bootstrap/js/bootstap.js"></script>

 </head>
 <body><br>
<h2 class="text-center text-info">Basic Crud OOP</h2><br>
<div class="wrapper">
<div class="container">
 <form action="index.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Your Name" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter Your E-mail" class="form-control" required="">
        </div>
        <div class="form-group">
         
            <input type="submit" name="submit" value="submit " class="btn btn-info">
        </div></form>



        </div>
</div>
 </body> 
 </html>