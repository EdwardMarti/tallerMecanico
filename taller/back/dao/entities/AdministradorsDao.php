<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\

include_once realpath('../dao/interfaz/IAdministradorsDao.php');
include_once realpath('../dto/Administradors.php');

class AdministradorsDao implements IAdministradorsDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Administradors en la base de datos.
     * @param administradors objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($administradors){
      $id=$administradors->getId();
$nombres=$administradors->getNombres();
$apellidos=$administradors->getApellidos();
$cedula=$administradors->getCedula();
$correo=$administradors->getCorreo();
$telefono=$administradors->getTelefono();
$descripcion=$administradors->getDescripcion();
$created_at=$administradors->getCreated_at();
$updated_at=$administradors->getUpdated_at();

      try {
          $sql= "INSERT INTO `administradors`( `id`, `nombres`, `apellidos`, `cedula`, `correo`, `telefono`, `descripcion`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombres','$apellidos','$cedula','$correo','$telefono','$descripcion','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Administradors en la base de datos.
     * @param administradors objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($administradors){
      $id=$administradors->getId();

      try {
          $sql= "SELECT `id`, `nombres`, `apellidos`, `cedula`, `correo`, `telefono`, `descripcion`, `created_at`, `updated_at`"
          ."FROM `administradors`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $administradors->setId($data[$i]['id']);
          $administradors->setNombres($data[$i]['nombres']);
          $administradors->setApellidos($data[$i]['apellidos']);
          $administradors->setCedula($data[$i]['cedula']);
          $administradors->setCorreo($data[$i]['correo']);
          $administradors->setTelefono($data[$i]['telefono']);
          $administradors->setDescripcion($data[$i]['descripcion']);
          $administradors->setCreated_at($data[$i]['created_at']);
          $administradors->setUpdated_at($data[$i]['updated_at']);

          }
      return $administradors;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Administradors en la base de datos.
     * @param administradors objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($administradors){
      $id=$administradors->getId();
$nombres=$administradors->getNombres();
$apellidos=$administradors->getApellidos();
$cedula=$administradors->getCedula();
$correo=$administradors->getCorreo();
$telefono=$administradors->getTelefono();
$descripcion=$administradors->getDescripcion();
$created_at=$administradors->getCreated_at();
$updated_at=$administradors->getUpdated_at();

      try {
          $sql= "UPDATE `administradors` SET`id`='$id' ,`nombres`='$nombres' ,`apellidos`='$apellidos' ,`cedula`='$cedula' ,`correo`='$correo' ,`telefono`='$telefono' ,`descripcion`='$descripcion' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Administradors en la base de datos.
     * @param administradors objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($administradors){
      $id=$administradors->getId();

      try {
          $sql ="DELETE FROM `administradors` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Administradors en la base de datos.
     * @return ArrayList<Administradors> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombres`, `apellidos`, `cedula`, `correo`, `telefono`, `descripcion`, `created_at`, `updated_at`"
          ."FROM `administradors`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $administradors= new Administradors();
          $administradors->setId($data[$i]['id']);
          $administradors->setNombres($data[$i]['nombres']);
          $administradors->setApellidos($data[$i]['apellidos']);
          $administradors->setCedula($data[$i]['cedula']);
          $administradors->setCorreo($data[$i]['correo']);
          $administradors->setTelefono($data[$i]['telefono']);
          $administradors->setDescripcion($data[$i]['descripcion']);
          $administradors->setCreated_at($data[$i]['created_at']);
          $administradors->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$administradors);
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