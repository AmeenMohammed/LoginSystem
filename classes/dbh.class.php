<?php
    class Dbh{
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $charset;
        private $port;

        protected function connect(){
            $this->servername = "localhost";
            $this->username = "Ameen";
            $this->password = "shit";
            $this->dbname = "loginsystem";
            $this->charset = "utf8mb4";
            $this->port = "3308";

            try {
                $dsn = "mysql:host=".$this->servername.";port=".$this->port.";dbname=".$this->dbname.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $pdo;
        
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }


?>