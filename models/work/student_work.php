<?php
require_once __DIR__."/../db_controller.php";
require_once __DIR__."/../user/student.php";

class Student_Work extends DB_Controller{

    public $year;
    public $type;   //{quiz_grade , hw_grade , exam_grade , attendance}
    public $grade;
    public $date;
    public $center;

    public function __construct(){
        //Add from the database config file
        global $config;

        //Call Paretn Constructor
        parent::__construct($config);
    }

    //new day 
    public function new_Student_Day(){
        $this->query("ALTER TABLE `".$this->year."_".$this->center."_".$this->type."`
                        ADD `".$this->date."` FLOAT NULL AFTER `student_name`");
    }

    //edit day 
    public function update_Student_Day(Student_Work $new_student_day){ 

        $this->query("ALTER TABLE `".$this->year."_".$this->center."_".$this->type."`
                    CHANGE `".$this->date."` `".$new_student_day->date."` FLOAT NULL DEFAULT NULL;");
    }

    //add grades
    public function add_All_Grades($student_grades){
        foreach($student_grades as $student){
            $this->query("UPDATE `".$this->year."_".$this->center."_".$this->type."` 
                        SET `".$this->date."` = ".$student["grade"]." 
                        WHERE `student_id` = ".$student["id"]);
        }
    }

    //add 1 grades
    public function add_1_grade(Student $student){
        $this->query("UPDATE `".$this->year."_".$this->center."_".$this->type."` 
                    SET `".$this->date."` = ".$this->grade." 
                    WHERE `student_id` = ".$student->id);
    }

    //drop student day
    public function drop_Student_Day(){
        $this->query("ALTER TABLE `".$this->year."_".$this->center."_".$this->type."` 
                    DROP `".$this->date."`;");
    }

    //view 1 class all quizzes
    public function view_grades(){
        $this->select("`".$this->year."_".$this->center."_".$this->type."`");
        return $this->fetchAll();
    }

}