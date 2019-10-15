<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\


class Servicios {

  private $id;
  private $nombre;
  private $codigo_interno;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Servicios
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
     * Devuelve el valor correspondiente a codigo_interno
     * @return codigo_interno
     */
  public function getCodigo_interno(){
      return $this->codigo_interno;
  }

    /**
     * Modifica el valor correspondiente a codigo_interno
     * @param codigo_interno
     */
  public function setCodigo_interno($codigo_interno){
      $this->codigo_interno = $codigo_interno;
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