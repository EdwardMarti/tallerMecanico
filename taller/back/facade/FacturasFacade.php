<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Facturas.php');
require_once realpath('../dao/interfaz/IFacturasDao.php');
require_once realpath('../dto/Clientes.php');
require_once realpath('../dto/Servicios.php');

class FacturasFacade {

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
   * Crea un objeto Facturas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_cliente
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $id_cliente,  $id_servicio,  $created_at,  $updated_at){
      $facturas = new Facturas();
      $facturas->setId($id); 
      $facturas->setId_cliente($id_cliente); 
      $facturas->setId_servicio($id_servicio); 
      $facturas->setCreated_at($created_at); 
      $facturas->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturasDao =$FactoryDao->getfacturasDao(self::getDataBaseDefault());
     $rtn = $facturasDao->insert($facturas);
     $facturasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Facturas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $facturas = new Facturas();
      $facturas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturasDao =$FactoryDao->getfacturasDao(self::getDataBaseDefault());
     $result = $facturasDao->select($facturas);
     $facturasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Facturas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_cliente
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $id_cliente, $id_servicio, $created_at, $updated_at){
      $facturas = self::select($id);
      $facturas->setId_cliente($id_cliente); 
      $facturas->setId_servicio($id_servicio); 
      $facturas->setCreated_at($created_at); 
      $facturas->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturasDao =$FactoryDao->getfacturasDao(self::getDataBaseDefault());
     $facturasDao->update($facturas);
     $facturasDao->close();
  }

  /**
   * Elimina un objeto Facturas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $facturas = new Facturas();
      $facturas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturasDao =$FactoryDao->getfacturasDao(self::getDataBaseDefault());
     $facturasDao->delete($facturas);
     $facturasDao->close();
  }

  /**
   * Lista todos los objetos Facturas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Facturas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturasDao =$FactoryDao->getfacturasDao(self::getDataBaseDefault());
     $result = $facturasDao->listAll();
     $facturasDao->close();
     return $result;
  }


}
//That`s all folks!