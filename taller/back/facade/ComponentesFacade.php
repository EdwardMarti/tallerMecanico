<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Componentes.php');
require_once realpath('../dao/interfaz/IComponentesDao.php');
require_once realpath('../dto/Servicios.php');

class ComponentesFacade {

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
   * Crea un objeto Componentes a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param precio
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombre,  $descripcion,  $precio,  $id_servicio,  $created_at,  $updated_at){
      $componentes = new Componentes();
      $componentes->setId($id); 
      $componentes->setNombre($nombre); 
      $componentes->setDescripcion($descripcion); 
      $componentes->setPrecio($precio); 
      $componentes->setId_servicio($id_servicio); 
      $componentes->setCreated_at($created_at); 
      $componentes->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $componentesDao =$FactoryDao->getcomponentesDao(self::getDataBaseDefault());
     $rtn = $componentesDao->insert($componentes);
     $componentesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Componentes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $componentes = new Componentes();
      $componentes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $componentesDao =$FactoryDao->getcomponentesDao(self::getDataBaseDefault());
     $result = $componentesDao->select($componentes);
     $componentesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Componentes  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param precio
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombre, $descripcion, $precio, $id_servicio, $created_at, $updated_at){
      $componentes = self::select($id);
      $componentes->setNombre($nombre); 
      $componentes->setDescripcion($descripcion); 
      $componentes->setPrecio($precio); 
      $componentes->setId_servicio($id_servicio); 
      $componentes->setCreated_at($created_at); 
      $componentes->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $componentesDao =$FactoryDao->getcomponentesDao(self::getDataBaseDefault());
     $componentesDao->update($componentes);
     $componentesDao->close();
  }

  /**
   * Elimina un objeto Componentes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $componentes = new Componentes();
      $componentes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $componentesDao =$FactoryDao->getcomponentesDao(self::getDataBaseDefault());
     $componentesDao->delete($componentes);
     $componentesDao->close();
  }

  /**
   * Lista todos los objetos Componentes de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Componentes en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $componentesDao =$FactoryDao->getcomponentesDao(self::getDataBaseDefault());
     $result = $componentesDao->listAll();
     $componentesDao->close();
     return $result;
  }


}
//That`s all folks!