<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\
include_once realpath('../facade/AdministradorsFacade.php');


class AdministradorsController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombres = strip_tags($_POST['nombres']);
        $apellidos = strip_tags($_POST['apellidos']);
        $cedula = strip_tags($_POST['cedula']);
        $correo = strip_tags($_POST['correo']);
        $telefono = strip_tags($_POST['telefono']);
        $descripcion = strip_tags($_POST['descripcion']);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        AdministradorsFacade::insert($id, $nombres, $apellidos, $cedula, $correo, $telefono, $descripcion, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=AdministradorsFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Administradors) {	
	       $rta.="{
	    \"id\":\"{$Administradors->getid()}\",
	    \"nombres\":\"{$Administradors->getnombres()}\",
	    \"apellidos\":\"{$Administradors->getapellidos()}\",
	    \"cedula\":\"{$Administradors->getcedula()}\",
	    \"correo\":\"{$Administradors->getcorreo()}\",
	    \"telefono\":\"{$Administradors->gettelefono()}\",
	    \"descripcion\":\"{$Administradors->getdescripcion()}\",
	    \"created_at\":\"{$Administradors->getcreated_at()}\",
	    \"updated_at\":\"{$Administradors->getupdated_at()}\"
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