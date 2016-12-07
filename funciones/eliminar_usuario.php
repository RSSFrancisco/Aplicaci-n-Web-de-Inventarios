<?php
session_start();
include_once("config.php");
include("core.php");
try {
	$clave=rawurldecode($_POST['clave']);
	 $strConsulta = "DELETE FROM  tb_usuarios  WHERE id_usuario='$clave' ";
	 mysqli_query($conectar,$strConsulta);
	 mysqli_close($conectar);
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Elimino el Usuario con ID ".$clave."'";
         bitacora($sql);
     echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Se elimino correctamente .
            
             </div>";
} catch (Exception $e) {
echo'Ha ocurrido una exepción en la linea '.$e;
mysqli_close($conectar);
}


