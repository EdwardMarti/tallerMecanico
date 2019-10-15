<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Clientes.php');
require_once realpath('../dao/interfaz/IClientesDao.php');

class ClientesFacade {

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
   * Crea un objeto Clientes a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param edad
   * @param correo
   * @param telefono
   * @param fecha_nacimiento
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombres,  $apellidos,  $cedula,  $edad,  $correo,  $telefono,  $fecha_nacimiento,  $created_at,  $updated_at){
      $clientes = new Clientes();
      $clientes->setId($id); 
      $clientes->setNombres($nombres); 
      $clientes->setApellidos($apellidos); 
      $clientes->setCedula($cedula); 
      $clientes->setEdad($edad); 
      $clientes->setCorreo($correo); 
      $clientes->setTelefono($telefono); 
      $clientes->setFecha_nacimiento($fecha_nacimiento); 
      $clientes->setCreated_at($created_at); 
      $clientes->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $clientesDao =$FactoryDao->getclientesDao(self::getDataBaseDefault());
     $rtn = $clientesDao->insert($clientes);
     $clientesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Clientes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $clientes = new Clientes();
      $clientes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $clientesDao =$FactoryDao->getclientesDao(self::getDataBaseDefault());
     $result = $clientesDao->select($clientes);
     $clientesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Clientes  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param edad
   * @param correo
   * @param telefono
   * @param fecha_nacimiento
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombres, $apellidos, $cedula, $edad, $correo, $telefono, $fecha_nacimiento, $created_at, $updated_at){
      $clientes = self::select($id);
      $clientes->setNombres($nombres); 
      $clientes->setApellidos($apellidos); 
      $clientes->setCedula($cedula); 
      $clientes->setEdad($edad); 
      $clientes->setCorreo($correo); 
      $clientes->setTelefono($telefono); 
      $clientes->setFecha_nacimiento($fecha_nacimiento); 
      $clientes->setCreated_at($created_at); 
      $clientes->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $clientesDao =$FactoryDao->getclientesDao(self::getDataBaseDefault());
     $clientesDao->update($clientes);
     $clientesDao->close();
  }

  /**
   * Elimina un objeto Clientes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $clientes = new Clientes();
      $clientes->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $clientesDao =$FactoryDao->getclientesDao(self::getDataBaseDefault());
     $clientesDao->delete($clientes);
     $clientesDao->close();
  }

  /**
   * Lista todos los objetos Clientes de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Clientes en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $clientesDao =$FactoryDao->getclientesDao(self::getDataBaseDefault());
     $result = $clientesDao->listAll();
     $clientesDao->close();
     return $result;
  }


}
//That`s all folks!