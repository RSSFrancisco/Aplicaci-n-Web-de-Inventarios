	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">LISTADO DE USUARIOS</div>
					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-sortable="true" >Nombre</th>
						        <th data-sortable="true">Usuario</th>
						        <th data-sortable="true">Correo</th>
						        <th data-sortable="true">Telefono</th>
						        <th data-sortable="true">Contraseña</th>
						        <th  data-sortable="true">Opciones</th>

						    </tr>
						    </thead>
						    <tbody>
                                                        <?php
                                                         include_once('funciones/config.php');
                                                        $consulta="select * from tb_usuarios";
                                                         $sql = mysqli_query($conectar,$consulta);

                                                        while ($fila = mysqli_fetch_array($sql)) {


                                                            echo '<tr class="odd gradeX">


                                            <td class="center">' . $fila['nombre'] . '</td>
                                            <td class="center">' . $fila['usuario'] . '</td>
                                            <td class="center">' . $fila['correo'] . '</td>
                                            <td class="center">' . $fila['telefono'] . '</td>
                                            <td class="center">' . $fila['contrasenia'] . '</td>
                                                 <td class="center">
                                            <a  href="index.php?view_action=edit_user&identifier=', base64_encode($fila['id_usuario']), '" class="btn btn-success "> Editar
                                            </a>
                                            <a onclick="return eliminar_usuario(', rawurlencode($fila['id_usuario']),')" class="btn btn-danger " > Borrar
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
