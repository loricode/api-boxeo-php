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