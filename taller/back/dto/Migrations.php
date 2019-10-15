<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\


class Migrations {

  private $id;
  private $migration;
  private $batch;

    /**
     * Constructor de Migrations
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a migration
     * @return migration
     */
  public function getMigration(){
      return $this->migration;
  }

    /**
     * Modifica el valor correspondiente a migration
     * @param migration
     */
  public function setMigration($migration){
      $this->migration = $migration;
  }
    /**
     * Devuelve el valor correspondiente a batch
     * @return batch
     */
  public function getBatch(){
      return $this->batch;
  }

    /**
     * Modifica el valor correspondiente a batch
     * @param batch
     */
  public function setBatch($batch){
      $this->batch = $batch;
  }


}
//That`s all folks!