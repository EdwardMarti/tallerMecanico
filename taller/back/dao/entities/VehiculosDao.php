<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hey ¿cómo se llama tu café internet?  \\

include_once realpath('../dao/interfaz/IVehiculosDao.php');
include_once realpath('../dto/Vehiculos.php');
include_once realpath('../dto/Clientes.php');

class VehiculosDao implements IVehiculosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($vehiculos){
      $id=$vehiculos->getId();
$marca=$vehiculos->getMarca();
$placa=$vehiculos->getPlaca();
$kilometraje=$vehiculos->getKilometraje();
$anio=$vehiculos->getAnio();
$id_cliente=$vehiculos->getId_cliente()->getId();
$created_at=$vehiculos->getCreated_at();
$updated_at=$vehiculos->getUpdated_at();

      try {
          $sql= "INSERT INTO `vehiculos`( `id`, `marca`, `placa`, `kilometraje`, `anio`, `id_cliente`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$marca','$placa','$kilometraje','$anio','$id_cliente','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($vehiculos){
      $id=$vehiculos->getId();

      try {
          $sql= "SELECT `id`, `marca`, `placa`, `kilometraje`, `anio`, `id_cliente`, `created_at`, `updated_at`"
          ."FROM `vehiculos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $vehiculos->setId($data[$i]['id']);
          $vehiculos->setMarca($data[$i]['marca']);
          $vehiculos->setPlaca($data[$i]['placa']);
          $vehiculos->setKilometraje($data[$i]['kilometraje']);
          $vehiculos->setAnio($data[$i]['anio']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $vehiculos->setId_cliente($clientes);
          $vehiculos->setCreated_at($data[$i]['created_at']);
          $vehiculos->setUpdated_at($data[$i]['updated_at']);

          }
      return $vehiculos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($vehiculos){
      $id=$vehiculos->getId();
$marca=$vehiculos->getMarca();
$placa=$vehiculos->getPlaca();
$kilometraje=$vehiculos->getKilometraje();
$anio=$vehiculos->getAnio();
$id_cliente=$vehiculos->getId_cliente()->getId();
$created_at=$vehiculos->getCreated_at();
$updated_at=$vehiculos->getUpdated_at();

      try {
          $sql= "UPDATE `vehiculos` SET`id`='$id' ,`marca`='$marca' ,`placa`='$placa' ,`kilometraje`='$kilometraje' ,`anio`='$anio' ,`id_cliente`='$id_cliente' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($vehiculos){
      $id=$vehiculos->getId();

      try {
          $sql ="DELETE FROM `vehiculos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Vehiculos en la base de datos.
     * @return ArrayList<Vehiculos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `marca`, `placa`, `kilometraje`, `anio`, `id_cliente`, `created_at`, `updated_at`"
          ."FROM `vehiculos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $vehiculos= new Vehiculos();
          $vehiculos->setId($data[$i]['id']);
          $vehiculos->setMarca($data[$i]['marca']);
          $vehiculos->setPlaca($data[$i]['placa']);
          $vehiculos->setKilometraje($data[$i]['kilometraje']);
          $vehiculos->setAnio($data[$i]['anio']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $vehiculos->setId_cliente($clientes);
          $vehiculos->setCreated_at($data[$i]['created_at']);
          $vehiculos->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$vehiculos);
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