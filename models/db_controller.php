<?php
    //Configration Array (Server, Usernamr, Passsword, Database)
    $config = array('localhost','root','','bob_22/23_2');

class DB_Controller{
        protected $_config = array();
        protected $_link;
        protected $_result;

    //Constructor
        public function __construct(array $config){
            if(count($config) !== 4){
                throw new InvalidArgumentException('Invalid number of connection parameters.');
            }
            $this->_config = $config;
        }

    //Connect to Mysql
        public function connect(){
            //connect only one
            if($this->_link == null){
                list($host, $user , $password, $database) = $this->_config;
                if(!$this->_link = @mysqli_connect($host, $user , $password, $database)){
                    throw new RuntimeException('Error Connection To The Server : '.mysqli_connect_error());
                }
                unset($host,$user,$password,$database);
            }
            return $this->_link;
        }

    //Execute Query
        public function query($query){
            if(!is_string($query) || empty($query)){
                throw new InvalidArgumentException('The Specified Query In Not Valid');
            }

            //Lazy Connect to MySQL
            $this->connect();
            if(!$this->_result = mysqli_query($this->_link,$query)){
                throw new RuntimeException('Error Executing The Specified Query '.$query.mysqli_error($this->_link));
            }
            return $this->_result;
        }

    //Select
        public function select($table, $where = '', $fields = '*', $order = '', $limit = null, $offset = null){
            $query = 'SELECT '.$fields.' FROM '.$table
                    .(($where) ? ' WHERE '.$where : '')
                    .(($limit) ? ' Limit '.$limit : '')
                    .(($offset && $limit) ? ' OFFSET '.$offset : '')
                    .(($order) ? ' ORDER BY '.$order : '');
            $this->query($query);
            return $this->countRows();
        }

    //INSERT XXXXX
        public function insert($table, array $data){
            $fields = implode(',',array_keys($data));
            $values = implode(',',array_map(array($this,'quoteValue'), array_values($data)));

            $query = 'INSERT INTO '.$table.' ('.$fields.') VALUES ('.$values.')';
            $this->query($query);
            return $this->getInsertId();
        }

    //UPADTE
        public function update($table, array $data, $where = ''){
            $set = array();
            foreach($data as $fields => $value){
                $set[] = $fields.'='.$this->quoteValue($value);
            }
            $set = implode(',',$set);
            $query = 'UPDATE '.$table.' SET '.$set.
                    (($where) ? ' WHERE '.$where : '');
            $this->query($query);
            return $this->getAffectedRows();
        }

    //DELETE
        public function delete($table,$where = ''){
            $query = 'DELETE FROM '.$table
                    .(($where) ? ' WHERE '.$where : '');
            $this->query($query);
            return $this->getAffectedRows();
        }

    //escape the specified values
        public function quoteValue($value){
            $this->connect();
            if($value === NULL){
                $value = NULL;
            }
            else if(!is_numeric($value)){
                $value = "'". mysqli_real_escape_string($this->_link,$value)."'";
            }
            return $value;
        }

    //Fetch Single Row
        public function fetch(){
            if($this->_result !== null){
                if(($row = mysqli_fetch_array($this->_result,MYSQLI_ASSOC)) === false){
                    $this->freeResult();
                }
                return $row;
            }
            return false;
        }

    //Fetch All
        public function fetchAll(){
            if($this->_result !==null){
                if(($all = mysqli_fetch_all($this->_result,MYSQLI_ASSOC)) === false){
                    $this->freeResult();
                }
                return $all;
            }
            return false;
        }

    //Get Insrtion ID
        public function getInsertID(){
            return $this->_link !== null ? mysqli_insert_id($this->_link) : null;
        }

    //Get Number of Returned Rows
        public function countRows(){
            return $this->_result !== null ? mysqli_num_rows($this->_result) : 0 ;
        }

    //Get Number of Returned Rows
        public function getAffectedRows(){
            return $this->_link !== null ? mysqli_affected_rows($this->_link) : 0 ; 
        }

    //Free The Result
        public function freeResult(){
            if($this->_result === null){
                return false;
            }
            mysqli_free_result($this->_result);
            return true;
        }

    //Close explicitly Connetion
        public function disconnect(){
            if ($this->_link === null){
                return false;
            }
            mysqli_close($this->_link);
            $this->_link = null ;
            return true;
        }

    //Close Automatically
        public function __destruct(){        
            $this->disconnect();
        }
}

?>