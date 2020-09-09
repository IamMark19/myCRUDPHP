<?php
class connection{

    private $servername='localhost';
    private $username='root';
    private $password='target12191997';
    private $dbname='crud_system';
    protected $conn;

    function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
			die('Could not connect to the database');
		}else{
            return $this->conn;
		}

        }//constract close

        
            public function getConnection(){
                return $this->conn;
         }
}//class close


?>