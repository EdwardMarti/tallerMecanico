<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Productos.php');
require_once realpath('../dao/interfaz/IProductosDao.php');
require_once realpath('../dto/Servicios.php');
require_once realpath('../dto/Proveedors.php');

class ProductosFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Productos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param unidad_medida
   * @param codigo_interno
   * @param cantidad_en_stock
   * @param marca
   * @param precio_compra
   * @param precio_venta
   * @param dias_garantia
   * @param id_servicio
   * @param id_proveedor
   * @param created_at
   * @param updated_at
   */
  public static function insert( $id,  $nombre,  $unidad_medida,  $codigo_interno,  $cantidad_en_stock,  $marca,  $precio_compra,  $precio_venta,  $dias_garantia,  $id_servicio,  $id_proveedor,  $created_at,  $updated_at){
      $productos = new Productos();
      $productos->setId($id); 
      $productos->setNombre($nombre); 
      $productos->setUnidad_medida($unidad_medida); 
      $productos->setCodigo_interno($codigo_interno); 
      $productos->setCantidad_en_stock($cantidad_en_stock); 
      $productos->setMarca($marca); 
      $productos->setPrecio_compra($precio_compra); 
      $productos->setPrecio_venta($precio_venta); 
      $productos->setDias_garantia($dias_garantia); 
      $productos->setId_servicio($id_servicio); 
      $productos->setId_proveedor($id_proveedor); 
      $productos->setCreated_at($created_at); 
      $productos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productosDao =$FactoryDao->getproductosDao(self::getDataBaseDefault());
     $rtn = $productosDao->insert($productos);
     $productosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Productos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $productos = new Productos();
      $productos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productosDao =$FactoryDao->getproductosDao(self::getDataBaseDefault());
     $result = $productosDao->select($productos);
     $productosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Productos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param unidad_medida
   * @param codigo_interno
   * @param cantidad_en_stock
   * @param marca
   * @param precio_compra
   * @param precio_venta
   * @param dias_garantia
   * @param id_servicio
   * @param id_proveedor
   * @param created_at
   * @param updated_at
   */
  public static function update($id, $nombre, $unidad_medida, $codigo_interno, $cantidad_en_stock, $marca, $precio_compra, $precio_venta, $dias_garantia, $id_servicio, $id_proveedor, $created_at, $updated_at){
      $productos = self::select($id);
      $productos->setNombre($nombre); 
      $productos->setUnidad_medida($unidad_medida); 
      $productos->setCodigo_interno($codigo_interno); 
      $productos->setCantidad_en_stock($cantidad_en_stock); 
      $productos->setMarca($marca); 
      $productos->setPrecio_compra($precio_compra); 
      $productos->setPrecio_venta($precio_venta); 
      $productos->setDias_garantia($dias_garantia); 
      $productos->setId_servicio($id_servicio); 
      $productos->setId_proveedor($id_proveedor); 
      $productos->setCreated_at($created_at); 
      $productos->setUpdated_at($updated_at); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productosDao =$FactoryDao->getproductosDao(self::getDataBaseDefault());
     $productosDao->update($productos);
     $productosDao->close();
  }

  /**
   * Elimina un objeto Productos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $productos = new Productos();
      $productos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productosDao =$FactoryDao->getproductosDao(self::getDataBaseDefault());
     $productosDao->delete($productos);
     $productosDao->close();
  }

  /**
   * Lista todos los objetos Productos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Productos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productosDao =$FactoryDao->getproductosDao(self::getDataBaseDefault());
     $result = $productosDao->listAll();
     $productosDao->close();
     return $result;
  }


}
//That`s all folks!