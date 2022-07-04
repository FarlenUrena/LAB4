<!-- valida si hay una sesión abierta, si no hay, se redirige al login -->
<?php

session_start();
if(isset($_SESSION['usuario'])){
    // alert("asdfasdfa");
    header('Location: comentarios.php');
}

?>


<?php
    error_reporting(E_ALL);
    ini_set('display_errors','1');
?>
<?php include_once("autentificacion.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Actividad 6</title>
    <meta charset="utf-8">
    <meta name="description" content="Usando php: SESIONES">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/funciones.js"></script>

</head>

<body>

<div id="pagina">

<div id="login_page">
                    <!-- <div id="cont_hipervinculos">
                        <div class="cls_hipervinculos"><a
                                href="https://www.una.ac.cr/ https://www.una.ac.cr/facultades-centros-y-sedes/">
                                Universidad
                            </a></div>
                        <div class="cls_hipervinculos"><a href="https://www.una.ac.cr/facultades-centros-y-sedes/">
                                Sedes
                            </a></div>
                        <div class="cls_hipervinculos"><a href="https://www.una.ac.cr/facultades-centros-y-sedes/">
                                Ayuda
                            </a></div>
                    </div> -->

                    <div style="height: 70px;"></div>
                    <div id="contenedor_logo_login">
                        <img id="logo_login" src="rsc/logo_UNA.png">
                    </div>
                    <!-- <div style="height: 50px;"></div> -->
                    <!-- <form method="post" id="frm_login" name="frm_login" action="comentarios.php"> -->
                        <div id="cont_formulario_login">
                            <div class="row">
                                <span>
                                    <input class="balloon" id="nombre_login" type="text" placeholder="" /><label
                                        for="state">Usuario</label>
                                </span>
                                <span>
                                    <input class="balloon" id="clave_login" type="password" placeholder="" /><label
                                        for="planet">Contraseña</label>
                                </span>
                            </div>
                            <div id="btn_cont">
                                <button type="submit" class="btn" id="btn_ingresar">Ingresar</button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
</div>
    <!-- <div class="login_cont">

    <div class="imagen_cont">
    </div>

    <div class="campo_txt">

    <label>Usuario: </label><input type="text" class="campo_texto" maxlength="20" value="" id="txt_usu"
            name="txt_usu"> <br><br>

        <label>Contraseña: </label><input type="text" class="campo_texto" maxlength="20" value="" id="txt_contra"
            name="txt_contra"> <br><br>


    </div>


    </div> -->




</body>


</html>