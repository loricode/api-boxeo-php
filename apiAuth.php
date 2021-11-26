<?php
 
  require_once("cors.php");
  require_once("conexion.php");
  require_once("./auth/AuthController.php");

  $method = $_SERVER['REQUEST_METHOD']; //metodo http GET, POST PUT, DELETE

  switch ($method) {
     case 'POST':
        $data = json_decode(file_get_contents('php://input'), true); //toma los datos json del cliente
        $auth = new AuthController();
        $response = $auth->signIn($data);
        echo json_encode($response);
        break;
     default:
        echo json_encode([ "result" => "metodo http no encontrado!!!" ]);
        break;
  }

?>