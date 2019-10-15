<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\
include_once realpath('../facade/VehiculosFacade.php');


class VehiculosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $marca = strip_tags($_POST['marca']);
        $placa = strip_tags($_POST['placa']);
        $kilometraje = strip_tags($_POST['kilometraje']);
        $anio = strip_tags($_POST['anio']);
        $Clientes_id = strip_tags($_POST['id_cliente']);
        $clientes= new Clientes();
        $clientes->setId($Clientes_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        VehiculosFacade::insert($id, $marca, $placa, $kilometraje, $anio, $clientes, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=VehiculosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Vehiculos) {	
	       $rta.="{
	    \"id\":\"{$Vehiculos->getid()}\",
	    \"marca\":\"{$Vehiculos->getmarca()}\",
	    \"placa\":\"{$Vehiculos->getplaca()}\",
	    \"kilometraje\":\"{$Vehiculos->getkilometraje()}\",
	    \"anio\":\"{$Vehiculos->getanio()}\",
	    \"id_cliente_id\":\"{$Vehiculos->getid_cliente()->getid()}\",
	    \"created_at\":\"{$Vehiculos->getcreated_at()}\",
	    \"updated_at\":\"{$Vehiculos->getupdated_at()}\"
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