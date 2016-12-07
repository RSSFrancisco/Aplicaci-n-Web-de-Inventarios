<?php
try {
    if($_POST){
        include('core.php');
         $opcion=$_POST['key'];
          switch ($opcion):
            case '1':
            # Consulta el total de registros en la tabla Productos
                 $sql="SELECT count(id_producto) FROM tb_productos";
              break;
            case '2':
            # Consulta el total de registros en la tabla Ventas
                 $sql="SELECT count(id_venta) FROM tb_ventas";
              break;
            case '3':
            # Consulta el total de registros en la tabla usuarios
                 $sql="SELECT count(id_usuario) FROM tb_usuarios";
              break;
          endswitch;
            # Ejecuta la sentencia que preceda el case
         $ejecuta=returnTable($sql);
            # Si devuelve alguna fila la Sentencia a la BD entonces Ejecuta el siguiente ciclo
         if ($row = mysqli_fetch_row($ejecuta)) {
            echo trim($row[0]);
         }
         # Elimina las variables que se usaron  en este script
      liberar_variables($arreglo = [$opcion,$sql,$ejecuta,$row]);

    }else{
        exit();
    }
} catch (Exception $e) {

}
