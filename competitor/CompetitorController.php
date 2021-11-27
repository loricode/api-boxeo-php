<?php

class CompetitiorController {

   public function getCompetitors(){
      $list = array();
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $sql = "SELECT * FROM competitors";
      $statement = $db->prepare($sql);
      $statement->execute();
      while($row = $statement->fetch()) {
            $list[] = array(
              "id" => $row['id'],
              "firstName" => $row['first_name'],
              "lastName" => $row['last_name'],
              "age" => $row['age'],
              "weight" => $row['weight'],
              "email" => $row['email'],
              "image" => $row['image']
            );
            }//fin del ciclo while 
  
      return $list;
   }


public function getUser($data){
   $id = $data['id'];
   $list = array();
   $conexion = new Conexion();
   $db = $conexion->getConexion();   
   $sql = "SELECT * FROM users WHERE id=:id";
   $statement = $db->prepare($sql);
   $statement->bindParam(':id', $id); 
   $statement->execute();
     while($row = $statement->fetch()) {
       $list[] = array(
         "id" => $row['id'],
         "firstName" => $row['first_name'],
         "lastName" => $row['last_name'],
         "email" => $row['email'] );
     }//fin del ciclo while 
     if(empty($list)){
      return [ "status"=> 400, data=>false, "message"=>"usuario no encontrado"];
     }
      return $list[0];
  }

  public function createUser($data){
   $first = $data['nombre'];
   $last = $data['apellido'];
   $weight = $data['peso'];
   $email = $data['email'];
   $password = $data['contrasena'];
   $imagen = $data['imagen'];
   $age = $data['edad'];
   $phone = $data['telefono'];
   $conexion = new Conexion();
   $db  = $conexion->getConexion();
   $sql = "INSERT INTO users (first_name, last_name, phone, email, password) VALUES (:first, :last, :phone, :email, :password)";
   $statement = $db->prepare($sql);
   $statement->bindParam(':first',  $first);
   $statement->bindParam(':last',  $last);
   $statement->bindParam(':phone', $phone );
   $statement->bindParam(':email', $email);
   $statement->bindParam(':password',  $password);
   $statement->execute();

   $sql = "INSERT INTO competitors (first_name, last_name, age, weight, image, email) VALUES (:first, :last, :age, :weight, :image, :email)";
   $statement = $db->prepare($sql);
   $statement->bindParam(':first',  $first);
   $statement->bindParam(':last',  $last);
   $statement->bindParam(':age', $age); 
   $statement->bindParam(':weight',  $weight);
   $statement->bindParam(':image',  $imagen);
   $statement->bindParam(':email', $email);
   $statement->execute();
   $resultData = $statement->fetch();

   if($resultData){
     return [
        "status" => 400,
        "data"=> $resultData,
        "message" => "it was not inserted in the table" ];  
   }else{
      //puede hacer un token en esta parte
      return ["status" => 200, 
             "data"=> [],
             "message" => "added sucessfully"
        ];
     } 
 }



public function updateUser($data){
   $aux = $data;
   $id = $data['id'];
   $firstName = $data['firstName'];
   $lastName = $data['lastName'];
   $email = $data['email'];
   $conexion = new Conexion();
   $db = $conexion->getConexion();
   $sql="UPDATE users SET first_name=:first, last_name=:last, email=:email WHERE id=:id";

   $statement = $db->prepare($sql);
   $statement->bindParam(':id', $id); 
   $statement->bindParam(':first', $firstName);
   $statement->bindParam(':last', $lastName); 
   $statement->bindParam(':email', $email);
   $statement->execute();
   $resultData = $statement->fetch();
   
   $info = $this->getUser($aux);

   if($resultData){
     return [
        "status" => 400,
        "data"=> $resultData,
        "message" => "it was not update in the table" ];  
   }else{
   
      return ["status" => 200, 
             "data"=> $info,
             "message" => "updated sucessfully"
        ];
     } 
 }

}

?>