<?php
namespace App\Models;
//require "../core/Model.php";

use Core\Model;
use DateTime;
use PDO;

class User extends Model{
   
    public function __construct()
    {
        $this->birthdate = DateTime::createFromFormat('Y-m-d',$this->birthdate);
    } 


    public static function all()
    {
        $dbh = User::db();
        $sql = "SELECT * FROM users";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS,User::class);
        $users = $statement->fetchAll(PDO::FETCH_CLASS,User::class);
        return $users;
    }
    public static function find($id){
        $dbh = self::db();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,User::class);
        $user = $statement->fetch(PDO::FETCH_CLASS);
        return $user;
    }
    public function insert(){
        $dbh = self::db();
        $sql = "INSERT INTO users(name,surname,email,birthdate) 
        VALUES(:nombre,:apellidos,:email,:fechanac)";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->name);
        $statement->bindValue(":apellidos",$this->surname);
        $statement->bindValue(":email",$this->email);
        $statement->bindValue(":fechanac",$this->birthdate);
        return $statement->execute();
    }

    public function save(){
        //echo "<br> Actualizando un registro...";
        $dbh = self::db();
        $sql = "UPDATE users 
        SET name = :nombre,surname = :apellidos,email = :email,birthdate = :fechanac
        WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id",$this->id);
        $statement->bindValue(":nombre",$this->name);
        $statement->bindValue(":apellidos",$this->surname);
        $statement->bindValue(":email",$this->email);
        $statement->bindValue(":fechanac",$this->birthdate);
        return $statement->execute();
    }
    public function delete(){
        $dbh = User::db();
        $sql="DELETE FROM users WHERE id=:id";
        $statement=$dbh->prepare($sql);
        $statement->bindValue(":id",$this->id);
        return $statement->execute();
    }
    public function setPassword($password){
        $dbh = User::db();
        $password = password_hash($password,PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = :password WHERE id=:id";
        $statement=$dbh->prepare($sql);
        $statement->bindValue(":id",$this->id);
        $statement->bindValue(":password", $password);
        return $statement->execute();
    
    }
    public function passwordVerify($password,$user){
        return password_hash($password,$user->password);
    }

}
