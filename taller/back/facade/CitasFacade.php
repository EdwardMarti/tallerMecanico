<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Citas.php');
require_once realpath('../dao/interfaz/ICitasDao.php');
require_once realpath('../dto/Clientes.php');

class CitasFacade {

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
   * Crea un objeto Citas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha_creacion
   * @param id_cliente
   * @param descripcion
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $fecha_creacion,  $id_cliente,  $descripcion,  $created_at,  $updated_at){
      $citas = new Citas();
      $citas->setId($id); 
      $citas->setFecha_creacion($fecha_creacion); 
      $citas->setId_cliente($id_cliente); 
      $citas->setDescripcion($descripcion); 
      $citas->setCreated_at($created_at); 
      $citas->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $citasDao =$FactoryDao->getcitasDao(self::getDataBaseDefault());
     $rtn = $citasDao->insert($citas);
     $citasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Citas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $citas = new Citas();
      $citas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $citasDao =$FactoryDao->getcitasDao(self::getDataBaseDefault());
     $result = $citasDao->select($citas);
     $citasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Citas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fecha_creacion
   * @param id_cliente
   * @param descripcion
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $fecha_creacion, $id_cliente, $descripcion, $created_at, $updated_at){
      $citas = self::select($id);
      $citas->setFecha_creacion($fecha_creacion); 
      $citas->setId_cliente($id_cliente); 
      $citas->setDescripcion($descripcion); 
      $citas->setCreated_at($created_at); 
      $citas->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $citasDao =$FactoryDao->getcitasDao(self::getDataBaseDefault());
     $citasDao->update($citas);
     $citasDao->close();
  }

  /**
   * Elimina un objeto Citas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $citas = new Citas();
      $citas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $citasDao =$FactoryDao->getcitasDao(self::getDataBaseDefault());
     $citasDao->delete($citas);
     $citasDao->close();
  }

  /**
   * Lista todos los objetos Citas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Citas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $citasDao =$FactoryDao->getcitasDao(self::getDataBaseDefault());
     $result = $citasDao->listAll();
     $citasDao->close();
     return $result;
  }


}
//That`s all folks!