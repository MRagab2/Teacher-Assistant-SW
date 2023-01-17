<?php 

class DBController
{
    
    public $dbHost="localhost";
    public $dbUser="root";
    public $dbPassword="";
    public $dbName="bob22/23";
    public $connection;

    public function openConnection()
    {
        $this->connection=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
        if($this->connection->connect_error)
        {
            echo " Error in Connection : ".$this->connection->connect_error;
            return false;
        }
        else
        {
            return true;
        }
    }

    public function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
        }
        else
        {
            echo "Connection is not opened";
        }
    }

    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function select1($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return $result->fetch_assoc();
        }
    }
    public function selectNum($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return $result->fetch_all();
        }
    }
    public function selectNum1($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return $result->fetch_assoc(MYSQLI_NUM);
        }
    }

    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{        
            return true;
        }

    }

    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){        
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return true;
        }
    }
    public function alter($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result){        
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else{
            return true;
        }
    }

}

?>