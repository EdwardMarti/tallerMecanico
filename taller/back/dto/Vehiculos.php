<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\


class Vehiculos {

  private $id;
  private $marca;
  private $placa;
  private $kilometraje;
  private $anio;
  private $id_cliente;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Vehiculos
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
     * Devuelve el valor correspondiente a marca
     * @return marca
     */
  public function getMarca(){
      return $this->marca;
  }

    /**
     * Modifica el valor correspondiente a marca
     * @param marca
     */
  public function setMarca($marca){
      $this->marca = $marca;
  }
    /**
     * Devuelve el valor correspondiente a placa
     * @return placa
     */
  public function getPlaca(){
      return $this->placa;
  }

    /**
     * Modifica el valor correspondiente a placa
     * @param placa
     */
  public function setPlaca($placa){
      $this->placa = $placa;
  }
    /**
     * Devuelve el valor correspondiente a kilometraje
     * @return kilometraje
     */
  public function getKilometraje(){
      return $this->kilometraje;
  }

    /**
     * Modifica el valor correspondiente a kilometraje
     * @param kilometraje
     */
  public function setKilometraje($kilometraje){
      $this->kilometraje = $kilometraje;
  }
    /**
     * Devuelve el valor correspondiente a anio
     * @return anio
     */
  public function getAnio(){
      return $this->anio;
  }

    /**
     * Modifica el valor correspondiente a anio
     * @param anio
     */
  public function setAnio($anio){
      $this->anio = $anio;
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