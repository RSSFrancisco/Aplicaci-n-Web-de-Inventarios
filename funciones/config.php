<?php
include_once('constantes.php');
    $servidor=SERVIDOR;
    $usuarioBD=USUARIO;
    $passwordBD=CONTRASENIA;
    $baseDatos=BASE_DATOS;
    $conectar = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
    