<?php
session_start();
try {
    if($_POST){
        include('config.php');
        include('core.php');
         $key=rawurldecode($_POST['key']);
         $sql="DELETE FROM tb_ventas WHERE id_venta='$key';";
         $conectar->query($sql);
         $sql="DELETE FROM tb_ventas_productos WHERE id_venta='$key'";
         $conectar->query($sql);
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Elimino La venta  con ID ".$key."'";
         bitacora($sql);
         # Elimina las variables que se usaron  en este script
         liberar_variables($arreglo = array($key,$sql,$conectar));
         echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                SE ELIMINO CORRECTAMENTE LA VENTA, EN UN MOMENTO SE ACTUALIZARA EL LISTADO DE VENTAS

             </div>";

    }else{
        exit();
    }
} catch (Exception $e) {

}
