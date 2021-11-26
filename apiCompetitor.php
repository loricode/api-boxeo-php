<?php

   require_once("cors.php");
   require_once("conexion.php");
   require_once("./competitor/CompetitorController.php");
  
   $url = $_SERVER['REQUEST_URI'];
   $method = $_SERVER['REQUEST_METHOD']; //metodo http GET, POST PUT, DELETE

   switch ($method) {
      case 'GET':
         $competitor = new CompetitiorController();
         $response = $competitor->getCompetitors();  
         echo json_encode($response);
         break;
      
      default:
         echo json_encode([ "result" => "metodo http no encontrado!!!" ]);
         break;
   }

?>