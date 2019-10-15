<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/ProveedorsFacade.php');


class ProveedorsController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $nit = strip_tags($_POST['nit']);
        $representante_legal = strip_tags($_POST['representante_legal']);
        $ciudad = strip_tags($_POST['ciudad']);
        $telefono = strip_tags($_POST['telefono']);
        $correo = strip_tags($_POST['correo']);
        $sitio_web = strip_tags($_POST['sitio_web']);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ProveedorsFacade::insert($id, $nombre, $nit, $representante_legal, $ciudad, $telefono, $correo, $sitio_web, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ProveedorsFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Proveedors) {	
	       $rta.="{
	    \"id\":\"{$Proveedors->getid()}\",
	    \"nombre\":\"{$Proveedors->getnombre()}\",
	    \"nit\":\"{$Proveedors->getnit()}\",
	    \"representante_legal\":\"{$Proveedors->getrepresentante_legal()}\",
	    \"ciudad\":\"{$Proveedors->getciudad()}\",
	    \"telefono\":\"{$Proveedors->gettelefono()}\",
	    \"correo\":\"{$Proveedors->getcorreo()}\",
	    \"sitio_web\":\"{$Proveedors->getsitio_web()}\",
	    \"created_at\":\"{$Proveedors->getcreated_at()}\",
	    \"updated_at\":\"{$Proveedors->getupdated_at()}\"
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