<?php
require_once "question.php";

class Quiz extends Question implements WorkFun{

    /*New Work Day*/
    public function new_workday(Class_Work $workday){}
    
    /*Edit Work Day*/
    public function edit_workday(Class_Work $workday){}

    /*Delete Work Day*/
    public function delete_workday(Class_Work $workday){}
}