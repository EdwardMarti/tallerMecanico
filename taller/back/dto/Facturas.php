<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es tu vida y se acaba a cada minuto.  \\


class Facturas {

  private $id;
  private $id_cliente;
  private $id_servicio;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Facturas
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
     * Devuelve el valor correspondiente a id_cliente
     * @return id_cliente
     */
  public function getId_cliente(){
      return $this->id_cliente;
  }

    /**
     * Modifica el valor correspondiente a id_cliente
     * @param id_cliente
     */
  public function setId_cliente($id_cliente){
      $this->id_cliente = $id_cliente;
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