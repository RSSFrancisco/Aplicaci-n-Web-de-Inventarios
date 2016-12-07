	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">LISTADO DE PRODUCTOS</div>
					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-sortable="true" >Foto</th>
						        <th  data-sortable="true" >Nombre</th>
						        <th data-sortable="true">Descripción</th>
						        <th data-sortable="true">Número de Parte</th>
						        <th data-sortable="true">Costo de producción</th>
						        <th data-sortable="true">Medidas</th>
						        <th  data-sortable="true">Material</th>
						        <th  data-sortable="true">Dureza</th>
						        <th  data-sortable="true">Opción</th>
						    </tr>
						    </thead>
						    <tbody>
                                                        <?php

                                                         include_once('funciones/config.php');
                                                        $consulta="select * from tb_productos";
                                                         $sql = mysqli_query($conectar,$consulta);

                                                        while ($fila = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {


                                                            echo '<tr class="odd gradeX">

                                            <td class="center"><img src="'.$fila['imagen'].'" id="cssImgProducto" ></td>
                                            <td class="center">' . $fila['nombre'] . '</td>
                                            <td class="center">' . $fila['descripcion'] . '</td>
                                            <td class="center">' . $fila['numero_parte'] . '</td>
                                            <td class="center">' . $fila['costo'] . '</td>
                                            <td class="center">' . $fila['medidas'] . '</td>
                                            <td class="center">' . $fila['material'] . '</td>
                                            <td class="center">' . $fila['dureza'] . '</td>
                                                 <td class="center">
                                            <a  href="index.php?view_action=edit_product&identifier=', base64_encode($fila['id_producto']), '" class="btn btn-success "> Editar
                                            </a>
                                            <a onclick="return eliminar_producto(', rawurlencode($fila['id_producto']),')" class="btn btn-danger " > Borrar
                                            </a>


                                            </td>


                                        </tr> ';




                                                        }
                                                        ?>


                                                    </tbody>
						</table>
					</div>
				</div>
				<div id="resultadoC"></div>
			</div>
		</div><!--/.row-->
