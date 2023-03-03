<?php
require_once "user.php";
//require_once "../work";


class Assistant extends User{
    public $admin;
    public $availability = array("sat"=>0, 
                        "sun"=>0,"mon"=>0,
                        "tue"=>0,"wed"=>0,
                        "thu"=>0,"fri"=>0);


    //Add Data T
    public function new_Assistant(){
        
        $this->query("INSERT INTO `assistant` 
                    VALUES (".$this->id."
                    ,'".$this->full_name."'
                    ,'".$this->phone_no."'
                    ,'".$this->admin."'
                    ,'".$this->username."'
                    ,'".$this->password."')");

        $this->query("INSERT INTO `availability` 
                    VALUES (".$this->id."
                    ,'".$this->full_name."'
                    ,'".$this->availability["sat"]."'
                    ,'".$this->availability["sun"]."'
                    ,'".$this->availability["mon"]."'
                    ,'".$this->availability["tue"]."'
                    ,'".$this->availability["wed"]."'
                    ,'".$this->availability["thu"]."'
                    ,'".$this->availability["fri"]."')");
        
        return $this->view_1_Assistant();
    }

    //View Data T
    public function view_1_Assistant(){
        
        $this->select("`assistant`","`id` = ".$this->id) ; 
        return $this->fetch();
    }
    
    //View Data T
    public function view_All_Assistant(){

        $this->select("`assistant`") ; 
        return $this->fetchAll();
    }    

    //Edit Data T
    public function update_Assistant(Assistant $assisNew){
        $this->query("UPDATE `assistant` 
                    SET `id`= ".$assisNew->id.",
                    `name`= '".$assisNew->full_name."',
                    `phone`= '".$assisNew->phone_no."',
                    `admin`= '".$assisNew->admin."',
                    `username`= '".$assisNew->username."',
                    `password`= '".$assisNew->password."' 
                    WHERE `id`= ".$this->id);
    }
    
    //Delete Data T
    public function delete_Assistant(){
        
        $this->delete("`assistant`","`id` =".$this->id);
    }

    //View Avilability T
    public function view_All_Availability(){
        $this->select("`availability`");
        return $this->fetchAll();
    }

    public function view_1_Availability(){
        $this->select("`availability`","`assistant_id` = ".$this->id);
        return $this->fetch();
    }

    //Edit Avilability T
    public function update_Availability(Assistant $newAvil){
        $this->query("UPDATE `availability` 
                    SET `sat`= ".$newAvil->availability["sat"].",
                    `sun`=".$newAvil->availability["sun"].",
                    `mon`=".$newAvil->availability["mon"].",
                    `tue`=".$newAvil->availability["tue"].",
                    `wed`=".$newAvil->availability["wed"].",
                    `thu`=".$newAvil->availability["thu"].",
                    `fri`=".$newAvil->availability["fri"]." 
                    WHERE `assistant_id` = ".$this->id);
    }

    //View History T
    public function view_1_assistant_history(){
        $this->select("`assistant_history`",
                    "`assistant_1` = ".$this->id."
                    OR `assistant_2` = ".$this->id."
                    OR `assistant_3` = ".$this->id."
                    OR `assistant_4` = ".$this->id."
                    OR `assistant_5` = ".$this->id."
                    OR `assistant_6` = ".$this->id ,
                    "`date`, `year`, `center`");

        return $this->fetchAll();
    }

    //View History T
    public function view_All_assistant_history(){
        $this->select("`assistant_history`");

        return $this->fetchAll();
    }
}
?>