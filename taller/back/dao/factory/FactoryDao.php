<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de AdministradorsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AdministradorsDao
     */
     public function getAdministradorsDao($dbName){
        return new AdministradorsDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CitasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CitasDao
     */
     public function getCitasDao($dbName){
        return new CitasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Cliente_vehiculosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cliente_vehiculosDao
     */
     public function getCliente_vehiculosDao($dbName){
        return new Cliente_vehiculosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ClientesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ClientesDao
     */
     public function getClientesDao($dbName){
        return new ClientesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ComponentesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ComponentesDao
     */
     public function getComponentesDao($dbName){
        return new ComponentesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ComprasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ComprasDao
     */
     public function getComprasDao($dbName){
        return new ComprasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FacturasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacturasDao
     */
     public function getFacturasDao($dbName){
        return new FacturasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MecanicosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MecanicosDao
     */
     public function getMecanicosDao($dbName){
        return new MecanicosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MigrationsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MigrationsDao
     */
     public function getMigrationsDao($dbName){
        return new MigrationsDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProductosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProductosDao
     */
     public function getProductosDao($dbName){
        return new ProductosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProveedorsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProveedorsDao
     */
     public function getProveedorsDao($dbName){
        return new ProveedorsDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ServiciosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ServiciosDao
     */
     public function getServiciosDao($dbName){
        return new ServiciosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Vehiculo_serviciosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Vehiculo_serviciosDao
     */
     public function getVehiculo_serviciosDao($dbName){
        return new Vehiculo_serviciosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de VehiculosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de VehiculosDao
     */
     public function getVehiculosDao($dbName){
        return new VehiculosDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!