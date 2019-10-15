<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\


class Componentes {

  private $id;
  private $nombre;
  private $descripcion;
  private $precio;
  private $id_servicio;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Componentes
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
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
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
     * Devuelve el valor correspondiente a precio
     * @return precio
     */
  public function getPrecio(){
      return $this->precio;
  }

    /**
     * Modifica el valor correspondiente a precio
     * @param precio
     */
  public function setPrecio($precio){
      $this->precio = $precio;
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