<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\
include_once realpath('../facade/ClientesFacade.php');


class ClientesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombres = strip_tags($_POST['nombres']);
        $apellidos = strip_tags($_POST['apellidos']);
        $cedula = strip_tags($_POST['cedula']);
        $edad = strip_tags($_POST['edad']);
        $correo = strip_tags($_POST['correo']);
        $telefono = strip_tags($_POST['telefono']);
        $fecha_nacimiento = strip_tags($_POST['fecha_nacimiento']);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ClientesFacade::insert($id, $nombres, $apellidos, $cedula, $edad, $correo, $telefono, $fecha_nacimiento, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ClientesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Clientes) {	
	       $rta.="{
	    \"id\":\"{$Clientes->getid()}\",
	    \"nombres\":\"{$Clientes->getnombres()}\",
	    \"apellidos\":\"{$Clientes->getapellidos()}\",
	    \"cedula\":\"{$Clientes->getcedula()}\",
	    \"edad\":\"{$Clientes->getedad()}\",
	    \"correo\":\"{$Clientes->getcorreo()}\",
	    \"telefono\":\"{$Clientes->gettelefono()}\",
	    \"fecha_nacimiento\":\"{$Clientes->getfecha_nacimiento()}\",
	    \"created_at\":\"{$Clientes->getcreated_at()}\",
	    \"updated_at\":\"{$Clientes->getupdated_at()}\"
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