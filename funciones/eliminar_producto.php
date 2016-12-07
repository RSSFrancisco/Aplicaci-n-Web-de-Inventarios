<?php
session_start();
try {
    if($_POST){
        include('config.php');
        include('core.php');
         $key_producto=rawurldecode($_POST['key']);
         $sql="SELECT imagen FROM tb_productos WHERE id_producto='$key_producto'";
         $ejecuta=$conectar->query($sql);
         while ($fila = mysqli_fetch_array($ejecuta,MYSQLI_ASSOC)) {
             $imagen=$fila['imagen'];
         }
           $directorio_imagen='../';
           unlink($directorio_imagen.$imagen);
         $sql="DELETE FROM tb_productos WHERE id_producto='$key_producto'";
         $ejecuta=$conectar->query($sql);
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Elimino el Producto con ID ".$key_producto."'";
         bitacora($sql);
         # Elimina las variables que se usaron  en este script
         liberar_variables($arreglo = array($key_producto,$sql,$ejecuta,$fila,$imagen,$directorio_imagen));
         echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                SE ELIMINO CORRECTAMENTE EL PRODUCTO, EN UN MOMENTO SE ACTUALIZARA EL LISTADO DE PRODUCTOS

             </div>";
    }else{
        exit();
    }
} catch (Exception $e) {

}
