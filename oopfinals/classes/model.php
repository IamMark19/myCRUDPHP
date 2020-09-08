<?php
require_once 'connect.php';
class model extends connection{
public function InsertRecord($name,$email){

         $sql= "INSERT INTO `student`(`name`, `email`) VALUES ('$name','$email')";
        $result = $this->conn->query($sql);
        if($result){
        header('location:index.php?msg=ins');
       }else{
        echo"error".$sql."<br>".$this->conn->error;
            } 
        }

}
?>
