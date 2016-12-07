
        <div class="row">
            <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">

                    AGREGAR NUEVO PRODUCTO
                        </div>
                        <div class="panel-body">
                  <form action="#"  id="contactForm"  method="POST" enctype="multipart/form-data" role="form" >
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Nombre</label>
                                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción </label>
                                            <textarea type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder=""></textarea>
                                        </div>


                                       <div class="form-group">
                                            <label >Número de parte</label>
                                            <input type="number" onkeyup="this.value = this.value.replace (/[^\d\.]/g, ''); " class="form-control" id="txtNumParte" name="txtNumParte" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                          <div class="form-group">
                                            <label >Costo de producción</label>
                                            <input type="text" class="form-control" id="txtCosto" name="txtCosto" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Precio</label>
                                            <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>

                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Medidas</label>
                                            <input type="text" class="form-control" id="txtMedidas" name="txtMedidas" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Material</label>
                                            <input type="text" class="form-control" id="txtMaterial" name="txtMaterial" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Dureza</label>
                                            <input type="text" class="form-control" id="txtDureza" name="txtDureza" placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                         <label>SUBIR IMAGEN</label>
                                            <div class="form-group input-group">

                                        <span class="input-group-addon"><i class="fa"></i></span>
                                         <input type="file" id="files" class="form-control" name="imagen1" placeholder="Seleccione su imagen" >
                                        </div>
                                            <div class="form-group input-group">

                                            <output id="list"></output>

                                        </div>
                                       <input type="submit" name="botonEnviar" id="botonEnviar"  class="btn btn-info" value="Guardar">
                                       <a href="?" class="btn btn-danger" >Cancelar</a>
                                 </div>
                              </form>
                        </div>
                        <?php

                                        include("funciones/config.php");
                                        include 'funciones/guardar_producto.php';

                                             $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);

                                                   // Subir todas las imagenes
                                                if(isset($_POST['botonEnviar'])){
                                                  subirImagenes('productos',$conexion);
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
