<?php 
include_once('funciones/config.php');
$sql_product="SELECT * FROM tb_productos WHERE id_producto='$identificador'";
$ejecuta=$conectar->query($sql_product);
?>
  <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <?php while ($fila_pro = mysqli_fetch_array($ejecuta,MYSQLI_ASSOC)) { ?>
                        <div class="panel-heading">

                    EDITAR PRODUCTO
                        </div>
                        <div class="panel-body">
                  <form action="#"  id="contactForm"  method="POST" enctype="multipart/form-data" role="form" >
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Nombre</label>
                                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php print($fila_pro['nombre']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción </label>
                                            <textarea type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder=""><?php print($fila_pro['descripcion']);?></textarea>
                                        </div>
                                       <div class="form-group">
                                            <label >Número de parte</label>
                                            <input type="number" onkeyup="this.value = this.value.replace (/[^\d\.]/g, ''); " class="form-control" id="txtNumParte" name="txtNumParte" placeholder="" value="<?php print($fila_pro['numero_parte']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                          <div class="form-group">
                                            <label >Costo de producción</label>
                                            <input type="text" class="form-control" id="txtCosto" name="txtCosto" placeholder="" value="<?php print($fila_pro['costo']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Precio</label>
                                            <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="" value="<?php print($fila_pro['precio']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Medidas</label>
                                            <input type="text" class="form-control" id="txtMedidas" name="txtMedidas" placeholder="" value="<?php print($fila_pro['medidas']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Material</label>
                                            <input type="text" class="form-control" id="txtMaterial" name="txtMaterial" placeholder="" value="<?php print($fila_pro['material']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Dureza</label>
                                            <input type="text" class="form-control" id="txtDureza" name="txtDureza" placeholder="" value="<?php print($fila_pro['dureza']);?>">
                                            <p class="help-block"></p>
                                        </div>
                                         <label>IMAGEN</label>
                                            <div class="form-group input-group">

                                        <span class="input-group-addon"><i class="fa"></i></span>
                                         <input type="file" id="files" class="form-control" name="imagen1" placeholder="Seleccione su imagen" >
                                        </div>
                                            <div class="form-group input-group">

                                            <output id="list">
                                              <img style="width:50%;" src="<?php print($fila_pro['imagen']);?>">

                                            </output>

                                        </div>
                                        <?php } ?>
                                       <input type="submit" name="botonEnviar" id="botonEnviar"  class="btn btn-info" value="Actualizar">
                                       <a href="?" class="btn btn-danger" >Cancelar</a>
                                 </div>
                              </form>
                        </div>
                        <?php

                                        include("funciones/config.php");
                                        include 'funciones/actualizar_producto.php';

                                             $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);

                                                   // Subir todas las imagenes
                                                if(isset($_POST['botonEnviar'])){
                                                  subirImagenes('productos',$conexion,$identificador);
                                                    }
                                                   ?>
                         <script>
                  function archivo(evt) {
                  var files = evt.target.files; // FileList object

                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);

                    reader.readAsDataURL(f);
                  }
              }

              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
                         <div id="resultadoC">

                         </div>

                        <!-- /.panel-body -->
               </div></div></div>
