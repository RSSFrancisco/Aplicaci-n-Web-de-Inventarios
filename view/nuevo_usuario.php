
        <div class="row">
            <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">

                    AGREGAR NUEVO USUARIO
                        </div>
                        <div class="panel-body">

                                        <div class="form-group">
                                            <label >Nombre Completo</label>
                                            <input type="text" class="form-control" id="txtNombre"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Nick de usuario</label>
                                            <input type="text" class="form-control" id="txtUsuario"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Tipo de usuario</label>
                                            <select  class="form-control" id="txtTipo" >
                                                <option value="Administrador" >Administrador</option>
                                                <option value="Capturista" >Capturista</option>
                                                <option value="Invitado" >Invitado</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Correo</label>
                                            <input type="text" class="form-control" id="txtCorreo"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label >Telefono</label>
                                            <input type="text" class="form-control" id="txtTelefono"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Contraseña</label>
                                            <input type="password" class="form-control" id="txtContrasenia"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label >Repetir</label>
                                            <input type="password" class="form-control" id="txtRepetir"  placeholder="" required>
                                            <p class="help-block"></p>
                                        </div>
                                       <a  onclick="guardar_usuario()" class="btn btn-info" >Guardar</a>
                                       <a href="?" class="btn btn-danger" >Cancelar</a>


                        </div>
                         <div id="resultadoC">

                         </div>

                        <!-- /.panel-body -->
               </div></div></div>
