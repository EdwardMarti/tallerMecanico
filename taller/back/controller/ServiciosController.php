<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\
include_once realpath('../facade/ServiciosFacade.php');


class ServiciosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $codigo_interno = strip_tags($_POST['codigo_interno']);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ServiciosFacade::insert($id, $nombre, $codigo_interno, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ServiciosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Servicios) {	
	       $rta.="{
	    \"id\":\"{$Servicios->getid()}\",
	    \"nombre\":\"{$Servicios->getnombre()}\",
	    \"codigo_interno\":\"{$Servicios->getcodigo_interno()}\",
	    \"created_at\":\"{$Servicios->getcreated_at()}\",
	    \"updated_at\":\"{$Servicios->getupdated_at()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!