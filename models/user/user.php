<?php
require_once "student.php";
require_once "../work";
require_once "../../controllers/dbController.php";


abstract class User {

    public $full_name;
    public $id;
    public $username;
    public $password;

}

interface UserFun {

    /*Add Data*/
    public function new_Student(Student $student);

    //view one student data
    public function view_1_Student(Student $student);

    /*Edit Data*/
    public function edit_Student(Student $old_Student, Student $new_Student);

    //view one student one attendance
    public function view_1_Student_1_Attendance(Student $student, string $date);

    //view one student one exams
    public function view_1_Student_1_Exams(Student $student, string $date);

    //view one student one HW
    public function view_1_Student_1_HW(Student $student, string $date);

    //view one student one quizz
    public function view_1_Student_1_Quizzes(Student $student, string $date);

    //view one student all attendance
    public function view_1_Student_All_Attendance(Student $student);

    //view one student all exams
    public function view_1_Student_All_Exams(Student $student);

    //view one student all HW
    public function view_1_Student_All_HW(Student $student);

    //view one student all quizz
    public function view_1_Student_All_Quizzes(Student $student);

    //view one student all quizz
    public function view_1_Student_All_Grades(Student $student);
}