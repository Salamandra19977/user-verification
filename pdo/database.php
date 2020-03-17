<?php
    require_once('Connect.php');    
    class Database extends Connect
    {
        public $table_name = 'users';

        public function insert($data)
        {
            $data['create_at'] = Date('Y-m-d H:i:s');
            $fields = $this->set_fields($data);
            $sql = "INSERT INTO `{$this->table_name}` SET ".$fields;
            $stmt = $this->pdo->prepare( $sql );

            return $stmt->execute($data);
        }

        public function searchEmail($email){
            $sql = "SELECT email FROM users WHERE email = :email";
            $smtp = $this->pdo->prepare($sql);
            $smtp->execute(array('email'=> $email));
            $result = $smtp->fetch();
            return $result;
        }

        public function getHash($email){
            $sql = "SELECT password FROM users WHERE email = :email";
            $smtp = $this->pdo->prepare($sql);
            $smtp->execute(array('email'=> $email));
            $result = $smtp->fetch();
            return $result;
        }

        public function getAll($email){
            $sql = "SELECT * FROM users WHERE email = :email";
            $smtp = $this->pdo->prepare($sql);
            $smtp->execute(array('email'=> $email));
            $result = $smtp->fetch();
            return $result;
        }

        public function set_fields( $items, $delimiter = "," ){
            $str = array();
            if(empty($items)) return "";
            foreach ($items as $key=>$item){
                $str[] = "`".$key."`=:".$key;
            }
            return implode($delimiter, $str );
        }


    }