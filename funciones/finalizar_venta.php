<?php
try {
    if($_POST){
        include('config.php');
        include('core.php');
         $total=$_POST['total'];
         $key=$_POST['key'];
         #
         $sql="UPDATE  tb_ventas SET total='$total' WHERE id_venta='$key'";
         $ejecuta=$conectar->query($sql);
         # Elimina las variables que se usaron  en este script
         liberar_variables($arreglo = array($total,$key,$sql,$ejecuta));
    }else{
        exit();
    }
} catch (Exception $e) {

}
