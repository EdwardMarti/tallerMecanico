<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\
include_once realpath('../facade/ComponentesFacade.php');


class ComponentesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $descripcion = strip_tags($_POST['descripcion']);
        $precio = strip_tags($_POST['precio']);
        $Servicios_id = strip_tags($_POST['id_servicio']);
        $servicios= new Servicios();
        $servicios->setId($Servicios_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ComponentesFacade::insert($id, $nombre, $descripcion, $precio, $servicios, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ComponentesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Componentes) {	
	       $rta.="{
	    \"id\":\"{$Componentes->getid()}\",
	    \"nombre\":\"{$Componentes->getnombre()}\",
	    \"descripcion\":\"{$Componentes->getdescripcion()}\",
	    \"precio\":\"{$Componentes->getprecio()}\",
	    \"id_servicio_id\":\"{$Componentes->getid_servicio()->getid()}\",
	    \"created_at\":\"{$Componentes->getcreated_at()}\",
	    \"updated_at\":\"{$Componentes->getupdated_at()}\"
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