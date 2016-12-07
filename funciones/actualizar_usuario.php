<?php
session_start();
try {
    if($_POST){
        include_once('config.php');
        include 'core.php';
         $clave=$_POST['clave'];
         $nombre=$_POST['nombre'];
         $usuario=$_POST['usuario'];
         $tipo = $_POST['tipo'];
         $correo=$_POST['correo'];
         $telefono=$_POST['telefono'];
         $contrasenia=$_POST['contrasenia'];
         $password=encriptar($contrasenia);
         $sql="UPDATE tb_usuarios SET nombre='$nombre',usuario='$usuario',tipo='$tipo',correo='$correo',telefono='$telefono',contrasenia='$password' WHERE id_usuario='$clave'";
         $ejecuta=mysqli_query($conectar,$sql);
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Actualizo el Usuario ".$nombre."'";
         bitacora($sql);
          echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Se actualizo correctamente el usuario ".$usuario."

             </div>";

    }else{
        exit();
    }
} catch (Exception $e) {

}
