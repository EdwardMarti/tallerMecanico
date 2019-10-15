<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Cliente_vehiculos.php');
require_once realpath('../dao/interfaz/ICliente_vehiculosDao.php');
require_once realpath('../dto/Vehiculos.php');

class Cliente_vehiculosFacade {

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
   * Crea un objeto Cliente_vehiculos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_vehiculo
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $id_vehiculo,  $created_at,  $updated_at){
      $cliente_vehiculos = new Cliente_vehiculos();
      $cliente_vehiculos->setId($id); 
      $cliente_vehiculos->setId_vehiculo($id_vehiculo); 
      $cliente_vehiculos->setCreated_at($created_at); 
      $cliente_vehiculos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cliente_vehiculosDao =$FactoryDao->getcliente_vehiculosDao(self::getDataBaseDefault());
     $rtn = $cliente_vehiculosDao->insert($cliente_vehiculos);
     $cliente_vehiculosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Cliente_vehiculos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $cliente_vehiculos = new Cliente_vehiculos();
      $cliente_vehiculos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cliente_vehiculosDao =$FactoryDao->getcliente_vehiculosDao(self::getDataBaseDefault());
     $result = $cliente_vehiculosDao->select($cliente_vehiculos);
     $cliente_vehiculosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cliente_vehiculos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_vehiculo
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $id_vehiculo, $created_at, $updated_at){
      $cliente_vehiculos = self::select($id);
      $cliente_vehiculos->setId_vehiculo($id_vehiculo); 
      $cliente_vehiculos->setCreated_at($created_at); 
      $cliente_vehiculos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cliente_vehiculosDao =$FactoryDao->getcliente_vehiculosDao(self::getDataBaseDefault());
     $cliente_vehiculosDao->update($cliente_vehiculos);
     $cliente_vehiculosDao->close();
  }

  /**
   * Elimina un objeto Cliente_vehiculos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $cliente_vehiculos = new Cliente_vehiculos();
      $cliente_vehiculos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cliente_vehiculosDao =$FactoryDao->getcliente_vehiculosDao(self::getDataBaseDefault());
     $cliente_vehiculosDao->delete($cliente_vehiculos);
     $cliente_vehiculosDao->close();
  }

  /**
   * Lista todos los objetos Cliente_vehiculos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cliente_vehiculos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cliente_vehiculosDao =$FactoryDao->getcliente_vehiculosDao(self::getDataBaseDefault());
     $result = $cliente_vehiculosDao->listAll();
     $cliente_vehiculosDao->close();
     return $result;
  }


}
//That`s all folks!