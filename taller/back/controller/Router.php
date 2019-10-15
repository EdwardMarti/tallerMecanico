<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('AdministradorsController.php');
include_once realpath('CitasController.php');
include_once realpath('Cliente_vehiculosController.php');
include_once realpath('ClientesController.php');
include_once realpath('ComponentesController.php');
include_once realpath('ComprasController.php');
include_once realpath('FacturasController.php');
include_once realpath('MecanicosController.php');
include_once realpath('MigrationsController.php');
include_once realpath('ProductosController.php');
include_once realpath('ProveedorsController.php');
include_once realpath('ServiciosController.php');
include_once realpath('Vehiculo_serviciosController.php');
include_once realpath('VehiculosController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'AdministradorsInsert':
    			$rtn = AdministradorsController::insert();
    			break;
    		case 'AdministradorsList':
    			$rtn = AdministradorsController::listAll();
    			break;
           case 'CitasInsert':
    			$rtn = CitasController::insert();
    			break;
    		case 'CitasList':
    			$rtn = CitasController::listAll();
    			break;
           case 'Cliente_vehiculosInsert':
    			$rtn = Cliente_vehiculosController::insert();
    			break;
    		case 'Cliente_vehiculosList':
    			$rtn = Cliente_vehiculosController::listAll();
    			break;
           case 'ClientesInsert':
    			$rtn = ClientesController::insert();
    			break;
    		case 'ClientesList':
    			$rtn = ClientesController::listAll();
    			break;
           case 'ComponentesInsert':
    			$rtn = ComponentesController::insert();
    			break;
    		case 'ComponentesList':
    			$rtn = ComponentesController::listAll();
    			break;
           case 'ComprasInsert':
    			$rtn = ComprasController::insert();
    			break;
    		case 'ComprasList':
    			$rtn = ComprasController::listAll();
    			break;
           case 'FacturasInsert':
    			$rtn = FacturasController::insert();
    			break;
    		case 'FacturasList':
    			$rtn = FacturasController::listAll();
    			break;
           case 'MecanicosInsert':
    			$rtn = MecanicosController::insert();
    			break;
    		case 'MecanicosList':
    			$rtn = MecanicosController::listAll();
    			break;
           case 'MigrationsInsert':
    			$rtn = MigrationsController::insert();
    			break;
    		case 'MigrationsList':
    			$rtn = MigrationsController::listAll();
    			break;
           case 'ProductosInsert':
    			$rtn = ProductosController::insert();
    			break;
    		case 'ProductosList':
    			$rtn = ProductosController::listAll();
    			break;
           case 'ProveedorsInsert':
    			$rtn = ProveedorsController::insert();
    			break;
    		case 'ProveedorsList':
    			$rtn = ProveedorsController::listAll();
    			break;
           case 'ServiciosInsert':
    			$rtn = ServiciosController::insert();
    			break;
    		case 'ServiciosList':
    			$rtn = ServiciosController::listAll();
    			break;
           case 'Vehiculo_serviciosInsert':
    			$rtn = Vehiculo_serviciosController::insert();
    			break;
    		case 'Vehiculo_serviciosList':
    			$rtn = Vehiculo_serviciosController::listAll();
    			break;
           case 'VehiculosInsert':
    			$rtn = VehiculosController::insert();
    			break;
    		case 'VehiculosList':
    			$rtn = VehiculosController::listAll();
    			break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!