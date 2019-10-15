<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\
include_once realpath('../facade/Vehiculo_serviciosFacade.php');


class Vehiculo_serviciosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Vehiculos_id = strip_tags($_POST['id_vehiculo']);
        $vehiculos= new Vehiculos();
        $vehiculos->setId($Vehiculos_id);
        $Servicios_id = strip_tags($_POST['id_servicio']);
        $servicios= new Servicios();
        $servicios->setId($Servicios_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        Vehiculo_serviciosFacade::insert($id, $vehiculos, $servicios, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=Vehiculo_serviciosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Vehiculo_servicios) {	
	       $rta.="{
	    \"id\":\"{$Vehiculo_servicios->getid()}\",
	    \"id_vehiculo_id\":\"{$Vehiculo_servicios->getid_vehiculo()->getid()}\",
	    \"id_servicio_id\":\"{$Vehiculo_servicios->getid_servicio()->getid()}\",
	    \"created_at\":\"{$Vehiculo_servicios->getcreated_at()}\",
	    \"updated_at\":\"{$Vehiculo_servicios->getupdated_at()}\"
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