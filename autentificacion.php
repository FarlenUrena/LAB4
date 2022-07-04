<?php
require_once("conexion.php");

$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "bd_redsocial";
$conexion = new Conexion($servidor,$usuario,$clave,$base_datos);





function autentificarUsuario($conexion, $nombre, $clave ){
    // print("adsfasdfasd");
    // $validarCredenciales = () ;
    $conexion->consulta("SELECT *  FROM tbl_usuario WHERE nombre LIKE  '$nombre' AND clave LIKE '$clave' ");
    // $conexion->consulta("SELECT *  FROM tbl_usuario WHERE nombre LIKE '" . $nombre . "' AND clave LIKE '" . $clave);
    $datos =  json_encode($conexion->extraer_registro());

        // while($fila = ){
        //     $datos.push() .= "$fila[1], $fila[2], $fila[3]";
        // }
        echo $datos;
}



if(isset($_POST['nombre'],$_POST['clave'])){
    // session_start();
        autentificarUsuario($conexion, $_POST['nombre'], $_POST['clave']);
       //header("Location: comentarios.php");
        //header('HTTP/1.1 200 OK');
}


if(isset($_POST['id'],$_POST['usuario'])){
    // session_start();
        $id = $_POST['id'];
        $nombre = $_POST['usuario'];

        session_start();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['id_usuario'] = $id;
        
        // header("Location: comentarios.php");
        //header('HTTP/1.1 200 OK');
}


if(isset($_POST['cerrarsesion'])){
    // session_start();

    session_start(); //to ensure you are using same session
    session_destroy(); //destroy the session
    //header("Location: /login.php"); //to redirect back to "index.php" after logging out
    exit();
        //header('HTTP/1.1 200 OK');
}






?>