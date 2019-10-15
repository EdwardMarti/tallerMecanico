<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Mecanicos.php');
require_once realpath('../dao/interfaz/IMecanicosDao.php');
require_once realpath('../dto/Servicios.php');

class MecanicosFacade {

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
   * Crea un objeto Mecanicos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param edad
   * @param correo
   * @param telefono
   * @param fecha_nacimiento
   * @param salario
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombres,  $apellidos,  $cedula,  $edad,  $correo,  $telefono,  $fecha_nacimiento,  $salario,  $id_servicio,  $created_at,  $updated_at){
      $mecanicos = new Mecanicos();
      $mecanicos->setId($id); 
      $mecanicos->setNombres($nombres); 
      $mecanicos->setApellidos($apellidos); 
      $mecanicos->setCedula($cedula); 
      $mecanicos->setEdad($edad); 
      $mecanicos->setCorreo($correo); 
      $mecanicos->setTelefono($telefono); 
      $mecanicos->setFecha_nacimiento($fecha_nacimiento); 
      $mecanicos->setSalario($salario); 
      $mecanicos->setId_servicio($id_servicio); 
      $mecanicos->setCreated_at($created_at); 
      $mecanicos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mecanicosDao =$FactoryDao->getmecanicosDao(self::getDataBaseDefault());
     $rtn = $mecanicosDao->insert($mecanicos);
     $mecanicosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Mecanicos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $mecanicos = new Mecanicos();
      $mecanicos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mecanicosDao =$FactoryDao->getmecanicosDao(self::getDataBaseDefault());
     $result = $mecanicosDao->select($mecanicos);
     $mecanicosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Mecanicos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombres
   * @param apellidos
   * @param cedula
   * @param edad
   * @param correo
   * @param telefono
   * @param fecha_nacimiento
   * @param salario
   * @param id_servicio
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombres, $apellidos, $cedula, $edad, $correo, $telefono, $fecha_nacimiento, $salario, $id_servicio, $created_at, $updated_at){
      $mecanicos = self::select($id);
      $mecanicos->setNombres($nombres); 
      $mecanicos->setApellidos($apellidos); 
      $mecanicos->setCedula($cedula); 
      $mecanicos->setEdad($edad); 
      $mecanicos->setCorreo($correo); 
      $mecanicos->setTelefono($telefono); 
      $mecanicos->setFecha_nacimiento($fecha_nacimiento); 
      $mecanicos->setSalario($salario); 
      $mecanicos->setId_servicio($id_servicio); 
      $mecanicos->setCreated_at($created_at); 
      $mecanicos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mecanicosDao =$FactoryDao->getmecanicosDao(self::getDataBaseDefault());
     $mecanicosDao->update($mecanicos);
     $mecanicosDao->close();
  }

  /**
   * Elimina un objeto Mecanicos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $mecanicos = new Mecanicos();
      $mecanicos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mecanicosDao =$FactoryDao->getmecanicosDao(self::getDataBaseDefault());
     $mecanicosDao->delete($mecanicos);
     $mecanicosDao->close();
  }

  /**
   * Lista todos los objetos Mecanicos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Mecanicos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mecanicosDao =$FactoryDao->getmecanicosDao(self::getDataBaseDefault());
     $result = $mecanicosDao->listAll();
     $mecanicosDao->close();
     return $result;
  }


}
//That`s all folks!