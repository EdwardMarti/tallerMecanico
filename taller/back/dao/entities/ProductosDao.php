<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\

include_once realpath('../dao/interfaz/IProductosDao.php');
include_once realpath('../dto/Productos.php');
include_once realpath('../dto/Servicios.php');
include_once realpath('../dto/Proveedors.php');

class ProductosDao implements IProductosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Productos en la base de datos.
     * @param productos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($productos){
      $id=$productos->getId();
$nombre=$productos->getNombre();
$unidad_medida=$productos->getUnidad_medida();
$codigo_interno=$productos->getCodigo_interno();
$cantidad_en_stock=$productos->getCantidad_en_stock();
$marca=$productos->getMarca();
$precio_compra=$productos->getPrecio_compra();
$precio_venta=$productos->getPrecio_venta();
$dias_garantia=$productos->getDias_garantia();
$id_servicio=$productos->getId_servicio()->getId();
$id_proveedor=$productos->getId_proveedor()->getId();
$created_at=$productos->getCreated_at();
$updated_at=$productos->getUpdated_at();

      try {
          $sql= "INSERT INTO `productos`( `id`, `nombre`, `unidad_medida`, `codigo_interno`, `cantidad_en_stock`, `marca`, `precio_compra`, `precio_venta`, `dias_garantia`, `id_servicio`, `id_proveedor`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombre','$unidad_medida','$codigo_interno','$cantidad_en_stock','$marca','$precio_compra','$precio_venta','$dias_garantia','$id_servicio','$id_proveedor','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Productos en la base de datos.
     * @param productos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($productos){
      $id=$productos->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `unidad_medida`, `codigo_interno`, `cantidad_en_stock`, `marca`, `precio_compra`, `precio_venta`, `dias_garantia`, `id_servicio`, `id_proveedor`, `created_at`, `updated_at`"
          ."FROM `productos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $productos->setId($data[$i]['id']);
          $productos->setNombre($data[$i]['nombre']);
          $productos->setUnidad_medida($data[$i]['unidad_medida']);
          $productos->setCodigo_interno($data[$i]['codigo_interno']);
          $productos->setCantidad_en_stock($data[$i]['cantidad_en_stock']);
          $productos->setMarca($data[$i]['marca']);
          $productos->setPrecio_compra($data[$i]['precio_compra']);
          $productos->setPrecio_venta($data[$i]['precio_venta']);
          $productos->setDias_garantia($data[$i]['dias_garantia']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $productos->setId_servicio($servicios);
           $proveedors = new Proveedors();
           $proveedors->setId($data[$i]['id_proveedor']);
           $productos->setId_proveedor($proveedors);
          $productos->setCreated_at($data[$i]['created_at']);
          $productos->setUpdated_at($data[$i]['updated_at']);

          }
      return $productos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Productos en la base de datos.
     * @param productos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($productos){
      $id=$productos->getId();
$nombre=$productos->getNombre();
$unidad_medida=$productos->getUnidad_medida();
$codigo_interno=$productos->getCodigo_interno();
$cantidad_en_stock=$productos->getCantidad_en_stock();
$marca=$productos->getMarca();
$precio_compra=$productos->getPrecio_compra();
$precio_venta=$productos->getPrecio_venta();
$dias_garantia=$productos->getDias_garantia();
$id_servicio=$productos->getId_servicio()->getId();
$id_proveedor=$productos->getId_proveedor()->getId();
$created_at=$productos->getCreated_at();
$updated_at=$productos->getUpdated_at();

      try {
          $sql= "UPDATE `productos` SET`id`='$id' ,`nombre`='$nombre' ,`unidad_medida`='$unidad_medida' ,`codigo_interno`='$codigo_interno' ,`cantidad_en_stock`='$cantidad_en_stock' ,`marca`='$marca' ,`precio_compra`='$precio_compra' ,`precio_venta`='$precio_venta' ,`dias_garantia`='$dias_garantia' ,`id_servicio`='$id_servicio' ,`id_proveedor`='$id_proveedor' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Productos en la base de datos.
     * @param productos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($productos){
      $id=$productos->getId();

      try {
          $sql ="DELETE FROM `productos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Productos en la base de datos.
     * @return ArrayList<Productos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `unidad_medida`, `codigo_interno`, `cantidad_en_stock`, `marca`, `precio_compra`, `precio_venta`, `dias_garantia`, `id_servicio`, `id_proveedor`, `created_at`, `updated_at`"
          ."FROM `productos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $productos= new Productos();
          $productos->setId($data[$i]['id']);
          $productos->setNombre($data[$i]['nombre']);
          $productos->setUnidad_medida($data[$i]['unidad_medida']);
          $productos->setCodigo_interno($data[$i]['codigo_interno']);
          $productos->setCantidad_en_stock($data[$i]['cantidad_en_stock']);
          $productos->setMarca($data[$i]['marca']);
          $productos->setPrecio_compra($data[$i]['precio_compra']);
          $productos->setPrecio_venta($data[$i]['precio_venta']);
          $productos->setDias_garantia($data[$i]['dias_garantia']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $productos->setId_servicio($servicios);
           $proveedors = new Proveedors();
           $proveedors->setId($data[$i]['id_proveedor']);
           $productos->setId_proveedor($proveedors);
          $productos->setCreated_at($data[$i]['created_at']);
          $productos->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$productos);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!