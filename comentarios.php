

<?php include_once("comentarios_logica.php"); ?>

<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Actividad 6</title>
            <meta charset="utf-8">
            <meta name="description" content="Usando php: SESIONES Y COOKIES">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <script src="js/funciones.js"></script>

        </head>




        <body>
            <div id="main_page">
                <div id="main_encabezado">
                    <img src="rsc/logo_UNA.png" style="height: 70px; width: 70px">
                    <h1 id="saludo" style="margin-top: -50px; margin-left: 75px;">HOLA <?php echo $_SESSION['usuario'] ?>, BIENVENIDO</h1>
                    <div style="margin-top: -65px; margin-left: 85%; 
  min-width: 139px;">
                        <a id="txt_salir">Cerrar sesión</a>
                    </div>
                </div>

                <div id="agregar_comentario_cont">
                    <div style="position: relative; width: 80%; height: 100%;  display: grid;
                            place-items: center; margin-left: 10px;">
                        <H3 style="color: #fff;">Crear comentario</H3>
                        <textarea id="txt_area_comentario" name="txt_area_comentario" rows="8" cols="30" maxlength="300" placeHolder="Escribe tu comentario..."></textarea>
                    </div>
                    <div style="position: relative; width: 50%; height: 100%; display: grid;
                            place-items: center; margin-right: 10px;">
                        <button id="btn_postear" class="btn btn-material" type="button">Postear</button>
                    </div>
                </div>

                <div id="cont_comentarios_posteados">
                    <div class="titulo_comentarios_posteados">
                        <h2>Comentarios posteados</h2>
                    </div>

                    <div id="contenedor_comentarios" style="overflow: scroll;">
                        <div class="comentario">
                            <?php
                                echo obtener_comentarios($conexion,$c);
                            ?>
                        </div>
                    </div>
                </div>





            </div>


        </body>

        </html>