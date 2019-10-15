<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Migrations.php');
require_once realpath('../dao/interfaz/IMigrationsDao.php');

class MigrationsFacade {

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
   * Crea un objeto Migrations a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param migration
   * @param batch
   */
  public static function insert( $id,  $migration,  $batch){
      $migrations = new Migrations();
      $migrations->setId($id); 
      $migrations->setMigration($migration); 
      $migrations->setBatch($batch); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $migrationsDao =$FactoryDao->getmigrationsDao(self::getDataBaseDefault());
     $rtn = $migrationsDao->insert($migrations);
     $migrationsDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Migrations de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $migrations = new Migrations();
      $migrations->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $migrationsDao =$FactoryDao->getmigrationsDao(self::getDataBaseDefault());
     $result = $migrationsDao->select($migrations);
     $migrationsDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Migrations  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param migration
   * @param batch
   */
  public static function update($id, $migration, $batch){
      $migrations = self::select($id);
      $migrations->setMigration($migration); 
      $migrations->setBatch($batch); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $migrationsDao =$FactoryDao->getmigrationsDao(self::getDataBaseDefault());
     $migrationsDao->update($migrations);
     $migrationsDao->close();
  }

  /**
   * Elimina un objeto Migrations de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $migrations = new Migrations();
      $migrations->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $migrationsDao =$FactoryDao->getmigrationsDao(self::getDataBaseDefault());
     $migrationsDao->delete($migrations);
     $migrationsDao->close();
  }

  /**
   * Lista todos los objetos Migrations de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Migrations en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $migrationsDao =$FactoryDao->getmigrationsDao(self::getDataBaseDefault());
     $result = $migrationsDao->listAll();
     $migrationsDao->close();
     return $result;
  }


}
//That`s all folks!