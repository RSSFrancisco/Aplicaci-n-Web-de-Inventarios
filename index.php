<!DOCTYPE html>
<html>
    <?php
    session_start();
    if (!isset($_SESSION['id_usuario'])):
        header("Location:login.php");
    endif;
    if (!isset($_SESSION['nombre'])):
        header("Location:login.php");
    endif;
    if (!isset($_SESSION['usuario'])):
        header("Location:login.php");
    endif;
    include_once('view/head.php');
    ?>
    <body>
        <?php include_once('view/nav.php');
        include_once('view/sidebar.php');
        ?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active"></li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">


                </div>
            </div><!--/.row-->
            <div class="row">
                <div id="resultadoBusqueda">
                </div>
            </div>
                <?php include_once('view/panel.php'); ?>
            <div id="contenido">
                <?php
                if (isset($_GET['view_action']) and isset($_GET['identifier'])) {
                    $identificador = base64_decode($_GET['identifier']);
                    switch ($_GET['view_action']) {
                        case 'new_product':
                            # Incluye el formulario de registro de un nuevo producto
                            include('view/nuevo_producto.php');
                            break;
                        case 'new_user':
                            # Incluye el formulario de registro de un nuevo usuario
                            include('view/nuevo_usuario.php');
                            break;
                        case 'list_users':
                            # Incluye la tabla del listado de los usuarios del sistema
                            include('view/listado_usuarios.php');
                            break;
                        case 'edit_user':
                            # Incluye el formulario para editar un usuario en especifico
                            include('view/editar_usuario.php');
                            break;
                        case 'list_products':
                            # Incluye la tabla de los productos en la base de datos del sistema
                            include('view/listado_productos.php');
                            break;
                        case 'edit_product':
                            # code...
                            include('view/editar_producto.php');
                            break;
                        case 'new_sale':
                            # Incluye el formulario para realizar una nueva venta
                            include('view/nueva_venta.php');
                            break;
                        case 'add_products_sale':
                            # Incluye los detalles de la venta con el formulario para agregar productos
                            include('view/venta_productos.php');
                            break;
                        case 'list_sale':
                            # Muestra el listado de las ventas que se han registrado en el sistema
                            include('view/listar_ventas.php');
                            break;
                        case 'details_sale':
                            # code...
                            include('view/detalle_venta.php');
                            break;
                        case 'list_history':
                            include 'view/historial.php';
                            break;
                        default:
                            #
                            break;
                    }
                } else {
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Grafica General</div>
                                <div class="panel-body">
                                    <div class="canvas-wrapper">
                                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->
                <?php }
                ?>

            </div>

        </div>	<!--/.main-->

<?php 
include_once'view/graficas/grafica_general.php';
include_once('view/js.php'); ?>
    </body>

</html>
