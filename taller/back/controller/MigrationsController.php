<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/MigrationsFacade.php');


class MigrationsController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $migration = strip_tags($_POST['migration']);
        $batch = strip_tags($_POST['batch']);
        MigrationsFacade::insert($id, $migration, $batch);
return true;
    }

    public static function listAll(){
        $list=MigrationsFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Migrations) {	
	       $rta.="{
	    \"id\":\"{$Migrations->getid()}\",
	    \"migration\":\"{$Migrations->getmigration()}\",
	    \"batch\":\"{$Migrations->getbatch()}\"
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