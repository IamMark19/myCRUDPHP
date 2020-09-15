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
     <title>Basic Crud using mysql</title>
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
<br>
    <h4 class="text-center text-danger">Display Records</h4>
 
   
    <form action="index.php" method="GET">
         <input type="text" name="search" value="<?php echo $_GET['search'] ?>" placeholder="search" >
         <button type="submit" name="btn-search" value="search" class="btn btn-danger">Search</button>
         </form> 
       <a class="btn btn-danger" href="add.php">Add Student</a>
        <?php 
            $data = []; //Storage of student;
            $obj= new model();  // Object

            //search button dapt ung iveverify, ichecheck kung ngsearch ba si user
            if(isset($_GET['btn-search']))
            {
                $s=$_GET['search'];
                $data = $obj->DisplayRecordbySearch($s);
            }
            else
            {
                $data = $obj->DisplayRecordbySearch();
            }

            //var_dump($data);
        ?>
                

    <table class="table table-bordered"> 
        <tr class="bg-primary text-center">
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
        <?php       
       $sno=1;
       if(count($data))
       {
            foreach ($data as $value) 
            { ?>
                <tr class="text-center">
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><a href="edit.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">EDIT</a>
                    <a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
                <?php 
            }
       }
       else{
           echo '<tr><td colspan="4">No Records Found</td></tr>';
       }
       ?>
   </table>




  
</div>
</div>
 </body> 
 </html>