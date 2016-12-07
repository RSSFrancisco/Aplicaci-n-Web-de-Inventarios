<?php
session_start();
try {
    if($_POST){
        include('core.php');
         $factura=$_POST['factura'];
         $cliente=$_POST['cliente'];
         $costo_molde=$_POST['costo_molde'];
         $costo_materiales=$_POST['costo_materiales'];
         $costo_horno=$_POST['costo_horno'];
         $costo_prensa=$_POST['costo_prensa'];
         $_SESSION['total'] = $costo_molde + $costo_materiales + $costo_horno + $costo_prensa;
         
         # Inserta en la tabla "tb_ventas" un nuevo registro con los datos que se envian por el metodo POST
         $sql="INSERT INTO tb_ventas SET factura='$factura',cliente='$cliente',costo_molde='$costo_molde',costo_materiales='$costo_materiales',costo_horno='$costo_horno',costo_prensa='$costo_prensa'";
         $ejecuta=returnTable($sql); 
         $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Guardo una nueva venta del cliente : ".$cliente."'";
         bitacora($sql);
         # Elimina las variables que se usaron  en este script
         unset($factura,$cliente,$costo_molde,$costo_materiales,$costo_horno,$costo_prensa,$sql,$ejecuta);

    }else{
        exit();
    }
} catch (Exception $e) {
    
}