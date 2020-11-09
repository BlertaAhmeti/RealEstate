<?php
namespace App\Lib;
use App\Lib\Database;
use PDO;

class Property extends Database{

    public function getProperties(){
        $sql = "SELECT * FROM properties";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getNrProperties(){
        $sql = "SELECT COUNT(*) AS nr_properties FROM properties";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getNrForSale(){
        $sql = "SELECT COUNT(*) AS nr_sale FROM properties WHERE category='Sale'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getNrForRent(){
        $sql = "SELECT COUNT(*) AS nr_rent FROM properties WHERE category='Rent'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function get4LatestProperties(){
        $sql = "SELECT * FROM properties ORDER BY created_at DESC LIMIT 4";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function addNewProperty($user_id,$title,$description,$category,$rooms,$bathrooms,$image,$price){
        $sql = "INSERT INTO properties(user_id,title,description,category,rooms,bathrooms,image,price)";
        $sql .= " VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id,"$title","$description","$category",$rooms,$bathrooms,"$image",$price]);
    }

    public function get_properties_by_user_id($user_id){
        $sql="SELECT * FROM properties WHERE user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_property_by_id($id){
        $sql="SELECT *, users.first_name, users.last_name, users.email FROM properties INNER JOIN users ON properties.user_id = users.id WHERE properties.id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
}
?>