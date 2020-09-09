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
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
     $editid=$_POST['hid'];
    $obj->UpdateRecord($name,$email,$editid);
}//if isset close
if(isset($_GET['deleteid'])){
    $delid=$_GET['deleteid'];
   
    $obj->DeleteRecord($delid);
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

    <!--- success alert -->
    <?php
    if(isset($_GET['msg']) and $_GET['msg'] == 'ins'){
        echo '<div class="alert alert-primary role="alert">Insert Data successfully</div>';
    }
    if(isset($_GET['msg']) and $_GET['msg'] == 'ups'){
        echo '<div class="alert alert-primary role="alert">Update Data successfully</div>';
    }

    if(isset($_GET['msg']) and $_GET['msg'] == 'del'){
        echo '<div class="alert alert-primary role="alert">Data Deleted successfully</div>';
    }

    ?> 

        <?php
            if(isset($_GET['editid'])){
            $editid=$_GET['editid'];
            $myrecord=$obj->DisplayRecordById($editid);
           
        ?>
             <form action="index.php" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $myrecord['name'];?>" placeholder="Enter Your Name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $myrecord['email'];?>" placeholder="Enter Your E-mail" class="form-control">
            </div>
            <div class="form-group">
             <input type="hidden" name="hid"  value="<?php echo $myrecord['id'];?>">
                <input type="submit" name="update" value="Update " class="btn btn-info">
            </div>

    </form><br>

        <?php
        }else{
        ?>
    <form action="index.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter Your E-mail" class="form-control">
        </div>
        <div class="form-group">
         
            <input type="submit" name="submit" value="submit " class="btn btn-info">
        </div>

    </form>
    <?php }//else close ?>
    <br>
    <h4 class="text-center text-danger">Display Records</h4>
    <table class="table table-bordered">
        <tr class="bg-primary text-center">
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
        <?php 
        $data=$obj->DisplayRecord();
        $sno=1;
        foreach ($data as $value) {
           ?>
           <tr class="text-center">
               <td><?php echo $sno++; ?></td>
               <td><?php echo $value['name']; ?></td>
               <td><?php echo $value['email']; ?></td>
               <td><a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">EDIT</a>
                <a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn btn-danger">DELETE</a>
                </td>
              
               
           </tr>

        <?php  
        }//foreach close
        ?>
    </table>
</div>
</div>
 </body> 
 </html>