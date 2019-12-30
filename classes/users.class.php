<?php

    class Users extends Dbh{

        public function create_user(&$userData){
            $sql = "SELECT idUsers FROM users where username=:username";
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute([':username' => $userData[0]]);
            $count = $stmt->rowCount();
            if($count > 0){
                return true;
            }else{
                $sql = "INSERT INTO users(username, age, userPass) VALUES (:username,:age,:pass)";
                $stmt = $db->prepare($sql);
                $stmt->execute([':username' => $userData[0], ':age' => $userData[1],':pass' => $userData[2]]);
                $db = null;
                return false;
          }
           
        }
        public function read_user($username, $password){
            $flag = false;
            $sql = "SELECT idUsers FROM users WHERE username=:username  AND userPass=:pass";
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute(['username' => $username, 'pass' => $password]);
            $count = $stmt->rowCount();
            if($count > 0){
                $flag = true;
            }
            $db = null;
            return $flag;

        }
        public function update_user($oldusername, $newUsername, $age, $password){
            $flag = false;
            $sql = "SELECT * FROM users WHERE username=:username";
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute(['username' => $oldusername]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result['username'] != $newUsername){
                    $sql = "UPDATE users SET username=:newusername WHERE idUsers=:userid";
                    $stmt = $db->prepare($sql);
                    $stmt->execute(['newusername' => $newUsername, 'userid' => $result['idUsers']]);
                    $flag = true;
                }if($result['age'] != $age){
                    $sql = "UPDATE users SET age=:age WHERE idUsers=:userid";
                    $stmt = $db->prepare($sql);
                    $stmt->execute(['age' => $age, 'userid' => $result['idUsers']]);      
                }if($password != ""){
                    $sql = "UPDATE users SET userPass=:pass WHERE idUsers=:userid";
                    $stmt = $db->prepare($sql);
                    $stmt->execute(['pass' => md5($password), 'userid' => $result['idUsers']]);      
                }
                $db = null;
                return $flag;

        }
        public function delete_user($username){
            $sql = "DELETE FROM users WHERE username=:username";
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute(['username' => $username]);
            $db = null;
        }

        public function uesr_data($username){
            $sql = "SELECT username, age FROM users where username=:username";
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute([':username' => $username]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $db = null;
            return json_encode($result);
        }
    }

?>