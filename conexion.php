<?php

    class Conexion{
        private $servidor;
        private $usuario;
        private $clave;
        private $base_datos;
        private $conexion;
        public $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        function __construct($servidor,$usuario,$clave,$base_datos){
            $this->servidor = $this->url[$servidor];
            $this->usuario = $this->url[$usuario];
            $this->clave = $this->url[$clave];
            $this->base_datos = substr($this->url[$base_datos],1);
            // $db = substr($url["path"], 1);
            $this->conectar_base_datos();

        }

        private function conectar_base_datos(){
            $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave);
            mysqli_select_db($this->conexion,$this->base_datos) or die (mysqli_error($this->conexion));
            mysqli_query($this->conexion, "SET NAMES 'utf8'");

            return $this->conexion;
        }

        public function consulta($consulta){
            $this->resultado = mysqli_query($this->conexion, $consulta);
        }

        public function extraer_registro(){
            if($fila = mysqli_fetch_row($this->resultado)){
                return $fila;
            }else{
                return false;
            }

        }

    }




?>