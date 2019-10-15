<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\
include_once realpath('../facade/ComprasFacade.php');


class ComprasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Clientes_id = strip_tags($_POST['id_cliente']);
        $clientes= new Clientes();
        $clientes->setId($Clientes_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ComprasFacade::insert($id, $clientes, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ComprasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Compras) {	
	       $rta.="{
	    \"id\":\"{$Compras->getid()}\",
	    \"id_cliente_id\":\"{$Compras->getid_cliente()->getid()}\",
	    \"created_at\":\"{$Compras->getcreated_at()}\",
	    \"updated_at\":\"{$Compras->getupdated_at()}\"
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