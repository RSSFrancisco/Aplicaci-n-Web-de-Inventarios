<?php
function contar_filas($data) {
    $num_registros = mysqli_num_rows($data);
    return $num_registros;
    mysqli_free_result($num_registros);
}
function liberar_variables($arreglo) {
    foreach ($arreglo as $valor):
        unset($valor);
    endforeach;
}
function tiempo_consulta() {
    static $querytime_begin;
    list($usec, $sec) = explode(' ', microtime());

    if (!isset($querytime_begin)) {
        $querytime_begin = ((float) $usec + (float) $sec);
        return substr($querytime_begin, 0, 6);
    } else {
        $querytime = (((float) $usec + (float) $sec)) - $querytime_begin;
        return substr($querytime, 0, 6);
    }
}
function sumar_filas($key) {
    include('config.php');
    $sql = "SELECT SUM(subtotal) as subtotal FROM tb_ventas_productos WHERE id_venta='$key'";
    $ejecuta = $conectar->query($sql);
    return $ejecuta;
    liberar_variables($arreglo = array($sql, $ejecuta));
}

function returnTable($transaccion) {
    include('config.php');
    $sql = $conectar->query($transaccion);
    return $sql;
    liberar_variables($arreglo=[$sql,$transaccion,$conectar]);
}
function ejecutar_sentencia($transaccion){
    include('config.php');
        $sql=$conectar->prepare($transaccion); 
        $sql->execute();
        $resultado=$sql->get_result();
    return $resultado;
    $sql->close();
        liberar_variables($arreglo=[$sql,$resultado,$conectar,$transaccion]);
}
function mensaje($contenido, $estilo, $animacion) {
    echo'<div class="alert alert-' . $estilo . ' alert-dismissable ' . $animacion . '"> 
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              ' . $contenido . '                                         
       </div>';
}
function encriptar($datos) {
    $parser_64 = base64_encode($datos);
    $parser_utf8 = utf8_encode($parser_64);
    return $parser_utf8;
}
function des_encriptar($datos) {
    $parser_utf8 = utf8_decode($datos);
    $parser_64 = base64_decode($parser_utf8);

    return $parser_64;
}
function bitacora($sql){
    returnTable($sql);
    liberar_variables($arreglo=[$sql]);
}