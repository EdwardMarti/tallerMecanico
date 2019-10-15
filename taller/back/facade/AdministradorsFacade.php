<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Administradors.php');
require_once realpath('../dao/interfaz/IAdministradorsDao.php');

class AdministradorsFacade {

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
   * Crea un objeto Administradors a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param correo
   * @param telefono
   * @param descripcion
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombres,  $apellidos,  $cedula,  $correo,  $telefono,  $descripcion,  $created_at,  $updated_at){
      $administradors = new Administradors();
      $administradors->setId($id); 
      $administradors->setNombres($nombres); 
      $administradors->setApellidos($apellidos); 
      $administradors->setCedula($cedula); 
      $administradors->setCorreo($correo); 
      $administradors->setTelefono($telefono); 
      $administradors->setDescripcion($descripcion); 
      $administradors->setCreated_at($created_at); 
      $administradors->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administradorsDao =$FactoryDao->getadministradorsDao(self::getDataBaseDefault());
     $rtn = $administradorsDao->insert($administradors);
     $administradorsDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Administradors de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $administradors = new Administradors();
      $administradors->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administradorsDao =$FactoryDao->getadministradorsDao(self::getDataBaseDefault());
     $result = $administradorsDao->select($administradors);
     $administradorsDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Administradors  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param correo
   * @param telefono
   * @param descripcion
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombres, $apellidos, $cedula, $correo, $telefono, $descripcion, $created_at, $updated_at){
      $administradors = self::select($id);
      $administradors->setNombres($nombres); 
      $administradors->setApellidos($apellidos); 
      $administradors->setCedula($cedula); 
      $administradors->setCorreo($correo); 
      $administradors->setTelefono($telefono); 
      $administradors->setDescripcion($descripcion); 
      $administradors->setCreated_at($created_at); 
      $administradors->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administradorsDao =$FactoryDao->getadministradorsDao(self::getDataBaseDefault());
     $administradorsDao->update($administradors);
     $administradorsDao->close();
  }

  /**
   * Elimina un objeto Administradors de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $administradors = new Administradors();
      $administradors->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administradorsDao =$FactoryDao->getadministradorsDao(self::getDataBaseDefault());
     $administradorsDao->delete($administradors);
     $administradorsDao->close();
  }

  /**
   * Lista todos los objetos Administradors de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Administradors en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administradorsDao =$FactoryDao->getadministradorsDao(self::getDataBaseDefault());
     $result = $administradorsDao->listAll();
     $administradorsDao->close();
     return $result;
  }


}
//That`s all folks!