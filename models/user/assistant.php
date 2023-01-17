<?php
require_once "../user";
require_once "../work";

require_once "../../controllers/dbController.php";
class Assistant extends User implements UserFun{
    public $phone_no;
    public $availability = array("sat"=>true, 
                        "sun"=>true,"mon"=>true,
                        "tue"=>true,"wed"=>true,
                        "thu"=>true,"fri"=>true);

    private $db;

    /*View Data*/
    public function view_All_Assistant(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select `id`,`name`,`phone_no` 
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

    public function view_1_Assistant(Assistant $assis){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `assistants data` 
                    where `assistants data`.`id`= '$assis->id'";
            $result = $this->db->select1($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    /*Edit Data*/
    public function edit_Assistant(Assistant $assisOld, Assistant $assisNew){
        $this->db = new DBController;

        if($this->db->openConnection()){
            
            $QUERY = "update `assistants data` 
                        SET `name`='$assisNew->full_name',
                        `id`='$assisNew->id',
                        `num1`='$assisNew->phone_no',
                        WHERE `id`='$assisOld->id'";
            
            $result = $this->db->delete($QUERY);
            if ($result != false ) {
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
    
    /*View Avilability*/ 
    public function view_All_Availability(){
        $this->db=new DBController;

        if($this->db->openConnection()){
            $query="select * 
                    from `assistants availability`
                    ORDER BY `id` ASC";
            return $this->db->select($query);
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    public function view_1_Availability(Assistant $assis){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `assistants availability` 
                    where `assistants availability`.`id`= '$assis->id'";
            return $this->db->select1($query);
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    /*Edit Avilability*/
    public function edit_Availability(Assistant $avilOld, Assistant $avilNew){
        $this->db = new DBController;

        if($this->db->openConnection()){
            
            $query = "delete from `assistants availability` 
                        WHERE `assistants availability`.`id` = '$avilOld->id';";
            $result = $this->db->delete($query);

            $query1 = "insert into `assistants availability` 
                        values ('$avilNew->id','$avilNew->full_name'
                        ,'$avilNew->availability['sat']','$avilNew->availability['sun']'
                        ,'$avilNew->availability['mon']','$avilNew->availability['tue']'
                        ,'$avilNew->availability['wed']','$avilNew->availability['thu']'
                        ,'$avilNew->availability['fri']')";
            $result1 = $this->db->insert($query1);

            if ($result != false && $result1 != false) {
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

    /*View History*/
    public function view_assistant_history(Assistant $assis){}
  
    public function view_All_workdays(){
            $this->db=new DBController;

            if($this->db->openConnection()){
                $query="select * 
                        from `assistants history`
                        ORDER BY `date` DESC";
                return $this->db->select($query);
            }
            else{
                echo "Error in Database Connection";
                return false; 
            }
    }

    /*Add Data*/
    public function new_Student(Student $student){}

    //view all students
    public function view_All_Student(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `student data helwan`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view all data center
    public function view_All_Student_Center($center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `student data helwan`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view all 1 class data
    public function view_1_Class_Students($year){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select *
            from `student data helwan`
            where `class`='3rd sec'
            ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view all 1 class data
    public function view_1_Class_Students_Center($year, $center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select *
            from `student data helwan`
            where `class`='3rd sec'
            ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student data
    public function view_1_Student(Student $student){}

    /*Edit Data*/
    public function edit_Student(Student $old_Student, Student $new_Student){}

    /*Delete Data*/
    public function delete_Student(Student $student){
        $this->db = new DBController;

        if($this->db->openConnection()){
            switch($student->center){
                case 'Helwan':
                    $query = "delete from `student data helwan` 
                            WHERE `id` = '$student->id'
                            and `center` = '$student->center';";
                    break;

                case 'Mayo':
                    $query = "delete from `student data mayo` 
                        WHERE `id` = '$student->id'
                        and `center` = '$student->center';";
                    break;
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

    //view 1 class all quizzes
    public function view_1_Class_All_Quizzes(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd quizzes`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view 1 class all quizzes by center
    public function view_1_Class_All_Quizzes_Center($center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd quizzes`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one quizz
    public function view_1_Student_1_Quizzes(Student $student, $date){}

    //view one student all quizz
    public function view_1_Student_All_Quizzes(Student $student){}

    //view 1 class all attendance
    public function view_1_Class_All_Attendance(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd attendance`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view 1 class all attendance by center
    public function view_1_Class_All_Attendance_Center($center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd attendance`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one attendance
    public function view_1_Student_1_Attendance(Student $student, $date){}

    //view one student all attendance
    public function view_1_Student_All_Attendance(Student $student){}

    //view 1 class all HW
    public function view_1_Class_All_HW(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd homework`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view 1 class all HW by center
    public function view_1_Class_All_HW_Center($center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd homework`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one HW
    public function view_1_Student_1_HW(Student $student, $date){}

    //view one student all HW
    public function view_1_Student_All_HW(Student $student){}

    //view 1 class all exams
    public function view_1_Class_All_Exams(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd exams`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view 1 class all exams by center
    public function view_1_Class_All_Exams_Center($center){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select * 
                    from `3rd exams`
                    ORDER BY `id` ASC";
            $result = $this->db->select($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view one student one exams
    public function view_1_Student_1_Exams(Student $student, $date){}

    //view one student all exams
    public function view_1_Student_All_Exams(Student $student){}

    //view one student all quizz
    public function view_1_Student_All_Grades(Student $student){}

    //view dates of quizzes
    public function view_1_Class_Quizzes_Dates($year){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '3rd quizzes'
            AND COLUMN_NAME != 'name'
            AND COLUMN_NAME != 'id'
            ORDER BY ORDINAL_POSITION;";
            $result = $this->db->selectNum($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view dates of attendance
    public function view_1_Class_Attendance_Dates(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '3rd attendance'
            AND COLUMN_NAME != 'name'
            AND COLUMN_NAME != 'id'
            ORDER BY ORDINAL_POSITION;";
            $result = $this->db->selectNum($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view dates of HW
    public function view_1_Class_HW_Dates(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '3rd homework'
            AND COLUMN_NAME != 'name'
            AND COLUMN_NAME != 'id'
            ORDER BY ORDINAL_POSITION;";
            $result = $this->db->selectNum($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }

    //view dates of exams
    public function view_1_Class_Exams_Dates(){
        $this->db=new DBController;

        if($this->db->openConnection()){        
            $query="select COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = '3rd exams'
                    AND COLUMN_NAME != 'name'
                    AND COLUMN_NAME != 'id'
                    ORDER BY ORDINAL_POSITION;";
            $result = $this->db->selectNum($query);
            return $result;
        }
        else{        
            echo "Error in Database Connection";
            return false; 
        }
    }
}
?>