<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('../facade/CitasFacade.php');


class CitasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $fecha_creacion = strip_tags($_POST['fecha_creacion']);
        $Clientes_id = strip_tags($_POST['id_cliente']);
        $clientes= new Clientes();
        $clientes->setId($Clientes_id);
        $descripcion = strip_tags($_POST['descripcion']);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        CitasFacade::insert($id, $fecha_creacion, $clientes, $descripcion, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=CitasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Citas) {	
	       $rta.="{
	    \"id\":\"{$Citas->getid()}\",
	    \"fecha_creacion\":\"{$Citas->getfecha_creacion()}\",
	    \"id_cliente_id\":\"{$Citas->getid_cliente()->getid()}\",
	    \"descripcion\":\"{$Citas->getdescripcion()}\",
	    \"created_at\":\"{$Citas->getcreated_at()}\",
	    \"updated_at\":\"{$Citas->getupdated_at()}\"
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