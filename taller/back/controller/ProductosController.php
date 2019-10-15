<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si crees que las mujeres son difíciles, no conoces Anarchy  \\
include_once realpath('../facade/ProductosFacade.php');


class ProductosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $unidad_medida = strip_tags($_POST['unidad_medida']);
        $codigo_interno = strip_tags($_POST['codigo_interno']);
        $cantidad_en_stock = strip_tags($_POST['cantidad_en_stock']);
        $marca = strip_tags($_POST['marca']);
        $precio_compra = strip_tags($_POST['precio_compra']);
        $precio_venta = strip_tags($_POST['precio_venta']);
        $dias_garantia = strip_tags($_POST['dias_garantia']);
        $Servicios_id = strip_tags($_POST['id_servicio']);
        $servicios= new Servicios();
        $servicios->setId($Servicios_id);
        $Proveedors_id = strip_tags($_POST['id_proveedor']);
        $proveedors= new Proveedors();
        $proveedors->setId($Proveedors_id);
        $created_at = strip_tags($_POST['created_at']);
        $updated_at = strip_tags($_POST['updated_at']);
        ProductosFacade::insert($id, $nombre, $unidad_medida, $codigo_interno, $cantidad_en_stock, $marca, $precio_compra, $precio_venta, $dias_garantia, $servicios, $proveedors, $created_at, $updated_at);
return true;
    }

    public static function listAll(){
        $list=ProductosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Productos) {	
	       $rta.="{
	    \"id\":\"{$Productos->getid()}\",
	    \"nombre\":\"{$Productos->getnombre()}\",
	    \"unidad_medida\":\"{$Productos->getunidad_medida()}\",
	    \"codigo_interno\":\"{$Productos->getcodigo_interno()}\",
	    \"cantidad_en_stock\":\"{$Productos->getcantidad_en_stock()}\",
	    \"marca\":\"{$Productos->getmarca()}\",
	    \"precio_compra\":\"{$Productos->getprecio_compra()}\",
	    \"precio_venta\":\"{$Productos->getprecio_venta()}\",
	    \"dias_garantia\":\"{$Productos->getdias_garantia()}\",
	    \"id_servicio_id\":\"{$Productos->getid_servicio()->getid()}\",
	    \"id_proveedor_id\":\"{$Productos->getid_proveedor()->getid()}\",
	    \"created_at\":\"{$Productos->getcreated_at()}\",
	    \"updated_at\":\"{$Productos->getupdated_at()}\"
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