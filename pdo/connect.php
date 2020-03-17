<?php    
    class Connect
    {
        public $host = "localhost";
        public $user = "root";
        public $password = "";
        public $db = "db";
        public $charset = "utf8";
        public $pdo = "";

        public function __construct() {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $opt = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            $this->pdo = new PDO($dsn, $this->user, $this->password, $opt);
    }
}