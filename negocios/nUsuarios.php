<?php
/* * **********************************************************************************
 * Capa: Negocios 
 * @nUsuarios.php
 * @Fecha de creación:08/06/2016
 * @Fecha de modificación:~
 * @Ing.RnJhbmNpc2NvIFJleWVzIFPDoW5jaGV6     
 * *********************************************************************************** */
class nUsuarios {
		public function actualizarEstatusUsuario($estatus){
		include_once("../funciones/config.php");
         $ID=$estatus->getID();
         $valorEstatus=$estatus->getEstatus();
          $sql ="UPDATE tb_usuarios SET estado='".$valorEstatus."' where id_usuario=".$ID."";
          $conectar->query($sql);

		}
		public function listarDetalleUsuarios(){
			
             $ID=$estatus->getID();
			  $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
              /* se realiza la consulta a la base de datos */
              $consulta = "SELECT *  FROM tb_usuarios WHERE id_usuario=".$ID;
              $resultado = $conectar->query($consulta);
              return $resultado;
           
		}
		
}
