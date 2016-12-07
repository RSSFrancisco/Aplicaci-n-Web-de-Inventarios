<?php
include_once('funciones/core.php');
$sql="SELECT * FROM tb_bitacora";
$execute= returnTable($sql);
?>
<div class="row">
            <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                     HISTORIAL
                        </div>
                        <div class="panel-body">

                                  <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                <tr>
                    <th data-sortable="true">ID</th>
                    <th data-sortable="true">Usuario</th>
                    <th data-sortable="true">Acción</th>
                    <th data-sortable="true">Fecha</th>
                   

                </tr>
                </thead>
                <tbody>
                 <?php
                     while ($fila = mysqli_fetch_array($execute,MYSQLI_ASSOC)) {
                                       
                                          echo '<tr class="odd gradeX">
                                            <td class="center">' . $fila['id_bitacora'] . '</td>
                                            <td class="center">' . $fila['usuario'] . '</td>
                                            <td class="center">' . $fila['accion'] . '</td>
                                            <td class="center">' . $fila['fecha'] . '</td>
                                         


                                        </tr> ';
                                           }
                                     ?>
                           </tbody>
                       </table>
                        </div>
                        <!-- /.panel-body -->
               </div></div></div>


   <div id="resultadoE"></div>
