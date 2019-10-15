<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\


class Vehiculo_servicios {

  private $id;
  private $id_vehiculo;
  private $id_servicio;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Vehiculo_servicios
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
     * Devuelve el valor correspondiente a id_vehiculo
     * @return id_vehiculo
     */
  public function getId_vehiculo(){
      return $this->id_vehiculo;
  }

    /**
     * Modifica el valor correspondiente a id_vehiculo
     * @param id_vehiculo
     */
  public function setId_vehiculo($id_vehiculo){
      $this->id_vehiculo = $id_vehiculo;
  }
    /**
     * Devuelve el valor correspondiente a id_servicio
     * @return id_servicio
     */
  public function getId_servicio(){
      return $this->id_servicio;
  }

    /**
     * Modifica el valor correspondiente a id_servicio
     * @param id_servicio
     */
  public function setId_servicio($id_servicio){
      $this->id_servicio = $id_servicio;
  }
    /**
     * Devuelve el valor correspondiente a created_at
     * @return created_at
     */
  public function getCreated_at(){
      return $this->created_at;
  }

    /**
     * Modifica el valor correspondiente a created_at
     * @param created_at
     */
  public function setCreated_at($created_at){
      $this->created_at = $created_at;
  }
    /**
     * Devuelve el valor correspondiente a updated_at
     * @return updated_at
     */
  public function getUpdated_at(){
      return $this->updated_at;
  }

    /**
     * Modifica el valor correspondiente a updated_at
     * @param updated_at
     */
  public function setUpdated_at($updated_at){
      $this->updated_at = $updated_at;
  }


}
//That`s all folks!