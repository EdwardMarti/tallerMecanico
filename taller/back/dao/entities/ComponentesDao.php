<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\

include_once realpath('../dao/interfaz/IComponentesDao.php');
include_once realpath('../dto/Componentes.php');
include_once realpath('../dto/Servicios.php');

class ComponentesDao implements IComponentesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Componentes en la base de datos.
     * @param componentes objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($componentes){
      $id=$componentes->getId();
$nombre=$componentes->getNombre();
$descripcion=$componentes->getDescripcion();
$precio=$componentes->getPrecio();
$id_servicio=$componentes->getId_servicio()->getId();
$created_at=$componentes->getCreated_at();
$updated_at=$componentes->getUpdated_at();

      try {
          $sql= "INSERT INTO `componentes`( `id`, `nombre`, `descripcion`, `precio`, `id_servicio`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombre','$descripcion','$precio','$id_servicio','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Componentes en la base de datos.
     * @param componentes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($componentes){
      $id=$componentes->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `descripcion`, `precio`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `componentes`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $componentes->setId($data[$i]['id']);
          $componentes->setNombre($data[$i]['nombre']);
          $componentes->setDescripcion($data[$i]['descripcion']);
          $componentes->setPrecio($data[$i]['precio']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $componentes->setId_servicio($servicios);
          $componentes->setCreated_at($data[$i]['created_at']);
          $componentes->setUpdated_at($data[$i]['updated_at']);

          }
      return $componentes;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Componentes en la base de datos.
     * @param componentes objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($componentes){
      $id=$componentes->getId();
$nombre=$componentes->getNombre();
$descripcion=$componentes->getDescripcion();
$precio=$componentes->getPrecio();
$id_servicio=$componentes->getId_servicio()->getId();
$created_at=$componentes->getCreated_at();
$updated_at=$componentes->getUpdated_at();

      try {
          $sql= "UPDATE `componentes` SET`id`='$id' ,`nombre`='$nombre' ,`descripcion`='$descripcion' ,`precio`='$precio' ,`id_servicio`='$id_servicio' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Componentes en la base de datos.
     * @param componentes objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($componentes){
      $id=$componentes->getId();

      try {
          $sql ="DELETE FROM `componentes` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Componentes en la base de datos.
     * @return ArrayList<Componentes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `descripcion`, `precio`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `componentes`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $componentes= new Componentes();
          $componentes->setId($data[$i]['id']);
          $componentes->setNombre($data[$i]['nombre']);
          $componentes->setDescripcion($data[$i]['descripcion']);
          $componentes->setPrecio($data[$i]['precio']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $componentes->setId_servicio($servicios);
          $componentes->setCreated_at($data[$i]['created_at']);
          $componentes->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$componentes);
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