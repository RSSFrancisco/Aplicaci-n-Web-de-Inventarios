<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <br>
        <div class="form-group">
            <input type="text" id="txtBuscando"  class="form-control" placeholder="BUSCAR...">
        </div>
        <li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Inicio</a></li>
        <?php if($_SESSION['tipo']=='Administrador'){ ?>
        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-1">
                <span ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Usuarios
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a href="index.php?view_action=new_user&identifier=?">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Nuevo
                    </a>
                </li>
                <li>
                    <a href="index.php?view_action=list_users&identifier=?">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Listar
                    </a>
                </li>

            </ul>
        </li>
        <?php } if($_SESSION['tipo']=='Capturista' or $_SESSION['tipo']=='Administrador') { ?>
        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-2">
                <span ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Productos
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="index.php?view_action=new_product&identifier=?" >
                        <svg class="glyph stroked chevron-right"></svg> Nuevo producto
                    </a>
                </li>
                <li>
                    <a class="" href="index.php?view_action=list_products&identifier=?">
                        <svg class="glyph stroked chevron-right"></svg> Listar
                    </a>
                </li>

            </ul>
        </li>

        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-3">
                <span ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Ventas
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="index.php?view_action=new_sale&identifier=?" >
                        <svg class="glyph stroked chevron-right"></svg> Nuevo venta
                    </a>
                </li>
                <li>
                    <a class="" href="index.php?view_action=list_sale&identifier=?">
                        <svg class="glyph stroked chevron-right"></svg> Listar ventas
                    </a>
                </li>

            </ul>
        </li>
         <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-4">
                <span ><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Historial
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li>
                    <a class="" href="index.php?view_action=list_history&identifier=?">
                        <svg class="glyph stroked chevron-right"></svg> Listado 
                    </a>
                </li>

            </ul>
        </li>
        <?php } ?>
        <li role="presentation" class="divider"></li>
        <li><a href="funciones/salir.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Salir</a></li>
    </ul>

</div><!--/.sidebar-->
