<?php

class AuthController {

   public function signIn($data){
     try{
       $email = $data['email']; 
       $password = $data['password'];    
       $conexion = new Conexion();
       $db = $conexion->getConexion();
       $query = "SELECT * FROM users WHERE password=:password and email=:email";
       $statement = $db->prepare($query);
       $statement->bindParam(":email", $email);
       $statement->bindParam(":password", $password);
       $statement->execute();
       $resultData = $statement->fetch();
       if($resultData == null){
         return ["status" => "400", "data"=>  $resultData, "login" => false ];  
       }else{
          //puede hacer un token en esta parte
          return ["status" => "200", 
                  "data"=> [ 
                  "firstName"=>$resultData["first_name"],
                  "email"=>$resultData["email"],
                  "id" => $resultData["id"]],
                  "login" => true
            ];
         } 
       } catch (PDOException $e) {
           echo "¡Error!: " . $e->getMessage() . "<br/>";
       }
    }
   

   }
   

?>