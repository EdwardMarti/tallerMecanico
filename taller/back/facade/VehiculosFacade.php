<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Vehiculos.php');
require_once realpath('../dao/interfaz/IVehiculosDao.php');
require_once realpath('../dto/Clientes.php');

class VehiculosFacade {

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
   * Crea un objeto Vehiculos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param marca
   * @param placa
   * @param kilometraje
   * @param anio
   * @param id_cliente
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $marca,  $placa,  $kilometraje,  $anio,  $id_cliente,  $created_at,  $updated_at){
      $vehiculos = new Vehiculos();
      $vehiculos->setId($id); 
      $vehiculos->setMarca($marca); 
      $vehiculos->setPlaca($placa); 
      $vehiculos->setKilometraje($kilometraje); 
      $vehiculos->setAnio($anio); 
      $vehiculos->setId_cliente($id_cliente); 
      $vehiculos->setCreated_at($created_at); 
      $vehiculos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculosDao =$FactoryDao->getvehiculosDao(self::getDataBaseDefault());
     $rtn = $vehiculosDao->insert($vehiculos);
     $vehiculosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Vehiculos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $vehiculos = new Vehiculos();
      $vehiculos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculosDao =$FactoryDao->getvehiculosDao(self::getDataBaseDefault());
     $result = $vehiculosDao->select($vehiculos);
     $vehiculosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Vehiculos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param marca
   * @param placa
   * @param kilometraje
   * @param anio
   * @param id_cliente
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $marca, $placa, $kilometraje, $anio, $id_cliente, $created_at, $updated_at){
      $vehiculos = self::select($id);
      $vehiculos->setMarca($marca); 
      $vehiculos->setPlaca($placa); 
      $vehiculos->setKilometraje($kilometraje); 
      $vehiculos->setAnio($anio); 
      $vehiculos->setId_cliente($id_cliente); 
      $vehiculos->setCreated_at($created_at); 
      $vehiculos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculosDao =$FactoryDao->getvehiculosDao(self::getDataBaseDefault());
     $vehiculosDao->update($vehiculos);
     $vehiculosDao->close();
  }

  /**
   * Elimina un objeto Vehiculos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $vehiculos = new Vehiculos();
      $vehiculos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculosDao =$FactoryDao->getvehiculosDao(self::getDataBaseDefault());
     $vehiculosDao->delete($vehiculos);
     $vehiculosDao->close();
  }

  /**
   * Lista todos los objetos Vehiculos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Vehiculos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $vehiculosDao =$FactoryDao->getvehiculosDao(self::getDataBaseDefault());
     $result = $vehiculosDao->listAll();
     $vehiculosDao->close();
     return $result;
  }


}
//That`s all folks!