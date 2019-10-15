<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\


class Administradors {

  private $id;
  private $nombres;
  private $apellidos;
  private $cedula;
  private $correo;
  private $telefono;
  private $descripcion;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Administradors
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
     * Devuelve el valor correspondiente a nombres
     * @return nombres
     */
  public function getNombres(){
      return $this->nombres;
  }

    /**
     * Modifica el valor correspondiente a nombres
     * @param nombres
     */
  public function setNombres($nombres){
      $this->nombres = $nombres;
  }
    /**
     * Devuelve el valor correspondiente a apellidos
     * @return apellidos
     */
  public function getApellidos(){
      return $this->apellidos;
  }

    /**
     * Modifica el valor correspondiente a apellidos
     * @param apellidos
     */
  public function setApellidos($apellidos){
      $this->apellidos = $apellidos;
  }
    /**
     * Devuelve el valor correspondiente a cedula
     * @return cedula
     */
  public function getCedula(){
      return $this->cedula;
  }

    /**
     * Modifica el valor correspondiente a cedula
     * @param cedula
     */
  public function setCedula($cedula){
      $this->cedula = $cedula;
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