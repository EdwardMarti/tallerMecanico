<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\
include_once realpath('../facade/MecanicosFacade.php');


class MecanicosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombres = strip_tags($_POST['nombres']);
        $apellidos = strip_tags($_POST['apellidos']);
        $cedula = strip_tags($_POST['cedula']);
        $edad = strip_tags($_POST['edad']);
        $correo = strip_tags($_POST['correo']);
        $telefono = strip_tags($_POST['telefono']);
        $fecha_nacimiento = strip_tags($_POST['fecha_nacimiento']);
        $salario = strip_tags($_POST['salario']);
        $Servicios_id = strip_tags($_POST['id_servicio']);
        $servicios= new Servicios();
        $servicios->setId($Servicios_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        MecanicosFacade::insert($id, $nombres, $apellidos, $cedula, $edad, $correo, $telefono, $fecha_nacimiento, $salario, $servicios, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=MecanicosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Mecanicos) {	
	       $rta.="{
	    \"id\":\"{$Mecanicos->getid()}\",
	    \"nombres\":\"{$Mecanicos->getnombres()}\",
	    \"apellidos\":\"{$Mecanicos->getapellidos()}\",
	    \"cedula\":\"{$Mecanicos->getcedula()}\",
	    \"edad\":\"{$Mecanicos->getedad()}\",
	    \"correo\":\"{$Mecanicos->getcorreo()}\",
	    \"telefono\":\"{$Mecanicos->gettelefono()}\",
	    \"fecha_nacimiento\":\"{$Mecanicos->getfecha_nacimiento()}\",
	    \"salario\":\"{$Mecanicos->getsalario()}\",
	    \"id_servicio_id\":\"{$Mecanicos->getid_servicio()->getid()}\",
	    \"created_at\":\"{$Mecanicos->getcreated_at()}\",
	    \"updated_at\":\"{$Mecanicos->getupdated_at()}\"
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