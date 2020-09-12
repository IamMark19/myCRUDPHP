<?php
require_once 'connect.php';
class model extends connection{


public function DisplayRecord(){

            $sql="SELECT * from student";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }

                    return $data;
            }//if close
        }//function close


        //$s = null ay para optional ung paglalagay ng $s parameter
        public function DisplayRecordbySearch($s = null){
            if(!empty($s)){
            $sql="SELECT * from student Where name = '$s' AND email = 's' ";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }

                    return $data;
            }//if close
        }//function close
    
    else{
            $sql="SELECT * from student ";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }

                    return $data;
            }//if close
        }//function close
        }
        public function DisplayRecordById($editid){

            $sql="SELECT * from student where id='$editid' ";
            $result = $this->conn->query($sql);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                return $row;
            }
        }

        


        public function InsertRecord($name,$email){

            $sql= "INSERT INTO `student`(`name`, `email`) VALUES ('$name','$email')";
            $result = $this->conn->query($sql);
            if($result){
                header('location:index.php?msg=ins');
            }else{
                echo"error".$sql."<br>".$this->conn->error;
                } 
        }

        public function UpdateRecord($name,$email,$editid){
        $sql= "UPDATE student SET name='$name',email='$email' WHERE id='$editid'";
        $result = $this->conn->query($sql);
        if($result){
        header('location:index.php?msg=ups');
       }else{
        echo"error".$sql."<br>".$this->conn->error;
            } 
        }

        public function DeleteRecord($delid){
            $sql="DELETE from student WHERE id='$delid'";
            $result = $this->conn->query($sql);
            if($result){
            header('location:index.php?msg=del');
            }else{
                echo"error".$sql."<br>".$this->conn->error;

            } 
            }   
}
?>
