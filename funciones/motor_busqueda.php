<?php
/*
 * Archivo: motor_busqueda.php
 * Fecha de Creación: 26/06/2016
 * Fecha de Modificación: ¬|¬
 * Autor: RnJhbmNpc2NvIFJleWVzIFPDoW5jaGV6
 * Archivos usados: config.php, core.php
 *  */
session_start();
try {
    /* @var $_POST type */
    if ($_POST) {
        include('config.php');
        include('core.php');
        $datos = trim($_POST['cadena']);
        
        if ($datos <> '') {
            $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Hizo una busqueda de: ".$datos."'";
            bitacora($sql);
            tiempo_consulta();
            $sql_ventas = "SELECT * FROM tb_ventas WHERE factura REGEXP '$datos' OR cliente REGEXP '$datos' OR costo_molde REGEXP '$datos' OR costo_materiales REGEXP '$datos' OR costo_horno REGEXP '$datos' OR costo_prensa REGEXP '$datos' OR total REGEXP '$datos' LIMIT 25";
            $ejecuta_ventas = returnTable($sql_ventas);
            $sql_productos = "SELECT * FROM tb_productos WHERE nombre RLIKE '$datos' OR descripcion RLIKE '$datos' OR numero_parte RLIKE '$datos' OR costo RLIKE '$datos' OR precio RLIKE '$datos' OR medidas RLIKE '$datos' OR material RLIKE '$datos' OR dureza RLIKE '$datos' LIMIT 25";
            $ejecuta_productos = returnTable($sql_productos);
            $sql_usuarios = "SELECT * FROM tb_usuarios WHERE nombre REGEXP '$datos' OR usuario REGEXP '$datos' OR correo REGEXP '$datos' OR telefono REGEXP '$datos' OR tipo REGEXP '$datos' OR estado REGEXP '$datos' LIMIT 25";
            $ejecuta_usuarios = ejecutar_sentencia($sql_usuarios);
            tiempo_consulta();
            $contar_a = contar_filas($ejecuta_ventas);
            $contar_p = contar_filas($ejecuta_productos);
            $contar_c = contar_filas($ejecuta_usuarios);
            $total_filas = $contar_a + $contar_p + $contar_c;
            $tiempo_estimado = tiempo_consulta();
            echo'<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          ' . $total_filas . '   Resultados encontrados de ' . $datos . ' en aproximadamente (' . $tiempo_estimado . ' Segundos).
                        </div>
                       </div>';
            if ($contar_a <> 0) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php print_r($contar_a); ?> Ventas encontradas
                    </div>
                    <div class="panel-body">
                        <div class="datagrid"><table>
                                <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Cliente</th>
                                        <th>Costo de molde</th>
                                        <th>Costo de materiales</th>
                                        <th>Costo de maquinado</th>
                                        <th>Costo de prensa</th>
                                        <th>Total</th>
                                       <?php if($_SESSION['tipo']=='Administrador' or $_SESSION['tipo']=='Capturista'){
                                           echo'<th>Opciones</th>';
                                       }
                                        ?>
                                    </tr></thead>
                                <tbody>
                                    <?php
                                    while ($fila = mysqli_fetch_array($ejecuta_ventas, MYSQLI_ASSOC)) {
                                        $clave_venta = $fila['id_venta'];
                                        echo '<tr class="odd gradeX">
                                            <td class="center">' . $fila['factura'] . '</td>
                                            <td class="center">' . $fila['cliente'] . '</td>
                                            <td class="center">' . $fila['costo_molde'] . '</td>
                                            <td class="center">' . $fila['costo_materiales'] . '</td>
                                            <td class="center">' . $fila['costo_horno'] . '</td>
                                            <td class="center">' . $fila['costo_prensa'] . '</td>
                                            <td class="center">' . $fila['total'] . '</td>';
                                           if($_SESSION['tipo']=='Administrador' or $_SESSION['tipo']=='Capturista'){
                                            echo'<td class="center">
                                            <a   class="btn btn-success" href="?view_action=details_sale&identifier=' . base64_encode($fila['id_venta']) . '"> Detalles
                                            </a>
                                            <a onclick="eliminar_venta(' . rawurlencode($fila['id_venta']) . ')"  class="btn btn-danger "> Borrar
                                            </a>
                                            </td>';
                                           }

                                       echo'</tr> ';
                                    }
                                    ?>
                                </tbody>
                            </table></div>
                    </div>
                    <!-- /.panel-body -->
                </div> 
                <?php
            }
            if ($contar_p <> 0) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php print_r($contar_p); ?> Productos encontrados</div>
                    <div class="panel-body">
                        <div class="datagrid">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Número de Parte</th>
                                        <th>Costo de producción</th>
                                        <th>Medidas</th>
                                        <th>Material</th>
                                        <th>Dureza</th>
                                         <?php if($_SESSION['tipo']=='Administrador' or $_SESSION['tipo']=='Capturista'){
                                           echo'<th>Opciones</th>';
                                       }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fila_b = mysqli_fetch_array($ejecuta_productos, MYSQLI_ASSOC)) {
                                        echo '<tr class="odd gradeX">

                                            <td class="center"><img src="' . $fila_b['imagen'] . '" id="cssImgProducto" ></td>
                                            <td class="center">' . $fila_b['nombre'] . '</td>
                                            <td class="center">' . $fila_b['descripcion'] . '</td>
                                            <td class="center">' . $fila_b['numero_parte'] . '</td>
                                            <td class="center">' . $fila_b['costo'] . '</td>
                                            <td class="center">' . $fila_b['medidas'] . '</td>
                                            <td class="center">' . $fila_b['material'] . '</td>
                                            <td class="center">' . $fila_b['dureza'] . '</td>';
                                        if($_SESSION['tipo']=='Administrador' or $_SESSION['tipo']=='Capturista'){
                                            echo'<td class="center">
                                            <a  href="index.php?view_action=edit_product&identifier=', base64_encode($fila_b['id_producto']), '" class="btn btn-success "> Editar
                                            </a>
                                            <a onclick="return eliminar_producto(', rawurlencode($fila_b['id_producto']), ')" class="btn btn-danger " > Borrar
                                            </a>


                                            </td>';
                                        }

                                       echo' </tr> ';
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
            if ($contar_c <> 0 and $_SESSION['tipo']=='Administrador') {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php print_r($contar_c); ?> Usuarios encontrados</div>
                    <div class="panel-body">
                        <div class="datagrid">
                            <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Contraseña</th>
                                        <th>Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                <?php
                while ($fila = mysqli_fetch_array($ejecuta_usuarios)) {
                    echo '<tr class="odd gradeX">
                                            <td class="center">' . $fila['nombre'] . '</td>
                                            <td class="center">' . $fila['usuario'] . '</td>
                                            <td class="center">' . $fila['correo'] . '</td>
                                            <td class="center">' . $fila['telefono'] . '</td>
                                            <td class="center">' . $fila['contrasenia'] . '</td>
                                                 <td class="center">
                                            <a  href="index.php?view_action=edit_user&identifier=', base64_encode($fila['id_usuario']), '" class="btn btn-success "> Editar
                                            </a>
                                            <a onclick="return eliminar_usuario(', rawurlencode($fila['id_usuario']), ')" class="btn btn-danger " > Borrar
                                            </a>
                                            </td>
                                        </tr> ';
                }
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                                <?php
                                }
                                if ($total_filas == 0) {
                                    $contenido = '<a>:( No se ha encontrado algún resultado de ' . $datos . ' en el sistema</a><br>Vuelva a intentar buscar con palabras clave que coincidan con los datos que desea obtener del sistema';
                                    echo'<div class="col-lg-12">';
                                    mensaje($contenido, 'danger', 'mTransicion');
                                    echo'</div>';
                                }
                                ?>
            </div>
            <?php
        }
    } else {
        exit();
    }
} catch (Exception $e) {
    
}
