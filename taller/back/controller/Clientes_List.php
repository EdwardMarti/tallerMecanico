<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ClientesFacade.php');




  
        $list=ClientesFacade::listAll_Clientes();
        $rta="";
        foreach ($list as $obj => $Clientes) {	
	       $rta.="{
	    \"id\":\"{$Clientes->getid()}\",
	    \"nombres\":\"{$Clientes->getnombres()}  {$Clientes->getapellidos()}\",
	   
	    \"cedula\":\"{$Clientes->getcedula()}\",
	  
	    \"correo\":\"{$Clientes->getcorreo()}\",
	    \"telefono\":\"{$Clientes->gettelefono()}\"
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
 