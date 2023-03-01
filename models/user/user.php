<?php
require_once  __DIR__ . '/../db_controller.php';


abstract class User extends DB_Controller{

    public $full_name;
    public $id;
    public $phone_no;
    public $username = null;
    public $password = null;

    public function __construct(){
        //Add from the database config file
        global $config;

        //Call Paretn Constructor
        parent::__construct($config);
    }

}
