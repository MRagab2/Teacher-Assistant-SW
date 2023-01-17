<?php
require_once "assistant.php";
require_once "../../controllers/dbController.php";

class Teacher extends Assistant{
    private $db;

    /*View Data*/
    public function view_All_Assistant(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `assistants data`
                    ORDER BY `id`";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    /*Add Data*/
    public function newAssistantData(Assistant $assis){
        $this->db = new DBController;

        if($this->db->openConnection()){

            $query="insert into `assistants data` 
                    values('$assis->full_name',
                    '$assis->id','$assis->phone_no',
                    '$assis->username','$assis->password');";
            $result = $this->db->insert($query);

            $Query="insert into `assistants availability` (`id`,`name`) 
                    values ('$assis->id','$assis->full_name');";
            $Result = $this->db->insert($Query);

            if ($result != false && $Result != false) {
                $this->db->closeConnection();
                return true;
            }
            else {
                $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else{
            echo "Error in Database Connection";
            return false;
        }
    }

    /*Delete Data*/

    public function deleteAssistantData(Assistant $assis){
        $this->db = new DBController;

        if($this->db->openConnection()){

            $query = "delete from `assistants data` 
                    WHERE `assistants data`.`id` = '$assis->id';";
            $result = $this->db->delete($query);

            if ($result != false) {
                $this->db->closeConnection();
                return true;
            }
            else {
                $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else{
            echo "Error in Database Connection";
            return false;
        }
    }

}