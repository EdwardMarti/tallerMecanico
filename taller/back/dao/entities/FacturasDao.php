<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hecho en sólo 6 días  \\

include_once realpath('../dao/interfaz/IFacturasDao.php');
include_once realpath('../dto/Facturas.php');
include_once realpath('../dto/Clientes.php');
include_once realpath('../dto/Servicios.php');

class FacturasDao implements IFacturasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Facturas en la base de datos.
     * @param facturas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($facturas){
      $id=$facturas->getId();
$id_cliente=$facturas->getId_cliente()->getId();
$id_servicio=$facturas->getId_servicio()->getId();
$created_at=$facturas->getCreated_at();
$updated_at=$facturas->getUpdated_at();

      try {
          $sql= "INSERT INTO `facturas`( `id`, `id_cliente`, `id_servicio`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$id_cliente','$id_servicio','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Facturas en la base de datos.
     * @param facturas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($facturas){
      $id=$facturas->getId();

      try {
          $sql= "SELECT `id`, `id_cliente`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `facturas`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $facturas->setId($data[$i]['id']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $facturas->setId_cliente($clientes);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $facturas->setId_servicio($servicios);
          $facturas->setCreated_at($data[$i]['created_at']);
          $facturas->setUpdated_at($data[$i]['updated_at']);

          }
      return $facturas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Facturas en la base de datos.
     * @param facturas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($facturas){
      $id=$facturas->getId();
$id_cliente=$facturas->getId_cliente()->getId();
$id_servicio=$facturas->getId_servicio()->getId();
$created_at=$facturas->getCreated_at();
$updated_at=$facturas->getUpdated_at();

      try {
          $sql= "UPDATE `facturas` SET`id`='$id' ,`id_cliente`='$id_cliente' ,`id_servicio`='$id_servicio' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Facturas en la base de datos.
     * @param facturas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($facturas){
      $id=$facturas->getId();

      try {
          $sql ="DELETE FROM `facturas` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Facturas en la base de datos.
     * @return ArrayList<Facturas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `id_cliente`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `facturas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $facturas= new Facturas();
          $facturas->setId($data[$i]['id']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $facturas->setId_cliente($clientes);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $facturas->setId_servicio($servicios);
          $facturas->setCreated_at($data[$i]['created_at']);
          $facturas->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$facturas);
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