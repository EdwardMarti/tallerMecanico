<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\
include_once realpath('../facade/FacturasFacade.php');


class FacturasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Clientes_id = strip_tags($_POST['id_cliente']);
        $clientes= new Clientes();
        $clientes->setId($Clientes_id);
        $Servicios_id = strip_tags($_POST['id_servicio']);
        $servicios= new Servicios();
        $servicios->setId($Servicios_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        FacturasFacade::insert($id, $clientes, $servicios, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=FacturasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Facturas) {	
	       $rta.="{
	    \"id\":\"{$Facturas->getid()}\",
	    \"id_cliente_id\":\"{$Facturas->getid_cliente()->getid()}\",
	    \"id_servicio_id\":\"{$Facturas->getid_servicio()->getid()}\",
	    \"created_at\":\"{$Facturas->getcreated_at()}\",
	    \"updated_at\":\"{$Facturas->getupdated_at()}\"
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