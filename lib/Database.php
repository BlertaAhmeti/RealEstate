<?php 
namespace App\Lib;

use PDO,Exception;

class Database{
    private $servername;
    private $dbname;
    private $charset;
    private $username;
    private $password;

    public function connect(){
        $this->servername = "localhost";
        $this->dbname = "realestate";
        $this->charset = "utf8mb4";
        $this->username = "root";
        $this->password = "";

        try{
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn,$this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }catch(Exception $e){
            echo "Lidhja me databaze deshtoi: " . $e->getMessage();
        }

    }
}
?>