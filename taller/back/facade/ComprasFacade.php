<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Compras.php');
require_once realpath('../dao/interfaz/IComprasDao.php');
require_once realpath('../dto/Clientes.php');

class ComprasFacade {

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
   * Crea un objeto Compras a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_cliente
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $id_cliente,  $created_at,  $updated_at){
      $compras = new Compras();
      $compras->setId($id); 
      $compras->setId_cliente($id_cliente); 
      $compras->setCreated_at($created_at); 
      $compras->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $comprasDao =$FactoryDao->getcomprasDao(self::getDataBaseDefault());
     $rtn = $comprasDao->insert($compras);
     $comprasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Compras de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $compras = new Compras();
      $compras->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $comprasDao =$FactoryDao->getcomprasDao(self::getDataBaseDefault());
     $result = $comprasDao->select($compras);
     $comprasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Compras  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param id_cliente
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $id_cliente, $created_at, $updated_at){
      $compras = self::select($id);
      $compras->setId_cliente($id_cliente); 
      $compras->setCreated_at($created_at); 
      $compras->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $comprasDao =$FactoryDao->getcomprasDao(self::getDataBaseDefault());
     $comprasDao->update($compras);
     $comprasDao->close();
  }

  /**
   * Elimina un objeto Compras de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $compras = new Compras();
      $compras->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $comprasDao =$FactoryDao->getcomprasDao(self::getDataBaseDefault());
     $comprasDao->delete($compras);
     $comprasDao->close();
  }

  /**
   * Lista todos los objetos Compras de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Compras en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $comprasDao =$FactoryDao->getcomprasDao(self::getDataBaseDefault());
     $result = $comprasDao->listAll();
     $comprasDao->close();
     return $result;
  }


}
//That`s all folks!