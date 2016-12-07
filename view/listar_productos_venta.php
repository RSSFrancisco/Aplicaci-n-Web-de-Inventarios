<?php session_start(); ?>
<div class="row">
            <div class="col-lg-12">
<div class="panel panel-default">
                    <div class="panel-heading">PRODUCTOS AGREGADOS</div>
                    <div class="panel-body">


 <div class="datagrid"><table>
						    <thead>
						    <tr>
						        <th>Foto</th>
						        <th>Nombre</th>
						        <th>Número de Parte</th>
						        <th>Costo de producción</th>
						        <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
						        <th>Opción</th>
						    </tr>
						    </thead>
						    <tbody>
                                                        <?php
                                                        $id=$_POST['id_venta'];
                                                         include_once('../funciones/config.php');
                                                        $consulta="SELECT * FROM tb_ventas_productos WHERE id_venta='$id'";
                                                         $sql = mysqli_query($conectar,$consulta);

                                                        while ($fila = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
                                                        $clave_producto=$fila['id_producto'];
                                                        $cantidad=$fila['cantidad'];
                                                        $subtotal=$fila['subtotal'];
                                                        $consulta_pro="SELECT * FROM tb_productos WHERE id_producto='$clave_producto'";
                                                        $sql_pro=mysqli_query($conectar,$consulta_pro);
                                                        while ( $fila_p = mysqli_fetch_array($sql_pro,MYSQLI_ASSOC)) {

                                                               echo '<tr class="odd gradeX">

                                            <td ><img src="'.$fila_p['imagen'].'" id="cssImgProducto" ></td>
                                            <td class="center">' . $fila_p['nombre'] . '</td>

                                            <td >' . $fila_p['numero_parte'] . '</td>
                                            <td >' . $fila_p['costo'] . '</td>
                                            <td >' . $fila_p['precio'] . '</td>
                                            <td >' . $cantidad. '</td>
                                            <td >' . $subtotal. '</td>
                                                 <td >';
                                              ?>
                                            <a onclick="eliminar_producto_venta(<?php echo $clave_producto; ?>,<?php echo $id; ?>)" class="btn btn-danger " > Eliminar
                                            </a>


                                            </td>


                                        </tr>

                                                 <?php }
                                                        }
                                                        ?>


                                                    </tbody>
					</table></div>
                        </div>
                        </div>
                        </div>
                         </div>
