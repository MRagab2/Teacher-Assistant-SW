<?php
require_once __DIR__."/../db_controller.php";

 abstract class Class_Work extends DB_Controller{
    
    public $date;
    public $year;
    public $center;
    public $book;
    public $page_no = array();

    public function __construct(){
        //Add from the database config file
        global $config;

        //Call Paretn Constructor
        parent::__construct($config);
    }

    /*View History*/
    public function view_1_Day_History(){
        
    }

    //view dates of attendance
    public function view_1_Class_Attendance_Dates(){
        
    }
     
    //View History F
    public function view_All_workdays(){}

    /*New Work Day*/
    public function new_workday(Class_Work $workday){}

    /*Edit Work Day*/
    public function edit_workday(Class_Work $workday){}

    /*Delete Work Day*/
    public function delete_workday(Class_Work $workday){}
    
}