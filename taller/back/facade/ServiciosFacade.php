<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Servicios.php');
require_once realpath('../dao/interfaz/IServiciosDao.php');

class ServiciosFacade {

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
   * Crea un objeto Servicios a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param codigo_interno
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombre,  $codigo_interno,  $created_at,  $updated_at){
      $servicios = new Servicios();
      $servicios->setId($id); 
      $servicios->setNombre($nombre); 
      $servicios->setCodigo_interno($codigo_interno); 
      $servicios->setCreated_at($created_at); 
      $servicios->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $serviciosDao =$FactoryDao->getserviciosDao(self::getDataBaseDefault());
     $rtn = $serviciosDao->insert($servicios);
     $serviciosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Servicios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $servicios = new Servicios();
      $servicios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $serviciosDao =$FactoryDao->getserviciosDao(self::getDataBaseDefault());
     $result = $serviciosDao->select($servicios);
     $serviciosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Servicios  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param codigo_interno
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombre, $codigo_interno, $created_at, $updated_at){
      $servicios = self::select($id);
      $servicios->setNombre($nombre); 
      $servicios->setCodigo_interno($codigo_interno); 
      $servicios->setCreated_at($created_at); 
      $servicios->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $serviciosDao =$FactoryDao->getserviciosDao(self::getDataBaseDefault());
     $serviciosDao->update($servicios);
     $serviciosDao->close();
  }

  /**
   * Elimina un objeto Servicios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $servicios = new Servicios();
      $servicios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $serviciosDao =$FactoryDao->getserviciosDao(self::getDataBaseDefault());
     $serviciosDao->delete($servicios);
     $serviciosDao->close();
  }

  /**
   * Lista todos los objetos Servicios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Servicios en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $serviciosDao =$FactoryDao->getserviciosDao(self::getDataBaseDefault());
     $result = $serviciosDao->listAll();
     $serviciosDao->close();
     return $result;
  }


}
//That`s all folks!