<?php
/* * **********************************************************************************
 * Capa:Datos 
 * @csUsuarios.php
 * @Fecha de creación:09/09/2015
 * @Fecha de modificación:~
 * @Ing.RnJhbmNpc2NvIFJleWVzIFPDoW5jaGV6 
 * *********************************************************************************** */
include_once("../negocios/nUsuarios.php");

class csUsuarios {
    private $ID;
    private $estatus;
    
    private $centro_de_salud;
    private $area_o_departamento;
    private $nombre;
    private $alias;
    private $archivo;
    private $directorio;
    private $contrasenia;
    private $tipo;

    public function getID(){
        return $this->ID;
    }
    public function setID($cadena){
        $this->ID=$cadena;
    }
    public function getEstatus(){
    	return $this->estatus;
    }
    public function setEstatus($cadena){
    	$this->estatus=$cadena;
    }

    
    public function actualizarEstatusUsuario($estatus){
       $nUsuarios = new nUsuarios();
       $nUsuarios->actualizarEstatusUsuario($estatus);
    }
    public function validaEstado(){
       
        $ID=$_SESSION['id_usuario'];
        $sql = mysqli_query( $conectar,"SELECT estado FROM tb_usuarios  where id_usuario=".$ID."");
        $mifila = mysqli_fetch_array($sql);
        if($mifila['estatus']=='0'):
            exit();
        endif;
    }
    public function listarUsuarios(){
    
    } 
    public function listarDetalleUsuario(){
        $nUsuarios = new nUsuarios();
        return $nUsuarios->listarDetalleUsuarios();
    }

    
}
