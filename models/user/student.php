<?php
require_once 'user.php';

class Student extends User{

    public $year;
    public $center;
    public $parent_no_1  = null;
    public $parent_no_2  = null;
    public $school       = null;

    //Add Data T
    public function new_Student(){

        // TO STUDENTS DATA
        $this->query("INSERT INTO `student` 
                    VALUES (".$this->id."
                    ,'".$this->full_name."'
                    ,'".$this->year."'
                    ,'".$this->center."'
                    ,'".$this->phone_no."'
                    ,'".$this->parent_no_1."'
                    ,'".$this->parent_no_2."'
                    ,'".$this->school."'
                    ,'".$this->username."'
                    ,'".$this->password."')");

        do{
            if($this->year == "2nd") 
                $this->year = "2nd_math";
            elseif($this->year == "2nd_math")
                $this->year = "2nd_mech" ;
            
            // TO ATTENDANCE
            $this->query("INSERT INTO `".$this->year."_".$this->center."_attendance`
                        (`student_id`,`student_name`)
                        VALUES (".$this->id."
                        ,'".$this->full_name."')");

            // TO Quiz
            $this->query("INSERT INTO `".$this->year."_".$this->center."_quiz_grade`
                        (`student_id`,`student_name`)
                        VALUES (".$this->id."
                        ,'".$this->full_name."')");    
                
            // TO HW
            $this->query("INSERT INTO `".$this->year."_".$this->center."_hw_grade`
                        (`student_id`,`student_name`)
                        VALUES (".$this->id."
                        ,'".$this->full_name."')");  

            // TO Exams
            $this->query("INSERT INTO `".$this->year."_".$this->center."_exam_grade`
                        (`student_id`,`student_name`)
                        VALUES (".$this->id."
                        ,'".$this->full_name."')");  
                    
            }while($this->year == "2nd_math"); 
            
        return $this->view_1_Student();
    }

    //view one student data T
    public function view_1_Student(){
        
        $this->select("`student`","`id` = ".$this->id) ; 
        return $this->fetch();
    }

    //view all students T
    public function view_All_Student(){
        $this->select("`student`") ; 
        return $this->fetchall();
    }
    
    //view all data center T
    public function view_All_Student_Center(){
        $this->select("`student`","`center` = '".$this->center."'") ; 
        return $this->fetchall();
    }

    //view all 1 class data T
    public function view_All_Student_Class(){
        $this->select("`student`","`year` = '".$this->year."'") ; 
        return $this->fetchall();
    }

    //view all 1 class data T
    public function view_All_Student_Center_Class(){
        $this->select("`student`","`year` = '".$this->year."' AND `center` = '".$this->center."'"); 
        return $this->fetchall();
    }

    //Edit Data T
    public function update_Student(Student $new_Student){
        $this->query("UPDATE `student` 
                    SET `id`= ".$new_Student->id.",
                    `name`= '".$new_Student->full_name."',
                    `phone_no`= '".$new_Student->phone_no."',
                    `parent_no_1`= '".$new_Student->parent_no_1."',
                    `parent_no_2`= '".$new_Student->parent_no_2."',
                    `school`= '".$new_Student->school."',
                    `username`= '".$new_Student->username."',
                    `password`= '".$new_Student->password."' 
                    WHERE `id`= ".$this->id);
        
        return $this->view_1_Student();
    }
    
    //Delete Data T
    public function delete_Student(){
        $this->delete("`student`","`id` =".$this->id);
    }

    //view one student one grade T
    public function view_1_Student_1_Grade($type,$grade_num){
        do{
            if($this->year == "2nd") 
                $this->year = "2nd_math";
            elseif($this->year == "2nd_math")
                $this->year = "2nd_mech" ;
            
            $this->select("`".$this->year."_".$this->center."_".$type."`","`student_id` = ".$this->id , "`".$grade_num."`");

            $result["$this->year"] = $this->fetch();
  
                    
            }while($this->year == "2nd_math"); 

            return $result;
    }

    //view one student all 1-type grades T
    public function view_1_Student_Grades($type){
        do{
            if($this->year == "2nd") 
                $this->year = "2nd_math";
            elseif($this->year == "2nd_math")
                $this->year = "2nd_mech" ;
            
            $this->select("`".$this->year."_".$this->center."_".$type."`","`student_id` = ".$this->id);

            $result["$this->year"] = $this->fetch();

                
        }while($this->year == "2nd_math"); 

        return $result;
    }

    //view one student all grades T
    public function view_1_Student_All_Grades(){
        $grade_type = ['attendance','quiz_grade','hw_grade','exam_grade'];
        do{
            if($this->year == "2nd") 
                $this->year = "2nd_math";
            elseif($this->year == "2nd_math")
                $this->year = "2nd_mech" ;

            foreach($grade_type as $grade){
                $this->select("`".$this->year."_".$this->center."_".$grade."`","`student_id` = ".$this->id);

                $result["$this->year"]["$grade"] = $this->fetch();
            }
                    
            }while($this->year == "2nd_math"); 

        return $result;
    }
    
}

?>