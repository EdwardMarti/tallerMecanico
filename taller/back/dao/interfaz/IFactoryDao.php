<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\

include_once realpath('../dao/entities/AdministradorsDao.php');
include_once realpath('../dao/entities/CitasDao.php');
include_once realpath('../dao/entities/Cliente_vehiculosDao.php');
include_once realpath('../dao/entities/ClientesDao.php');
include_once realpath('../dao/entities/ComponentesDao.php');
include_once realpath('../dao/entities/ComprasDao.php');
include_once realpath('../dao/entities/FacturasDao.php');
include_once realpath('../dao/entities/MecanicosDao.php');
include_once realpath('../dao/entities/MigrationsDao.php');
include_once realpath('../dao/entities/ProductosDao.php');
include_once realpath('../dao/entities/ProveedorsDao.php');
include_once realpath('../dao/entities/ServiciosDao.php');
include_once realpath('../dao/entities/Vehiculo_serviciosDao.php');
include_once realpath('../dao/entities/VehiculosDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de AdministradorsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AdministradorsDao
     */
     public function getAdministradorsDao($dbName);
     /**
     * Devuelve una instancia de CitasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CitasDao
     */
     public function getCitasDao($dbName);
     /**
     * Devuelve una instancia de Cliente_vehiculosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cliente_vehiculosDao
     */
     public function getCliente_vehiculosDao($dbName);
     /**
     * Devuelve una instancia de ClientesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ClientesDao
     */
     public function getClientesDao($dbName);
     /**
     * Devuelve una instancia de ComponentesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ComponentesDao
     */
     public function getComponentesDao($dbName);
     /**
     * Devuelve una instancia de ComprasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ComprasDao
     */
     public function getComprasDao($dbName);
     /**
     * Devuelve una instancia de FacturasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacturasDao
     */
     public function getFacturasDao($dbName);
     /**
     * Devuelve una instancia de MecanicosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MecanicosDao
     */
     public function getMecanicosDao($dbName);
     /**
     * Devuelve una instancia de MigrationsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MigrationsDao
     */
     public function getMigrationsDao($dbName);
     /**
     * Devuelve una instancia de ProductosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProductosDao
     */
     public function getProductosDao($dbName);
     /**
     * Devuelve una instancia de ProveedorsDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProveedorsDao
     */
     public function getProveedorsDao($dbName);
     /**
     * Devuelve una instancia de ServiciosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ServiciosDao
     */
     public function getServiciosDao($dbName);
     /**
     * Devuelve una instancia de Vehiculo_serviciosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Vehiculo_serviciosDao
     */
     public function getVehiculo_serviciosDao($dbName);
     /**
     * Devuelve una instancia de VehiculosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de VehiculosDao
     */
     public function getVehiculosDao($dbName);

}
//That`s all folks!