<?php
try {
    if($_POST){
        include('config.php');
        include('core.php');
         $key_producto=$_POST['key_producto'];
         $key_venta=$_POST['key_venta'];
               $sql="DELETE FROM tb_ventas_productos WHERE id_venta='$key_venta' AND id_producto='$key_producto'";
         $ejecuta=$conectar->query($sql);
         # Elimina las variables que se usaron  en este script
         liberar_variables($arreglo = array($key_producto,$key_venta,$sql,$ejecuta));
         echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                SE ELIMINO CORRECTAMENTE EL PRODUCTO 
            
             </div>";

    }else{
        exit();
    }
} catch (Exception $e) {

}
