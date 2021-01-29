<?php 
    class Database{
        private $servername;
        private $user;
        private $password;
        private $dbname;

        public function __construct(){
            $this->servername = 'us-cdbr-east-06.cleardb.net';
            $this->user = 'b9465cd869f344';
            $this->password = 'f9a1128f';
            $this->dbname = 'heroku_0fdf25b1a9c4364';
        }

        public function connect(){
            $conn = new mysqli($this->servername,$this->user,$this->password,$this->dbname);
            return $conn;
        }


    }
?>