<?php
require_once "class_work.php";

class Homework extends Class_Work{


    /*New Work Day*/
    public function new_workday(Class_Work $workday){}
    
    /*Edit Work Day*/
    public function edit_workday(Class_Work $workday){}

    /*Delete Work Day*/
    public function delete_workday(Class_Work $workday){}
    
    //view dates of HW
    public function view_1_Class_HW_Dates(){
        $this->query("select COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = '".$this->year."_".$this->center."_hw_grade'
                    AND COLUMN_NAME != 'student_name'
                    AND COLUMN_NAME != 'student_id'
                    ORDER BY ORDINAL_POSITION;");
        return $this->fetchAll();
    }
}