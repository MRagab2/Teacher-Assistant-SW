<?php
require_once "user.php";

class Student extends User implements UserFun{

    public $year;
    public $phone_no;
    public $parentNum1  = null;
    public $parentNum2  = null;
    public $school      = null;
    public $lec         = null;
    public $center      = 'Helwan';

    private $db;

    /*Add Data*/
    public function new_Student(Student $student){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->center){
                case 'Helwan': 
                    $QUERY = "insert into `student data helwan` (`name`,`id`,`person num`,`parent num1`,
                            `parent num2`,`school`,`lec`,`class`)
                            values ('$student->full_name','$student->id','$student->phone_no'
                            ,'$student->parentNum1','$student->parentNum2','$student->school'
                            ,'$student->lec','$student->year');";
                    $RESULT = $this->db->insert($QUERY);
                    
                    $query0 = "select * from `student data mayo`";
                    $query2 = "select * from `student data mayo`";
                    $query1 = "select * from `student data mayo`";
                    $query3 = "select * from `student data mayo`";
                    switch($student->year){
                        case '3rd sec':
                            $QUery = "insert into `3rd exams` (`name`,`id`) 
                                        values ('$student->full_name','$student->id');";
                            break;

                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $QUery = "insert into `2nd helwan math exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $QUery = "insert into `2nd helwan mech exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUery = "insert into `2nd helwan math exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query0 = "insert into `2nd helwan mech exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;                                                  
                            }
                            break;

                        case '1st sec':
                            $QUery = "insert into `1st helwan exams` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                    
                    }
                    $result0 = $this->db->insert($query0);
                    $REsult = $this->db->insert($QUery);
                    switch($student->class){
                        case '3rd sec':
                            $Query = "insert into `3rd quizzes` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;
                            
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $Query = "insert into `2nd helwan math quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                
                                case 'Mech':
                                    $Query = "insert into `2nd helwan mech quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default :
                                    $Query = "insert into `2nd helwan math quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query1 = "insert into `2nd helwan mech quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;                             
                                }
                            break;

                        case '1st sec':
                            $Query = "insert into `1st helwan quizzes` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result1 = $this->db->insert($query1);           
                    $Result = $this->db->insert($Query);
                    switch($student->class){
                        case '3rd sec':
                            $QUEry = "insert into `3rd attendance` (`name`,`id`) 
                                values ('$student->full_name','$student->id');";
                            break;

                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $QUEry = "insert into `2nd helwan math attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $QUEry = "insert into `2nd helwan mech attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUEry = "insert into `2nd helwan math attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query2 = "insert into `2nd helwan mech attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;                                
                            }
                            break;

                        case '1st sec':
                            $QUEry = "insert into `1st helwan attendance` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result2 = $this->db->insert($query2);
                    $RESult = $this->db->insert($QUEry);

                    switch($student->class){
                        case '3rd sec':
                            $QUERy = "insert into `3rd homework` (`name`,`id`) 
                                values ('$student->full_name','$student->id');";
                            break;
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $QUERy = "insert into `2nd helwan math homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $QUERy = "insert into `2nd helwan mech homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUERy = "insert into `2nd helwan math homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query3 = "insert into `2nd helwan mech homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;                                 
                            }
                            break;
                        case '1st sec':
                            $QUERy = "insert into `1st helwan homework` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result3 = $this->db->insert($query3);
                    $RESUlt = $this->db->insert($QUERy);
                    
                    if ($RESULT != false && $Result != false && $REsult != false && $RESult != false) {
                        $this->db->closeConnection();
                        return true;
                    }
                    else {
                        $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                        $this->db->closeConnection();
                        return false;
                    }
                    break;

                case 'Mayo': 
                    $QUERY = "insert into `student data mayo` (`name`,`id`,`person num`,`parent num1`,
                            `parent num2`,`school`,`lec`,`class`)
                            values ('$student->full_name','$student->id','$student->personNum'
                            ,'$student->parentNum1','$student->parentNum2'
                            ,'$student->school','$student->lec','$student->class');";
                    $RESULT = $this->db->insert($QUERY);

                    
                    $query0 = "select * from `student data mayo`";
                    $query2 = "select * from `student data mayo`";
                    $query1 = "select * from `student data mayo`";
                    $query3 = "select * from `student data mayo`";
                    switch($student->class){
                        
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':                                
                                    $QUery = "insert into `2nd mayo math exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $QUery = "insert into `2nd mayo mech exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUery = "insert into `2nd mayo math exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query0 = "insert into `2nd mayo mech exams` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                                    
                            }
                            break;

                        case '1st sec':                        
                            $QUery = "insert into `1st mayo exams` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                        
                    }
                    $result0 = $this->db->insert($query0);
                    $REsult = $this->db->insert($QUery);
                    switch($student->class){
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $Query = "insert into `2nd mayo math quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $Query = "insert into `2nd mayo mech quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default :
                                    $Query = "insert into `2nd mayo math quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query1 = "insert into `2nd mayo mech quizzes` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                
                                }
                            break;

                        case '1st sec':
                            $Query = "insert into `1st mayo quizzes` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result1 = $this->db->insert($query1);           
                    $Result = $this->db->insert($Query);
                    switch($student->class){
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                $QUEry = "insert into `2nd mayo math attendance` (`name`,`id`) 
                                        values ('$student->full_name','$student->id');";
                                break;
                                    
                                case 'Mech':
                                    $QUEry = "insert into `2nd mayo mech attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUEry = "insert into `2nd mayo math attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query2 = "insert into `2nd mayo mech attendance` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                            }
                            break;

                        case '1st sec':                        
                            $QUEry = "insert into `1st mayo attendance` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result2 = $this->db->insert($query2);
                    $RESult = $this->db->insert($QUEry);

                    switch($student->class){                    
                        case '2nd sec':
                            switch($student->lec){
                                case 'Math':
                                    $QUERy = "insert into `2nd mayo math homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                case 'Mech':
                                    $QUERy = "insert into `2nd mayo mech homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;
                                    
                                default:
                                    $QUERy = "insert into `2nd mayo math homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    $query3 = "insert into `2nd mayo mech homework` (`name`,`id`) 
                                            values ('$student->full_name','$student->id');";
                                    break;                                 
                            }
                            break;
                        case '1st sec':
                            $QUERy = "insert into `1st mayo homework` (`name`,`id`) 
                                    values ('$student->full_name','$student->id');";
                            break;                        
                    }
                    $result3 = $this->db->insert($query3);
                    $RESUlt = $this->db->insert($QUERy);
                    
                    if ($RESULT != false && $Result != false && $REsult != false && $RESult != false) {
                        $this->db->closeConnection();
                        return true;
                    }
                    else {
                        $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                        $this->db->closeConnection();
                        return false;
                    }
                    break;
            }           
        }
        else{
            echo "Error in Database Connection";
            return false;
        }
    }

    //view one student data
    public function view_1_Student(Student $student){
        $this->db=new DBController;

        if($this->db->openConnection()){  
            switch($student->center){
                case 'Helwan':
                    $query = "select *
                            from `student data helwan`
                            where `id`= '$student->id'
                            ORDER BY `id` ASC";
                break;

                case 'Mayo':
                    $query="select *
                            from `student data mayo`
                            where `id`= '$student->id'
                            ORDER BY `id` ASC";
                break;
            }
                
                $result = $this->db->select1($query);
                return $result;            
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    /*Edit Data*/
    public function edit_Student(Student $old_Student, Student $new_Student){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($old_Student->center){
                case 'Helwan':
                    $query = "update `student data helwan` 
                                SET `name`='$new_Student->name',
                                `id`='$new_Student->id',
                                `person num`='$new_Student->personNum',
                                `parent num1`='$new_Student->ParentNum1',
                                `parent num2`='$new_Student->ParentNum2',
                                `school`='$new_Student->school',
                                `lec`='$new_Student->lec',
                                `class`='$new_Student->class'
                                WHERE `id` = '$old_Student->id'";
                    $RESULT = $this->db->insert($query);
                    
                    $query0 = "select * from `student data mayo`";
                    $query2 = "select * from `student data mayo`";
                    $query1 = "select * from `student data mayo`";
                    $query3 = "select * from `student data mayo`";
                    switch($new_Student->class){

                        case '3rd sec':
                            $QUery = "update `3rd exams` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;

                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUery = "update `2nd helwan math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                                                    
                                case 'Mech':
                                    $QUery = "update `2nd helwan mech exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                default:
                                    $QUery = "update `2nd helwan math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query0 = "update `2nd helwan mech exams`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;                                 
                            }
                            break;

                        case '1st sec':
                            $QUery = "update `1st helwan exams` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;                                                
                    }
                    $result0 = $this->db->insert($query0);
                    $REsult = $this->db->insert($QUery);
                    switch($new_Student->class){
                        case '3rd sec':
                            $Query = "update `3rd quizzes` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;
                            
                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $Query = "update `2nd helwan math quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                

                                case 'Mech':
                                    $Query = "update `2nd helwan mech quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                

                                default :
                                    $Query = "update `2nd helwan math quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query1 = "update `2nd helwan mech quizzes`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;                            
                                }
                            break;

                        case '1st sec':
                            $Query = "update `1st helwan quizzes` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                                break;                        
                    }
                    $result1 = $this->db->insert($query1);           
                    $Result = $this->db->insert($Query);
                    switch($new_Student->class){
                        case '3rd sec':
                            $QUEry = "update `3rd attendance` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;

                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUEry = "update `2nd helwan math attendance` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                case 'Mech':
                                    $QUEry = "update `2nd helwan mech exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                default:
                                    $QUEry = "update `2nd helwan math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query2 = "update `2nd helwan mech exams`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;
                                
                            }
                            break;

                        case '1st sec':
                            $QUEry = "update `1st helwan exams` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;                        
                    }
                    $result2 = $this->db->insert($query2);
                    $RESult = $this->db->insert($QUEry);

                    switch($new_Student->class){
                        case '3rd sec':
                            $QUERy = "update `3rd homework` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;

                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUERy = "update `2nd helwan math homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                

                                case 'Mech':
                                    $QUERy = "update `2nd helwan mech homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                
                                default:
                                    $QUERy = "update `2nd helwan math homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query3 = "update `2nd helwan mech homework`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;                               
                            }
                            break;

                        case '1st sec':
                            $QUERy = "update `1st helwan homework` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;                        
                    }
                    $result3 = $this->db->insert($query3);
                    $RESUlt = $this->db->insert($QUERy);

                    break;

                case 'Mayo':
                    $query = "update `student data mayo` 
                                SET `name`='$new_Student->name',
                                `id`='$new_Student->id',
                                `person num`='$new_Student->personNum',
                                `parent num1`='$new_Student->parentNum1',
                                `parent num2`='$new_Student->parentNum2',
                                `school`='$new_Student->school',
                                `lec`='$new_Student->lec',
                                `class`='$new_Student->class'
                                WHERE `id` = '$old_Student->id'";
                    $RESULT = $this->db->insert($query);
                    
                    $query0 = "select * from `student data mayo`";
                    $query2 = "select * from `student data mayo`";
                    $query1 = "select * from `student data mayo`";
                    $query3 = "select * from `student data mayo`";
                    switch($new_Student->class){
                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUery = "update `2nd mayo math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                    
                                case 'Mech':
                                    $QUery = "update `2nd mayo mech exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    

                                default:
                                    $QUery = "update `2nd mayo math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query0 = "update `2nd mayo mech exams`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;                                  
                            }
                            break;

                        case '1st sec':
                            $QUery = "update `1st mayo exams` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;
                    }
                    $result0 = $this->db->insert($query0);
                    $REsult = $this->db->insert($QUery);
                    switch($new_Student->class){
                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $Query = "update `2nd mayo math quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                

                                case 'Mech':
                                    $Query = "update `2nd mayo mech quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                default :
                                    $Query = "update `2nd mayo math quizzes` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query1 = "update `2nd mayo mech quizzes`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;
                                }                            
                            break;

                        case '1st sec':
                            $Query = "update `1st mayo quizzes` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;                        
                    }
                    $result1 = $this->db->insert($query1);           
                    $Result = $this->db->insert($Query);
                    switch($new_Student->class){
                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUEry = "update `2nd mayo math attendance` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                case 'Mech':
                                    $QUEry = "update `2nd mayo mech exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                default:
                                    $QUEry = "update `2nd mayo math exams` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query2 = "update `2nd mayo mech exams`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;
                                
                            }
                            break;
                        case '1st sec':
                            $QUEry = "update `1st mayo exams` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;
                    }
                    $result2 = $this->db->insert($query2);
                    $RESult = $this->db->insert($QUEry);

                    switch($new_Student->class){
                        case '2nd sec':
                            switch($new_Student->lec){
                                case 'Math':
                                    $QUERy = "update `2nd mayo math homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;                                

                                case 'Mech':
                                    $QUERy = "update `2nd mayo mech homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";
                                    break;
                                    
                                default:
                                    $QUERy = "update `2nd mayo math homework` 
                                                SET `name`='$new_Student->name',
                                                `id`='$new_Student->id'
                                                WHERE `id` = '$old_Student->id';";

                                    $query3 = "update `2nd mayo mech homework`
                                            SET `name`='$new_Student->name',
                                            `id`='$new_Student->id'
                                            WHERE `id` = '$old_Student->id';";
                                    break;                                
                            }
                            break;

                        case '1st sec':
                            $QUERy = "update `1st mayo homework` 
                                        SET `name`='$new_Student->name',
                                        `id`='$new_Student->id'
                                        WHERE `id` = '$old_Student->id';";
                            break;                        
                    }
                    $result3 = $this->db->insert($query3);
                    $RESUlt = $this->db->insert($QUERy);

                    break;
            }
            
            if ($RESULT != false && $Result != false && $REsult != false && $RESult != false) {
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

    //view one student one attendance
    public function view_1_Student_1_Attendance(Student $student, string $date){
        $this->db=new DBController;

        if($this->db->openConnection()){  
            switch($student->class){
                case '3rd sec':
                    $query="select `name`,`id`,`$student->day`
                        from `3rd attendance`
                        where `3rd attendance`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break ;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd helwan math attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd mayo math attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd helwan mech attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd mayo mech attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;                    

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st helwan attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st mayo attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                default :
                    echo 'error in class'; 
            }
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one exams
    public function view_1_Student_1_Exams(Student $student, string $date){
        $this->db=new DBController;

        if($this->db->openConnection()){     
            
            switch($student->class){
                case '3rd sec':
                    $query="select `name`,`id`,`$student->num`
                        from `3rd exams`
                        where `3rd exams`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->num`
                                    from `2nd helwan math exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->num`
                                    from `2nd mayo math exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->num`
                                    from `2nd helwan mech exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->num`
                                    from `2nd mayo mech exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->num`
                                    from `1st helwan exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->num`
                                    from `1st mayo exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                default:
                    echo 'Error in student class';
            }  

            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one HW
    public function view_1_Student_1_HW(Student $student, string $date){
        $this->db=new DBController;

        if($this->db->openConnection()){  
            switch($student->class){
                case '3rd sec':
                    $query="select `name`,`id`,`$student->day`
                        from `3rd homework`
                        where `3rd homework`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break ;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd helwan math homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd mayo math homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                            from `2nd helwan mech homework`
                            where `id`= '$student->id'
                            ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                            from `2nd mayo mech homework`
                            where `id`= '$student->id'
                            ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st helwan homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st mayo homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;                  

                default :
                    echo 'error in class'; 
            }
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one quizz
    public function view_1_Student_1_Quizzes(Student $student, string $date){
        $this->db=new DBController;

        if($this->db->openConnection()){  
            switch ($student->class){
                case '3rd sec':
                    $query="select `name`,`id`,`$student->day`
                            from `3rd quizzes`
                            where `3rd quizzes`.`id`= '$student->id'
                            ORDER BY `id` ASC";
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd helwan math quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd mayo math quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd helwan mech quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `2nd mayo mech quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st helwan quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select `name`,`id`,`$student->day`
                                    from `1st mayo quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                default:
                    echo 'Error in student class';
            }      
            
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student all attendance
    public function view_1_Student_All_Attendance(Student $student){
        $this->db=new DBController;

        if($this->db->openConnection()){   
            switch($student->class){
                case '3rd sec':
                    $query="select * 
                        from `3rd attendance` 
                        where `3rd attendance`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break ;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan math attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo math attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan mech attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo mech attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `1st helwan attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `1st mayo attendance`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                default :
                    echo 'error in class'; 
            }     
            
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student all exams
    public function view_1_Student_All_Exams(Student $student){
        $this->db=new DBController;

        if($this->db->openConnection()){ 
            switch($student->class){
                case '3rd sec':
                    $query="select *
                        from `3rd exams`
                        where `3rd exams`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan math exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo math exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan mech exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo mech exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `1st helwan exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `1st mayo exams`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                default:
                    echo 'Error in student class';
            }  
            
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student all HW
    public function view_1_Student_All_HW(Student $student){
        $this->db=new DBController;

        if($this->db->openConnection()){   
            switch($student->class){
                case '3rd sec':
                    $query="select * 
                        from `3rd homework` 
                        where `3rd homework`.`id`= '$student->id'
                        ORDER BY `id` ASC";
                    break ;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan math homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo math homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan mech homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo mech homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `1st helwan homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `1st mayo homework`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                default :
                    echo 'error in class'; 
            }     
            
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student all quizz
    public function view_1_Student_All_Quizzes(Student $student){
        $this->db=new DBController;

        if($this->db->openConnection()){   

            switch ($student->class){
                case '3rd sec':
                    $query="select *
                            from `3rd quizzes`
                            where `3rd quizzes`.`id`= '$student->id'
                            ORDER BY `id` ASC";
                    break;

                case '2nd sec (Math)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan math quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo math quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;
                    
                case '2nd sec (Mech)':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `2nd helwan mech quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `2nd mayo mech quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                case '1st sec':
                    switch($student->center){
                        case 'Helwan':
                            $query="select *
                                    from `1st helwan quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
        
                        case 'Mayo':
                            $query="select *
                                    from `1st mayo quizzes`
                                    where `id`= '$student->id'
                                    ORDER BY `id` ASC";
                            break;
                    }
                    break;

                default:
                    echo 'Error in student class';
            }
            $result = $this->db->select1($query);
            return $result;
        
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student all quizz
    public function view_1_Student_All_Grades(Student $student){}

}

?>