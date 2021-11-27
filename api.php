<?php

 require_once("cors.php");
 require_once("conexion.php");
 require_once("./competitor/CompetitorController.php");

 $method = $_SERVER['REQUEST_METHOD']; //metodo http GET, POST PUT, DELETE

 switch ($method) {
    case 'GET':
       $data = $_GET;
       $competitor = new CompetitiorController();
       $response = $competitor->getUser($data);
       echo json_encode($response);
       break;
       case 'POST':
         // echo json_encode($method);
         $data = json_decode(file_get_contents('php://input'), true);   
         $competitor = new CompetitiorController();
         //echo json_encode($data['firstName']);
         $response = $competitor->createUser($data);
         echo json_encode($response);
         break;
       case 'PUT':
         $data = json_decode(file_get_contents('php://input'), true);
         $competitor = new CompetitiorController();
         $response = $competitor->updateUser($data);
         echo json_encode($response);
         break;   
    default:
       echo json_encode([ "result" => "metodo http no encontrado!!!" ]);
       break;
 }



?>