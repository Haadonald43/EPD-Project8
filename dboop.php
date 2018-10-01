<?php
class db {
    private $servername;
    private $username;
    private $password;
    private $dbname;


    protected function connect() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "project7";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        //Check coate connecnnection
        if ($conn->connect_error)
        {
            die("Connection failed: " .$conn->connect_error);
        }
        return $conn;
    }

    public  function getResult($qry){
        $result = $this->connect()->query($qry);
        //$numrows = $result->num_rows;
        return $result;
    }

}

?>
