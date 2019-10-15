<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\

include_once realpath('../dao/interfaz/IComprasDao.php');
include_once realpath('../dto/Compras.php');
include_once realpath('../dto/Clientes.php');

class ComprasDao implements IComprasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Compras en la base de datos.
     * @param compras objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($compras){
      $id=$compras->getId();
$id_cliente=$compras->getId_cliente()->getId();
$created_at=$compras->getCreated_at();
$updated_at=$compras->getUpdated_at();

      try {
          $sql= "INSERT INTO `compras`( `id`, `id_cliente`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$id_cliente','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Compras en la base de datos.
     * @param compras objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($compras){
      $id=$compras->getId();

      try {
          $sql= "SELECT `id`, `id_cliente`, `created_at`, `updated_at`"
          ."FROM `compras`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $compras->setId($data[$i]['id']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $compras->setId_cliente($clientes);
          $compras->setCreated_at($data[$i]['created_at']);
          $compras->setUpdated_at($data[$i]['updated_at']);

          }
      return $compras;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Compras en la base de datos.
     * @param compras objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($compras){
      $id=$compras->getId();
$id_cliente=$compras->getId_cliente()->getId();
$created_at=$compras->getCreated_at();
$updated_at=$compras->getUpdated_at();

      try {
          $sql= "UPDATE `compras` SET`id`='$id' ,`id_cliente`='$id_cliente' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Compras en la base de datos.
     * @param compras objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($compras){
      $id=$compras->getId();

      try {
          $sql ="DELETE FROM `compras` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Compras en la base de datos.
     * @return ArrayList<Compras> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `id_cliente`, `created_at`, `updated_at`"
          ."FROM `compras`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $compras= new Compras();
          $compras->setId($data[$i]['id']);
           $clientes = new Clientes();
           $clientes->setId($data[$i]['id_cliente']);
           $compras->setId_cliente($clientes);
          $compras->setCreated_at($data[$i]['created_at']);
          $compras->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$compras);
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