<?php 
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectocuadernodecampo";
 
$conexion = @mysql_connect($servername,$username,$password) 
    or die ("No se ha podido conectar al servidor de Base de datos");

$db = mysql_select_db($dbname) 
    or die ( "Upps! no se ha podido conectar a la base de datos" );

    $nombreUsuario = $_POST['nombreUsuario'];
    $apellidosUsuario = $_POST["apellidosUsuario"];
    $dniUsuario = $_POST["dniUsuario"];
    $cuitUsuario = $_POST['cuitUsuario'];
    $fechaNacimientoUsuario = $_POST["fechaNacimientoUsuario"];
    $emailUsuario = $_POST["emailUsuario"];
    $passwordUsuario = $_POST["passwordUsuario"];

 
$sql = ('INSERT INTO `usuarios` VALUES (``,$nombreUsuario
                                             ,$apellidosUsuario
                                             ,$dniUsuario
                                             ,$cuitUsuario
                                             ,$fechaNacimientoUsuario
                                             ,$emailUsuario
                                             ,$passwordUsuario)');
$ejecutar = mysql_query($sql);

if (!$ejecutar){
    echo "error";
}else{
    echo "todo ok <br>";
}


?> 
