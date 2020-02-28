<?php
    class Database{
        private $hostname="localhost";
        private $username="root";
        private $password="";
        private $dbname;
        public $dblink;
        private $result;

        function __construct($dbname) {
            $this->dbname = $dbname;
            $this->Connect();
        }

        function Connect(){
            $this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

            if ($this->dblink ->connect_errno) {
                exit();
            }
            $this->dblink->set_charset("utf8");
        }

        function selectAllUsers() {
            $select = 'SELECT email FROM users';

            return $this->ExecuteQuery($select);
        }

        function select () {
            $select = '';

            if ($this->ExecuteQuery($select))
                return true;
            else
                return false;
        }

        function insert () {
            $insert = '';
            
            if ($this->ExecuteQuery($insert))
                return true;
            else
                return false;
        }

        function ExecuteQuery($query){
            if($this->result = $this->dblink->query($query)){
                return true;
            }else{
                return false;
            }
        }
    }
?>