<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Vehiculo_servicios.php');
require_once realpath('../dao/interfaz/IVehiculo_serviciosDao.php');
require_once realpath('../dto/Vehiculos.php');
require_once realpath('../dto/Servicios.php');

class Vehiculo_serviciosFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Vehiculo_servicios a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_vehiculo
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $id_vehiculo,  $id_servicio,  $created_at,  $updated_at){
      $vehiculo_servicios = new Vehiculo_servicios();
      $vehiculo_servicios->setId($id); 
      $vehiculo_servicios->setId_vehiculo($id_vehiculo); 
      $vehiculo_servicios->setId_servicio($id_servicio); 
      $vehiculo_servicios->setCreated_at($created_at); 
      $vehiculo_servicios->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculo_serviciosDao =$FactoryDao->getvehiculo_serviciosDao(self::getDataBaseDefault());
     $rtn = $vehiculo_serviciosDao->insert($vehiculo_servicios);
     $vehiculo_serviciosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Vehiculo_servicios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $vehiculo_servicios = new Vehiculo_servicios();
      $vehiculo_servicios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculo_serviciosDao =$FactoryDao->getvehiculo_serviciosDao(self::getDataBaseDefault());
     $result = $vehiculo_serviciosDao->select($vehiculo_servicios);
     $vehiculo_serviciosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Vehiculo_servicios  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_vehiculo
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $id_vehiculo, $id_servicio, $created_at, $updated_at){
      $vehiculo_servicios = self::select($id);
      $vehiculo_servicios->setId_vehiculo($id_vehiculo); 
      $vehiculo_servicios->setId_servicio($id_servicio); 
      $vehiculo_servicios->setCreated_at($created_at); 
      $vehiculo_servicios->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculo_serviciosDao =$FactoryDao->getvehiculo_serviciosDao(self::getDataBaseDefault());
     $vehiculo_serviciosDao->update($vehiculo_servicios);
     $vehiculo_serviciosDao->close();
  }

  /**
   * Elimina un objeto Vehiculo_servicios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $vehiculo_servicios = new Vehiculo_servicios();
      $vehiculo_servicios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculo_serviciosDao =$FactoryDao->getvehiculo_serviciosDao(self::getDataBaseDefault());
     $vehiculo_serviciosDao->delete($vehiculo_servicios);
     $vehiculo_serviciosDao->close();
  }

  /**
   * Lista todos los objetos Vehiculo_servicios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Vehiculo_servicios en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculo_serviciosDao =$FactoryDao->getvehiculo_serviciosDao(self::getDataBaseDefault());
     $result = $vehiculo_serviciosDao->listAll();
     $vehiculo_serviciosDao->close();
     return $result;
  }


}
//That`s all folks!