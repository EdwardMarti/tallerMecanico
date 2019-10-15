<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Proveedors.php');
require_once realpath('../dao/interfaz/IProveedorsDao.php');

class ProveedorsFacade {

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
   * Crea un objeto Proveedors a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param nit
   * @param representante_legal
   * @param ciudad
   * @param telefono
   * @param correo
   * @param sitio_web
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombre,  $nit,  $representante_legal,  $ciudad,  $telefono,  $correo,  $sitio_web,  $created_at,  $updated_at){
      $proveedors = new Proveedors();
      $proveedors->setId($id); 
      $proveedors->setNombre($nombre); 
      $proveedors->setNit($nit); 
      $proveedors->setRepresentante_legal($representante_legal); 
      $proveedors->setCiudad($ciudad); 
      $proveedors->setTelefono($telefono); 
      $proveedors->setCorreo($correo); 
      $proveedors->setSitio_web($sitio_web); 
      $proveedors->setCreated_at($created_at); 
      $proveedors->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proveedorsDao =$FactoryDao->getproveedorsDao(self::getDataBaseDefault());
     $rtn = $proveedorsDao->insert($proveedors);
     $proveedorsDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Proveedors de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $proveedors = new Proveedors();
      $proveedors->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proveedorsDao =$FactoryDao->getproveedorsDao(self::getDataBaseDefault());
     $result = $proveedorsDao->select($proveedors);
     $proveedorsDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Proveedors  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param nit
   * @param representante_legal
   * @param ciudad
   * @param telefono
   * @param correo
   * @param sitio_web
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombre, $nit, $representante_legal, $ciudad, $telefono, $correo, $sitio_web, $created_at, $updated_at){
      $proveedors = self::select($id);
      $proveedors->setNombre($nombre); 
      $proveedors->setNit($nit); 
      $proveedors->setRepresentante_legal($representante_legal); 
      $proveedors->setCiudad($ciudad); 
      $proveedors->setTelefono($telefono); 
      $proveedors->setCorreo($correo); 
      $proveedors->setSitio_web($sitio_web); 
      $proveedors->setCreated_at($created_at); 
      $proveedors->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proveedorsDao =$FactoryDao->getproveedorsDao(self::getDataBaseDefault());
     $proveedorsDao->update($proveedors);
     $proveedorsDao->close();
  }

  /**
   * Elimina un objeto Proveedors de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $proveedors = new Proveedors();
      $proveedors->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proveedorsDao =$FactoryDao->getproveedorsDao(self::getDataBaseDefault());
     $proveedorsDao->delete($proveedors);
     $proveedorsDao->close();
  }

  /**
   * Lista todos los objetos Proveedors de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Proveedors en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proveedorsDao =$FactoryDao->getproveedorsDao(self::getDataBaseDefault());
     $result = $proveedorsDao->listAll();
     $proveedorsDao->close();
     return $result;
  }


}
//That`s all folks!