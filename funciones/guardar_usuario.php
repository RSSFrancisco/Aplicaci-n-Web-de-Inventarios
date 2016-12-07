<?php
session_start();
try {
    if($_POST){
        include_once('config.php');
        include 'core.php';
         $nombre=$_POST['nombre'];
         $usuario=$_POST['usuario'];
         $tipo =$_POST['tipo'];
         $correo=$_POST['correo'];
         $telefono=$_POST['telefono'];
         $contrasenia=$_POST['contrasenia'];
         $password=encriptar($contrasenia);

         $sql="INSERT INTO tb_usuarios SET nombre='$nombre',usuario='$usuario',tipo='$tipo',correo='$correo',telefono='$telefono',contrasenia='$password',estado=0";
         $ejecuta=mysqli_query($conectar,$sql);
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Guardo un nuevo usuario con nombre: ".$nombre."'";
         bitacora($sql);
          echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Se guardo correctamente el usuario ".$usuario."
            
             </div>";

    }else{
        exit();
    }
} catch (Exception $e) {
    
}