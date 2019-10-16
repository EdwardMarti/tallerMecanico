<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ClientesFacade.php');



//$id= $_GET['empresa'];
$id="1";
//$id= $_POST['empresa'];
  
        $list=ClientesFacade::listAll_ClientesDetalles($id);
        $rta="";
        foreach ($list as $obj => $Clientes) {	
	       $rta.="{
	    \"id\":\"{$Clientes->getid()}\",
	    \"nombres\":\"{$Clientes->getnombres()}\",
	    \"apellidos\":\"{$Clientes->getapellidos()}\",
	    \"cedula\":\"{$Clientes->getcedula()}\",
	    \"correo\":\"{$Clientes->getcorreo()}\",
	    \"telefono\":\"{$Clientes->gettelefono()}\",
                 \"fecha_nacimiento\":\"{$Clientes->getfecha_nacimiento()}\"
	 	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";
 