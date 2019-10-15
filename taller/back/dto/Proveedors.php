<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\


class Proveedors {

  private $id;
  private $nombre;
  private $nit;
  private $representante_legal;
  private $ciudad;
  private $telefono;
  private $correo;
  private $sitio_web;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Proveedors
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
     * Devuelve el valor correspondiente a nit
     * @return nit
     */
  public function getNit(){
      return $this->nit;
  }

    /**
     * Modifica el valor correspondiente a nit
     * @param nit
     */
  public function setNit($nit){
      $this->nit = $nit;
  }
    /**
     * Devuelve el valor correspondiente a representante_legal
     * @return representante_legal
     */
  public function getRepresentante_legal(){
      return $this->representante_legal;
  }

    /**
     * Modifica el valor correspondiente a representante_legal
     * @param representante_legal
     */
  public function setRepresentante_legal($representante_legal){
      $this->representante_legal = $representante_legal;
  }
    /**
     * Devuelve el valor correspondiente a ciudad
     * @return ciudad
     */
  public function getCiudad(){
      return $this->ciudad;
  }

    /**
     * Modifica el valor correspondiente a ciudad
     * @param ciudad
     */
  public function setCiudad($ciudad){
      $this->ciudad = $ciudad;
  }
    /**
     * Devuelve el valor correspondiente a telefono
     * @return telefono
     */
  public function getTelefono(){
      return $this->telefono;
  }

    /**
     * Modifica el valor correspondiente a telefono
     * @param telefono
     */
  public function setTelefono($telefono){
      $this->telefono = $telefono;
  }
    /**
     * Devuelve el valor correspondiente a correo
     * @return correo
     */
  public function getCorreo(){
      return $this->correo;
  }

    /**
     * Modifica el valor correspondiente a correo
     * @param correo
     */
  public function setCorreo($correo){
      $this->correo = $correo;
  }
    /**
     * Devuelve el valor correspondiente a sitio_web
     * @return sitio_web
     */
  public function getSitio_web(){
      return $this->sitio_web;
  }

    /**
     * Modifica el valor correspondiente a sitio_web
     * @param sitio_web
     */
  public function setSitio_web($sitio_web){
      $this->sitio_web = $sitio_web;
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