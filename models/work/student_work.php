<?php

class Student_Work {

    public $year;
    public $type;
    public $grade;
    public $date;
    public $center;

    //new day
    public function new_Student_Day(Student_Work $student_day){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->class){
                case '3rd sec':
                    $query = "alter table `3rd quizzes`
                        ADD `$student->day` VARCHAR(5) 
                        CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                        AFTER `id`;";
                    break;
                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan math quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo math quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan mech quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo mech quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `1st helwan quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `1st mayo quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                default:
                    echo 'error in class';
            }
            $result = $this->db->insert($query);

            if($result != false){
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

    //edit day
    public function edit_Student_Day(Student_Work $old_student_day, Student_Work $new_student_day){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->class){
                case '3rd sec':
                    $query = "alter table `3rd quizzes`
                        ADD `$student->day` VARCHAR(5) 
                        CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                        AFTER `id`;";
                    break;
                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan math quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo math quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan mech quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo mech quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `1st helwan quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `1st mayo quizzes`
                                    ADD `$student->day` VARCHAR(5) 
                                    CHARACTER SET utf8 COLLATE utf8_general_ci NULL 
                                    AFTER `id`;";
                            break;
                    }
                    break;
                    
                default:
                    echo 'error in class';
            }
            $result = $this->db->insert($query);

            if($result != false){
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

    //add grades
    public function add_All_Grades(Student_Work $student_day){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->class){
                case '3rd sec':
                    $query = "update `3rd quizzes` 
                            set `$student->day`= '$student->grade'
                            where `3rd quizzes`.`id` = '$student->id'";
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "update `2nd helwan math quizzes` 
                                    set `$student->day`= '$student->grade'
                                    where `id` = '$student->id'";
                            break;
        
                        case 'Mayo':
                            $query = "update `2nd mayo math quizzes` 
                                    set `$student->day`= '$student->grade'
                                    where `id` = '$student->id'";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "update `2nd helwan mech quizzes` 
                                    set `$student->day`= '$student->grade'
                                    where `id` = '$student->id'";
                            break;
        
                        case 'Mayo':
                            $query = "update `2nd mayo mech quizzes` 
                                    set `$student->day`= '$student->grade'
                                    where `id` = '$student->id'";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query = "update `1st helwan quizzes` 
                                set `$student->day`= '$student->grade'
                                where `id` = '$student->id'";
                            break;
        
                        case 'Mayo':
                            $query = "update `1st mayo quizzes` 
                                set `$student->day`= '$student->grade'
                                where `id` = '$student->id'";
                            break;
                    }
                    break;

                default:
                echo 'error in class';
            }
            
            $result = $this->db->insert($query);
        
            if($result != false){
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

    //add 1 grades
    public function add_1_grade(Student_Work $student_day, Student $student){

    }

    //edit 1 grades
    public function edit_1_grade(Student_Work $student_day, Student $old_Student, Student $neW_Student){
        
    }

    //drop student day
    public function drop_Student_Day(Student_Work $student_day){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->class){
                case '3rd sec':
                    $query = "alter table `3rd quizzes` 
                        DROP `$student->day`;";
                    break;
                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan math quizzes` 
                                    DROP `$student->day`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo math quizzes` 
                                    DROP `$student->day`;";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `2nd helwan mech quizzes` 
                                    DROP `$student->day`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `2nd mayo mech quizzes` 
                                    DROP `$student->day`;";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query = "alter table `1st helwan quizzes` 
                                    DROP `$student->day`;";
                            break;
        
                        case 'Mayo':
                            $query = "alter table `1st mayo quizzes` 
                                    DROP `$student->day`;";
                            break;
                    }
                    break;
                    
                default:
                    echo 'error in class';
            }
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