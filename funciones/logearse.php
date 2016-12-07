<?php
session_start();
if($_POST){
include("config.php");
include("core.php");
$vusuario = $_POST['u'];
$vcontrasenia =$_POST['c'];
$parser_contrasenia= encriptar($vcontrasenia);
$rst_usuarios ="SELECT * FROM tb_usuarios WHERE usuario='".$vusuario."' and contrasenia='".$parser_contrasenia."'";
$ejecuta=$conectar->query($rst_usuarios); 
@$num_registros = mysqli_num_rows($ejecuta);

if ($num_registros > 0) {
$sql="INSERT INTO tb_bitacora SET usuario='".$vusuario."', accion='Inicio sesión en el sistema'";
bitacora($sql);
    while ($fila = mysqli_fetch_array($ejecuta,MYSQLI_ASSOC)) {
        # code...
         $_SESSION['nombre'] = $fila['nombre'];
         $_SESSION['tipo'] = $fila['tipo'];
         $_SESSION['id_usuario'] = $fila['id_usuario'];
         $_SESSION['usuario'] = $fila['usuario'];
         $_SESSION['estatus'] = $fila['estado'];
    }

    if($_SESSION['estatus']==0){

       $rst_usuarios ="UPDATE tb_usuarios SET estado=1 where id_usuario=".$_SESSION['id_usuario']."";
       $conectar->query($rst_usuarios); 
       echo 1;
     }else
     {
      echo'<div class="alert alert-danger alert-dismissable mTransicion">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               <a>[:(] Existen sesiones abiertas con su usuario en el Sistema, por su seguridad debe: </a><br>
                                <a href="funciones/salir.php" class="btn btn-block btn-default" id="cerrarSesionesAbiertas" >Cerrar sesiones abiertas</a>
                            </div>';
     }
    
} else {
    echo'<div class="alert alert-danger alert-dismissable mTransicion">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               <a>[:(] EL usuario o contraseña que ha ingresado es invalido.</a><br>
                            </div>';
  
    

}
}
?>