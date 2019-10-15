<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/Cliente_vehiculosFacade.php');


class Cliente_vehiculosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Vehiculos_id = strip_tags($_POST['id_vehiculo']);
        $vehiculos= new Vehiculos();
        $vehiculos->setId($Vehiculos_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        Cliente_vehiculosFacade::insert($id, $vehiculos, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=Cliente_vehiculosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Cliente_vehiculos) {	
	       $rta.="{
	    \"id\":\"{$Cliente_vehiculos->getid()}\",
	    \"id_vehiculo_id\":\"{$Cliente_vehiculos->getid_vehiculo()->getid()}\",
	    \"created_at\":\"{$Cliente_vehiculos->getcreated_at()}\",
	    \"updated_at\":\"{$Cliente_vehiculos->getupdated_at()}\"
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