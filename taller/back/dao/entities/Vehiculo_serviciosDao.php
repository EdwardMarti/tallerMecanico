<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

include_once realpath('../dao/interfaz/IVehiculo_serviciosDao.php');
include_once realpath('../dto/Vehiculo_servicios.php');
include_once realpath('../dto/Vehiculos.php');
include_once realpath('../dto/Servicios.php');

class Vehiculo_serviciosDao implements IVehiculo_serviciosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($vehiculo_servicios){
      $id=$vehiculo_servicios->getId();
$id_vehiculo=$vehiculo_servicios->getId_vehiculo()->getId();
$id_servicio=$vehiculo_servicios->getId_servicio()->getId();
$created_at=$vehiculo_servicios->getCreated_at();
$updated_at=$vehiculo_servicios->getUpdated_at();

      try {
          $sql= "INSERT INTO `vehiculo_servicios`( `id`, `id_vehiculo`, `id_servicio`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$id_vehiculo','$id_servicio','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($vehiculo_servicios){
      $id=$vehiculo_servicios->getId();

      try {
          $sql= "SELECT `id`, `id_vehiculo`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `vehiculo_servicios`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $vehiculo_servicios->setId($data[$i]['id']);
           $vehiculos = new Vehiculos();
           $vehiculos->setId($data[$i]['id_vehiculo']);
           $vehiculo_servicios->setId_vehiculo($vehiculos);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $vehiculo_servicios->setId_servicio($servicios);
          $vehiculo_servicios->setCreated_at($data[$i]['created_at']);
          $vehiculo_servicios->setUpdated_at($data[$i]['updated_at']);

          }
      return $vehiculo_servicios;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($vehiculo_servicios){
      $id=$vehiculo_servicios->getId();
$id_vehiculo=$vehiculo_servicios->getId_vehiculo()->getId();
$id_servicio=$vehiculo_servicios->getId_servicio()->getId();
$created_at=$vehiculo_servicios->getCreated_at();
$updated_at=$vehiculo_servicios->getUpdated_at();

      try {
          $sql= "UPDATE `vehiculo_servicios` SET`id`='$id' ,`id_vehiculo`='$id_vehiculo' ,`id_servicio`='$id_servicio' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($vehiculo_servicios){
      $id=$vehiculo_servicios->getId();

      try {
          $sql ="DELETE FROM `vehiculo_servicios` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vehiculo_servicios en la base de datos.
     * @return ArrayList<Vehiculo_servicios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `id_vehiculo`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `vehiculo_servicios`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $vehiculo_servicios= new Vehiculo_servicios();
          $vehiculo_servicios->setId($data[$i]['id']);
           $vehiculos = new Vehiculos();
           $vehiculos->setId($data[$i]['id_vehiculo']);
           $vehiculo_servicios->setId_vehiculo($vehiculos);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $vehiculo_servicios->setId_servicio($servicios);
          $vehiculo_servicios->setCreated_at($data[$i]['created_at']);
          $vehiculo_servicios->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$vehiculo_servicios);
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