<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\


class Productos {

  private $id;
  private $nombre;
  private $unidad_medida;
  private $codigo_interno;
  private $cantidad_en_stock;
  private $marca;
  private $precio_compra;
  private $precio_venta;
  private $dias_garantia;
  private $id_servicio;
  private $id_proveedor;
  private $created_at;
  private $updated_at;

    /**
     * Constructor de Productos
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
     * Devuelve el valor correspondiente a unidad_medida
     * @return unidad_medida
     */
  public function getUnidad_medida(){
      return $this->unidad_medida;
  }

    /**
     * Modifica el valor correspondiente a unidad_medida
     * @param unidad_medida
     */
  public function setUnidad_medida($unidad_medida){
      $this->unidad_medida = $unidad_medida;
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
     * Devuelve el valor correspondiente a cantidad_en_stock
     * @return cantidad_en_stock
     */
  public function getCantidad_en_stock(){
      return $this->cantidad_en_stock;
  }

    /**
     * Modifica el valor correspondiente a cantidad_en_stock
     * @param cantidad_en_stock
     */
  public function setCantidad_en_stock($cantidad_en_stock){
      $this->cantidad_en_stock = $cantidad_en_stock;
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
     * Devuelve el valor correspondiente a precio_compra
     * @return precio_compra
     */
  public function getPrecio_compra(){
      return $this->precio_compra;
  }

    /**
     * Modifica el valor correspondiente a precio_compra
     * @param precio_compra
     */
  public function setPrecio_compra($precio_compra){
      $this->precio_compra = $precio_compra;
  }
    /**
     * Devuelve el valor correspondiente a precio_venta
     * @return precio_venta
     */
  public function getPrecio_venta(){
      return $this->precio_venta;
  }

    /**
     * Modifica el valor correspondiente a precio_venta
     * @param precio_venta
     */
  public function setPrecio_venta($precio_venta){
      $this->precio_venta = $precio_venta;
  }
    /**
     * Devuelve el valor correspondiente a dias_garantia
     * @return dias_garantia
     */
  public function getDias_garantia(){
      return $this->dias_garantia;
  }

    /**
     * Modifica el valor correspondiente a dias_garantia
     * @param dias_garantia
     */
  public function setDias_garantia($dias_garantia){
      $this->dias_garantia = $dias_garantia;
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
     * Devuelve el valor correspondiente a id_proveedor
     * @return id_proveedor
     */
  public function getId_proveedor(){
      return $this->id_proveedor;
  }

    /**
     * Modifica el valor correspondiente a id_proveedor
     * @param id_proveedor
     */
  public function setId_proveedor($id_proveedor){
      $this->id_proveedor = $id_proveedor;
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