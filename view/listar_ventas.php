<?php
include_once('funciones/config.php');
$sql="SELECT * FROM tb_ventas";
$execute= $conectar->query($sql);
?>
<div class="row">
            <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                     LISTADO DE VENTAS
                        </div>
                        <div class="panel-body">

                                  <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                <tr>
                    <th data-sortable="true">Factura</th>
                    <th data-sortable="true">Cliente</th>
                    <th data-sortable="true">Costo de molde</th>
                    <th data-sortable="true">Costo de materiales</th>
                    <th data-sortable="true">Costo de maquinado</th>
                    <th data-sortable="true">Costo de prensa</th>
                    <th data-sortable="true">Total</th>
                    <th data-sortable="true">Opciones</th>

                </tr>
                </thead>
                <tbody>
                 <?php
                     while ($fila = mysqli_fetch_array($execute,MYSQLI_ASSOC)) {
                                        $clave_venta=$fila['id_venta'];
                                          echo '<tr class="odd gradeX">
                                            <td class="center">' . $fila['factura'] . '</td>
                                            <td class="center">' . $fila['cliente'] . '</td>
                                            <td class="center">' . $fila['costo_molde'] . '</td>
                                            <td class="center">' . $fila['costo_materiales'] . '</td>
                                            <td class="center">' . $fila['costo_horno'] . '</td>
                                            <td class="center">' . $fila['costo_prensa'] . '</td>
                                            <td class="center">' . $fila['total'] . '</td>
                                            <td class="center">
                                            <a   class="btn btn-success" href="?view_action=details_sale&identifier='.base64_encode($fila['id_venta']).'"> Detalles
                                            </a>
                                            <a onclick="eliminar_venta('.rawurlencode($fila['id_venta']).')"  class="btn btn-danger "> Borrar
                                            </a>
                                            </td>


                                        </tr> ';
                                           }
                                     ?>
                           </tbody>
                       </table>
                        </div>
                        <!-- /.panel-body -->
               </div></div></div>


   <div id="resultadoE"></div>
