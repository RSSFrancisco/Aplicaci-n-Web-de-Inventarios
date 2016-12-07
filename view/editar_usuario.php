
        <div class="row">
            <div class="col-lg-12">
                     <?php
                                                         include_once('funciones/config.php');
                                                         include('funciones/core.php');
                                                        $consulta="SELECT * FROM tb_usuarios WHERE id_usuario='$identificador'";
                                                         $sql = mysqli_query($conectar,$consulta);

                                                        while ($fila = mysqli_fetch_array($sql)) {
                                                            
                                                           $contrasenia= des_encriptar($fila['contrasenia']);
                                                            
                                                            ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">

                    Editar usuario
                        </div>
                        <div class="panel-body">
                  
                                        <div class="form-group">
                                            <label >Nombre Completo</label>
                                            <input type="text"  class="form-control" id="txtNombre"  placeholder="" <?php echo'value="'.$fila['nombre'].'"'; ?>>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Nick de usuario</label>
                                            <input type="text" class="form-control" id="txtUsuario"  placeholder="" <?php echo'value="'.$fila['usuario'].'"'; ?>>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Tipo de usuario</label>
                                            <select  class="form-control" id="txtTipo" >
                                                 <option <?php echo'value="'.$fila['tipo'].'"'; ?> ><?php echo $fila['tipo']; ?></option>
                                                <option value="Administrador" >Administrador</option>
                                                <option value="Capturista" >Capturista</option>
                                                <option value="Invitado" >Invitado</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Correo</label>
                                            <input type="text" class="form-control" id="txtCorreo"  placeholder="" <?php echo'value="'.$fila['correo'].'"'; ?>>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Telefono</label>
                                            <input type="text" class="form-control" id="txtTelefono"  placeholder="" <?php echo'value="'.$fila['telefono'].'"'; ?>>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Contraseña</label>
                                            <input type="text" class="form-control" id="txtContrasenia"  placeholder="" <?php echo'value="'.$contrasenia.'"'; ?>>
                                            <p class="help-block"></p>
                                        </div>
                                        
                                       <a  onclick="actualizar_usuario(<?php print($fila['id_usuario']); ?>)" class="btn btn-info" >Actualizar</a>
                                       <a href="?" class="btn btn-danger" >Cancelar</a>
                               
                              
                        </div>
                         <div id="resultadoC">

                         </div>
        
                        <!-- /.panel-body -->
               </div>
                    <?php } ?>

               </div></div>