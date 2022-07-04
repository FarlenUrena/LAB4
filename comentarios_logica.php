<?php
require_once("conexion.php");

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

$c = new Conexion($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// $c = new Conexion($servidor,$usuario,$clave,$base_datos);

function obtener_creador($conexion,$id_comentario){
    $creador = $conexion->consulta("SELECT DISTINCT u.nombre FROM `tbl_comentario` c JOIN `tbl_usuario` u WHERE c.id_usuario LIKE u.id AND c.id LIKE '$id_comentario' "); 
    //$creador = $conexion->consulta("SELECT nombre FROM tbl_comentario WHERE id LIKE '$id'");
    $datos='';
    $datos = $conexion->extraer_registro();
    return $datos[0];
    // echo $datos[0];
}

function obtener_comentarios($conexion,$c){
    $conexion->consulta("SELECT * FROM tbl_comentario ORDER BY fecha_creacion DESC");
    $datos =  '';
    while ($fila = $conexion->extraer_registro()){
    $nombre ='';
    $nombre = obtener_creador($c,$fila[0]);
    //echo $nombre . ' , ';
    //  = c->extraer_registro();
    $datos .= " <div class='comentario'> <div class='encabezado'><div class='encabezado_nombre'><h3> Nombre: <label> $nombre </label> </h3>
    </div><div class='encabezado_fecha'><label style='font-weight: bold;'> $fila[2] </label></div></div><div class='info_comentario_contenedor'>
    <textarea readonly class='txtarea_info_comentario' name='txt_area_comentario' rows='3' cols='30' maxlength='300'>
    $fila[1]</textarea></div></div>";
    }
    return $datos;
}

function crearComentario( $conexion, $comentario, $usuario_id){
    $insert = "INSERT INTO tbl_comentario (comentario,id_usuario) VALUES ('$comentario', '$usuario_id')";
    $conexion->consulta($insert);
}


if(isset($_GET)){
    obtener_comentarios($conexion,$c);
}


if(isset($_POST['comentario'])){
    session_start();
    $id_usu= $_SESSION['id_usuario'];
    crearComentario($conexion,$_POST['comentario'], $id_usu);
    //    header("Location: comentarios.php");
        //header('HTTP/1.1 200 OK');
        //$datos = json_encode($conexion->extraer_registro());

        //echo $datos;
}

if(isset($_GET['id'])){

    obtener_creador($conexion, $_GET['id']);
}


?>