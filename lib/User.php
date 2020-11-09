<?php 
namespace App\Lib;
use PDO;
class User extends Database{

    public function getUsers(){
        $sql = "SELECT first_name, last_name, email FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while($result = $stmt->fetchAll()){
            return $result;
        }
    }
    public function addUser($first_name,$last_name,$email,$username,$password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(first_name,last_name,email,username,password)";
        $sql.="VALUES(?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$first_name","$last_name","$email","$username",$hash]);
    }

    public function verify_user($username, $password){

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$username"]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (is_array($row))
        {
          if (password_verify($password, $row['password']))
          {
            $pass = $row['password'];
            $sql = "SELECT * FROM users WHERE username=? AND password=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["$username","$pass"]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;    
          }else{
              echo "<script>alert('Username or password are not correct!');</script>";
          }
        }
    }

    public function get_user_by_id($id){
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$id"]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function modify_user($id, $first_name, $last_name, $email, $username){
        $sql = "UPDATE users SET first_name=?, last_name=?, email=?, username=? WHERE id=?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $username, $id]);
    }

}

?>