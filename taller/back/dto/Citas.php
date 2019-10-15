<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\


class Citas {

  private $id;
  private $fecha_creacion;
  private $id_cliente;
  private $descripcion;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Citas
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
     * Devuelve el valor correspondiente a fecha_creacion
     * @return fecha_creacion
     */
  public function getFecha_creacion(){
      return $this->fecha_creacion;
  }

    /**
     * Modifica el valor correspondiente a fecha_creacion
     * @param fecha_creacion
     */
  public function setFecha_creacion($fecha_creacion){
      $this->fecha_creacion = $fecha_creacion;
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
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
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