<?php

 abstract class Class_Work {
    
    public $date;
    public $year;
    public $book;
    public $page_no = array();

    private $db;

    /*View History*/
    public function view_1_Day_History(AssisHitory $day){
        $this->db=new DBController;

        if($this->db->openConnection()){
            $query="select * 
                    from `assistants history` 
                    where `assistants history`.`date`= '$day->date'";
            return $this->db->select1($query);
        }
        else{
            echo "Error in Database Connection";
            return false; 
        }
    }

}

interface WorkFun {
        
        /*New Work Day*/
        public function new_workday(Class_Work $workday);
    
        /*Edit Work Day*/
        public function edit_workday(Class_Work $workday);
    
        /*Delete Work Day*/
        public function delete_workday(Class_Work $workday);
    
}
