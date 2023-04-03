<?php 
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    /*try{
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=pokeapi','root','');
        $res = $pdo->query('SELECT * FROM users');
        $pdo->execute() or die(print($pdo->errorInfo()));
        echo json_decode('');
    }catch(PDOException $error){
        echo $error -> getMessage();
        die();
    }
    pdo = null;
    */
      // Variables de la conexion a la DB
      $mysqli = new mysqli("localhost","root","","pokeapi");
    
      // Comprobamos la conexion
      if($mysqli->connect_errno) {
          die("Fallo la conexion");
      } else {
          //echo "Conexion exitosa";
      }
    
    $sql = "SELECT * FROM users";
    $query = $mysqli->query($sql);
    $datos = array();    
    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }
    
    #echo json_encode($datos);
    echo json_encode(array("users" => $datos));

?>


