<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\

include_once realpath('../dao/interfaz/ICitasDao.php');
include_once realpath('../dto/Citas.php');
include_once realpath('../dto/Clientes.php');

class CitasDao implements ICitasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Citas en la base de datos.
     * @param citas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($citas){
      $id=$citas->getId();
$fecha_creacion=$citas->getFecha_creacion();
$id_cliente=$citas->getId_cliente()->getId();
$descripcion=$citas->getDescripcion();
$created_at=$citas->getCreated_at();
$updated_at=$citas->getUpdated_at();

      try {
          $sql= "INSERT INTO `citas`( `id`, `fecha_creacion`, `id_cliente`, `descripcion`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$fecha_creacion','$id_cliente','$descripcion','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Citas en la base de datos.
     * @param citas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($citas){
      $id=$citas->getId();

      try {
          $sql= "SELECT `id`, `fecha_creacion`, `id_cliente`, `descripcion`, `created_at`, `updated_at`"
          ."FROM `citas`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $citas->setId($data[$i]['id']);
          $citas->setFecha_creacion($data[$i]['fecha_creacion']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $citas->setId_cliente($clientes);
          $citas->setDescripcion($data[$i]['descripcion']);
          $citas->setCreated_at($data[$i]['created_at']);
          $citas->setUpdated_at($data[$i]['updated_at']);

          }
      return $citas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Citas en la base de datos.
     * @param citas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($citas){
      $id=$citas->getId();
$fecha_creacion=$citas->getFecha_creacion();
$id_cliente=$citas->getId_cliente()->getId();
$descripcion=$citas->getDescripcion();
$created_at=$citas->getCreated_at();
$updated_at=$citas->getUpdated_at();

      try {
          $sql= "UPDATE `citas` SET`id`='$id' ,`fecha_creacion`='$fecha_creacion' ,`id_cliente`='$id_cliente' ,`descripcion`='$descripcion' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Citas en la base de datos.
     * @param citas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($citas){
      $id=$citas->getId();

      try {
          $sql ="DELETE FROM `citas` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Citas en la base de datos.
     * @return ArrayList<Citas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `fecha_creacion`, `id_cliente`, `descripcion`, `created_at`, `updated_at`"
          ."FROM `citas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $citas= new Citas();
          $citas->setId($data[$i]['id']);
          $citas->setFecha_creacion($data[$i]['fecha_creacion']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $citas->setId_cliente($clientes);
          $citas->setDescripcion($data[$i]['descripcion']);
          $citas->setCreated_at($data[$i]['created_at']);
          $citas->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$citas);
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