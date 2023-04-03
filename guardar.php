<?php 
 header('Access-Control-Allow-Origin: *');
 header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
 header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
 header("Allow: GET, POST, OPTIONS, PUT, DELETE");

 try{
    $email = assert($_POST['user']) ? $_POST['user']: '';
    $password = assert($_POST['password']) ? $_POST['password']: '';
    $usuario = $_POST['user'];
    
    
}catch(Exception){
    echo json_encode("insersion correcta");
};


#recuerda que es encode y no "decode" :)"
try{
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=pokeapi','root','');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    $pdo = $conexion->prepare('INSERT INTO users(email,password) VALUES(?,?)');
    $pdo->bindParam(1,$email);
    $pdo->bindParam(2,$password);
    $pdo->execute() or die(print($pdo->errorInfo()));
    echo json_encode('conexion exitosa');
}catch(PDOException $error){
    echo $error -> getMessage();
    die();

};

?>