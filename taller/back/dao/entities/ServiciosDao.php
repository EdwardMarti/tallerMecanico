<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\

include_once realpath('../dao/interfaz/IServiciosDao.php');
include_once realpath('../dto/Servicios.php');

class ServiciosDao implements IServiciosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Servicios en la base de datos.
     * @param servicios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($servicios){
      $id=$servicios->getId();
$nombre=$servicios->getNombre();
$codigo_interno=$servicios->getCodigo_interno();
$created_at=$servicios->getCreated_at();
$updated_at=$servicios->getUpdated_at();

      try {
          $sql= "INSERT INTO `servicios`( `id`, `nombre`, `codigo_interno`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombre','$codigo_interno','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Servicios en la base de datos.
     * @param servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($servicios){
      $id=$servicios->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `codigo_interno`, `created_at`, `updated_at`"
          ."FROM `servicios`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $servicios->setId($data[$i]['id']);
          $servicios->setNombre($data[$i]['nombre']);
          $servicios->setCodigo_interno($data[$i]['codigo_interno']);
          $servicios->setCreated_at($data[$i]['created_at']);
          $servicios->setUpdated_at($data[$i]['updated_at']);

          }
      return $servicios;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Servicios en la base de datos.
     * @param servicios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($servicios){
      $id=$servicios->getId();
$nombre=$servicios->getNombre();
$codigo_interno=$servicios->getCodigo_interno();
$created_at=$servicios->getCreated_at();
$updated_at=$servicios->getUpdated_at();

      try {
          $sql= "UPDATE `servicios` SET`id`='$id' ,`nombre`='$nombre' ,`codigo_interno`='$codigo_interno' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Servicios en la base de datos.
     * @param servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($servicios){
      $id=$servicios->getId();

      try {
          $sql ="DELETE FROM `servicios` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Servicios en la base de datos.
     * @return ArrayList<Servicios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `codigo_interno`, `created_at`, `updated_at`"
          ."FROM `servicios`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $servicios= new Servicios();
          $servicios->setId($data[$i]['id']);
          $servicios->setNombre($data[$i]['nombre']);
          $servicios->setCodigo_interno($data[$i]['codigo_interno']);
          $servicios->setCreated_at($data[$i]['created_at']);
          $servicios->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$servicios);
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