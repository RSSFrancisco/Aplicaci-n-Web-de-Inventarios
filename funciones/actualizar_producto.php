<?php
include 'core.php';
    /**
	*funcion que guardar el usuario  en la base de datos
     * Funcion que comprueba los input file que contienen algo y llama a la funcion encargada de subir las imagenes.
     *
     * @param type $dir Directorio en el que se quiere subir las imagenes (usar '' si no se quiere usar un subdirectorio).
     * @param $conexion Conexion con la base de datos.
     */
    function subirImagenes($dir, $conexion,int $id){
        // Recorremos la lista de campos para subir archivos.
        foreach ($_FILES  as $key => $value) {
            // Se comprueba si el nombre del archivo no esta vacio para subirlo
            if ($_FILES[$key]["name"] != ''){
                subirImagen($key, $dir, $id, $conexion);
            }
            else{
        $nombre=$_POST['txtNombre'];
        $descripcion=$_POST['txtDescripcion'];
        $numero_parte=$_POST['txtNumParte'];
        $costo=$_POST['txtCosto'];
        $precio=$_POST['txtPrecio'];
        $medidas=$_POST['txtMedidas'];
        $material=$_POST['txtMaterial'];
        $dureza=$_POST['txtDureza'];
       
        $consulta = "UPDATE  tb_productos SET nombre='$nombre',descripcion='$descripcion',numero_parte='$numero_parte',costo='$costo',precio='$precio',medidas='$medidas',material='$material',dureza='$dureza' WHERE id_producto='$id'";
        $conexion->query($consulta);
        $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Edito el producto ".$nombre."'";
        bitacora($sql);
        echo'<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Se actualizo correctamente el producto "'.$nombre.'" <a href="#" class="alert-link"></a>.
                            </div>';

            }
        }
    }
    /**
     * Funcion para subir imagenes
     *
     * @param $campoArchivo Nombre del campo en el que se subira el archivo.
     * @param $dir Directorio en el que se guardara la imagen.
     * @param $conexion Conexion con la base de datos.
     */
    function subirImagen($archivo, $dir,int $id, $conexion){
        $nombre=$_POST['txtNombre'];
        $descripcion=$_POST['txtDescripcion'];
        $numero_parte=$_POST['txtNumParte'];
        $costo=$_POST['txtCosto'];
        $precio=$_POST['txtPrecio'];
        $medidas=$_POST['txtMedidas'];
        $material=$_POST['txtMaterial'];
        $dureza=$_POST['txtDureza'];

        // Se comprueba que el archivo a subir sea una imagen.
        if($_FILES[$archivo]["type"] == "image/jpeg"||"image/png"||"image/gif" ){

            // Se comprueba si ha ocurrido algun error al subir el archivo.
            if ($_FILES[$archivo]["error"]) {

                echo'<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Error '.$_FILES["archivo"]["error"].'al intentar subir el archivo '.$_FILES[$archivo]["name"].' <a href="#" class="alert-link"></a>.
                            </div>';
            }else{
                if(!is_dir("imagenes/".$dir)){
                    mkdir("imagenes/".$dir, 0755);
                }
                if (file_exists("imagenes/".$dir."/".$_FILES[$archivo]["name"])) {

                    echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Ya existe una imagen con nombre '.$_FILES[$archivo]["name"].'. Puedes renombrar la imagen o subir otra.<a href="#" class="alert-link"></a>.
                            </div>';

                }else{
                    // Subimos la imagen.
                       // Agregamos la imagen a la base de datos.

                    move_uploaded_file($_FILES[$archivo]["tmp_name"], "imagenes/".$dir."/".$_FILES[$archivo]["name"]);


                   $archivo_subido=$_FILES[$archivo]["name"];
                    echo' <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El producto "'.$nombre.'"  Se actualizo con exito<a href="#" class="alert-link"></a>.
                            </div>';
                    $sql="SELECT imagen FROM tb_productos WHERE id_producto='$id'";
                    $ejecuta=$conexion->query($sql);
                      while ($fila = mysqli_fetch_array($ejecuta,MYSQLI_ASSOC)) {
                          $imagen=$fila['imagen'];
                         }
                      
                         unlink($imagen);
                      $directorio='imagenes/'.$dir.'/'.$archivo_subido;
                      $consulta = "UPDATE tb_productos SET nombre='$nombre',descripcion='$descripcion',numero_parte='$numero_parte',costo='$costo',precio='$precio',medidas='$medidas',material='$material',dureza='$dureza',imagen='$directorio' WHERE id_producto='$id'";
                    // Se ejecuta la consulta.
                    $conexion->multi_query($consulta);
                    $sql="INSERT INTO tb_bitacora SET usuario='".$_SESSION['usuario']."', accion='Edito el producto ".$nombre."'";
                    bitacora($sql);

                }
            }

        }else{

             echo '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                '.$_FILES[$archivo]["name"].': Formato de archivo no permitido.<a href="#" class="alert-link"></a>.
                            </div>';

        }

    }

?>
