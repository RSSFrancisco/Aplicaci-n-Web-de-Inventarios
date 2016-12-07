<?php
include_once('funciones/config.php');
$sql="SELECT * FROM tb_ventas WHERE id_venta='$identificador'";
$execute= $conectar->query($sql);
$sql_product="SELECT * FROM  tb_productos";
$execute_product=$conectar->query($sql_product);
?>
<div class="row">
  <div class="col-lg-12">

    <div class="panel panel-default">
      <div class="panel-heading">

       DETALLE DE LA VENTA <a id="idDetalleVenta"><?php print($identificador); ?></a>
     </div>
     <div class="panel-body">

      <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
          <tr>
            <th  data-sortable="true" >Factura</th>
            <th  data-sortable="true" >Cliente</th>
            <th data-sortable="true">Costo de molde</th>
            <th data-sortable="true">Costo de materiales</th>
            <th data-sortable="true">Costo de maquinado</th>
            <th data-sortable="true">Costo de prensa</th>
            <th data-sortable="true">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($fila = mysqli_fetch_array($execute,MYSQLI_ASSOC)) {
            $clave_venta = $fila['id_venta'];
            $costo_molde = $fila['costo_molde'];
            $costo_materiales = $fila['costo_materiales'];
            $costo_horno = $fila['costo_horno'];
            $costo_prensa = $fila['costo_prensa'];
            $_SESSION['total'] = $fila['total'];
            echo '<tr class="odd gradeX">
            <td class="center">' . $fila['factura'] . '</td>
            <td class="center">' . $fila['cliente'] . '</td>
            <td class="center">' . $costo_molde . '</td>
            <td class="center">' . $costo_materiales . '</td>
            <td class="center">' . $costo_horno . '</td>
            <td class="center">' . $costo_prensa . '</td>
            <td class="center">' . $_SESSION['total'] . '</td>
          </tr> ';
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- /.panel-body -->
</div></div></div>

<div class="row">
 <div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-body">
     <div class="col-lg-6">
      <div class="form-group">
        <label >Producto</label>
        <select  id="cmbProducto" class="form-control" >
         <option>Seleccionar</option>
         <?php while ($fila_p = mysqli_fetch_array($execute_product,MYSQLI_ASSOC)) {
          $precio_producto=$fila_p['precio'];
          echo'
          <option  value="',$fila_p['id_producto'],'">',$fila_p['nombre'],'</option>';
        }

        ?>

      </select>
      <p class="help-block"></p>

    </div>

  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label >Cantidad</label>
      <input type="text" class="form-control" id="txtCantidad" >
    </div>

  </div>
  <a onclick="agregar_producto_venta(<?php echo $clave_venta; ?>,<?php echo $precio_producto; ?>)" class="btn btn-success" >Agregar Producto</a>

</div>

</div>
<div id="resultadoC">

</div>

</div>

</div>

<div id="resultadoE" class="listadoProductosVenta" ></div>
<div class="col-lg-12">
  <a class="btn btn-default">TOTAL:</a><a class="btn btn-default" id="btnTotal"> <?php print($_SESSION['total']) ?></a>
  <a class="btn btn-info" onclick="finalizar_venta(<?php echo $clave_venta; ?>)">ACTUALIZAR VENTA</a>
  <br>
  <br>
</div>
