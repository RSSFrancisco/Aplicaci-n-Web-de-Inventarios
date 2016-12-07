<?php
session_start();
 include('config.php');
 include('core.php');
try {
    if($_POST){
         $id_venta= $_POST['id_venta'];
         $id_producto= $_POST['id_producto'];
         $cantidad= $_POST['cantidad'];
         $precio= $_POST['precio'];
         $subtotal= $cantidad * $precio;
         //$_SESSION['total']=$_SESSION['total']+$subtotal;
         $sql="SELECT id_venta_producto FROM tb_ventas_productos WHERE id_venta='$id_venta' AND id_producto='$id_producto'";
         $ejecuta= $conectar->query($sql);
         if(!$contar=contar_filas($ejecuta)){
              $sql="INSERT INTO tb_ventas_productos SET id_venta='$id_venta',id_producto='$id_producto',cantidad='$cantidad',subtotal='$subtotal'";
         }
         else{
             $sql="UPDATE tb_ventas_productos  SET cantidad='$cantidad',subtotal='$subtotal' WHERE id_venta='$id_venta' AND id_producto='$id_producto'";
         }
         $ejecuta=$conectar->query($sql);
         liberar_variables($arreglo = array($id_venta,$id_producto,$cantidad,$sql,$ejecuta));

    }else{
        exit();
    }
} catch (Exception $e) {
    
}