<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\

include_once realpath('../dao/interfaz/ICliente_vehiculosDao.php');
include_once realpath('../dto/Cliente_vehiculos.php');
include_once realpath('../dto/Vehiculos.php');

class Cliente_vehiculosDao implements ICliente_vehiculosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cliente_vehiculos){
      $id=$cliente_vehiculos->getId();
$id_vehiculo=$cliente_vehiculos->getId_vehiculo()->getId();
$created_at=$cliente_vehiculos->getCreated_at();
$updated_at=$cliente_vehiculos->getUpdated_at();

      try {
          $sql= "INSERT INTO `cliente_vehiculos`( `id`, `id_vehiculo`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$id_vehiculo','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cliente_vehiculos){
      $id=$cliente_vehiculos->getId();

      try {
          $sql= "SELECT `id`, `id_vehiculo`, `created_at`, `updated_at`"
          ."FROM `cliente_vehiculos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cliente_vehiculos->setId($data[$i]['id']);
           $vehiculos = new Vehiculos();
           $vehiculos->setId($data[$i]['id_vehiculo']);
           $cliente_vehiculos->setId_vehiculo($vehiculos);
          $cliente_vehiculos->setCreated_at($data[$i]['created_at']);
          $cliente_vehiculos->setUpdated_at($data[$i]['updated_at']);

          }
      return $cliente_vehiculos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cliente_vehiculos){
      $id=$cliente_vehiculos->getId();
$id_vehiculo=$cliente_vehiculos->getId_vehiculo()->getId();
$created_at=$cliente_vehiculos->getCreated_at();
$updated_at=$cliente_vehiculos->getUpdated_at();

      try {
          $sql= "UPDATE `cliente_vehiculos` SET`id`='$id' ,`id_vehiculo`='$id_vehiculo' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cliente_vehiculos){
      $id=$cliente_vehiculos->getId();

      try {
          $sql ="DELETE FROM `cliente_vehiculos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cliente_vehiculos en la base de datos.
     * @return ArrayList<Cliente_vehiculos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `id_vehiculo`, `created_at`, `updated_at`"
          ."FROM `cliente_vehiculos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cliente_vehiculos= new Cliente_vehiculos();
          $cliente_vehiculos->setId($data[$i]['id']);
           $vehiculos = new Vehiculos();
           $vehiculos->setId($data[$i]['id_vehiculo']);
           $cliente_vehiculos->setId_vehiculo($vehiculos);
          $cliente_vehiculos->setCreated_at($data[$i]['created_at']);
          $cliente_vehiculos->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$cliente_vehiculos);
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