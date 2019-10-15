<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\

include_once realpath('../dao/interfaz/IMecanicosDao.php');
include_once realpath('../dto/Mecanicos.php');
include_once realpath('../dto/Servicios.php');

class MecanicosDao implements IMecanicosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Mecanicos en la base de datos.
     * @param mecanicos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($mecanicos){
      $id=$mecanicos->getId();
$nombres=$mecanicos->getNombres();
$apellidos=$mecanicos->getApellidos();
$cedula=$mecanicos->getCedula();
$edad=$mecanicos->getEdad();
$correo=$mecanicos->getCorreo();
$telefono=$mecanicos->getTelefono();
$fecha_nacimiento=$mecanicos->getFecha_nacimiento();
$salario=$mecanicos->getSalario();
$id_servicio=$mecanicos->getId_servicio()->getId();
$created_at=$mecanicos->getCreated_at();
$updated_at=$mecanicos->getUpdated_at();

      try {
          $sql= "INSERT INTO `mecanicos`( `id`, `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`, `salario`, `id_servicio`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombres','$apellidos','$cedula','$edad','$correo','$telefono','$fecha_nacimiento','$salario','$id_servicio','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Mecanicos en la base de datos.
     * @param mecanicos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($mecanicos){
      $id=$mecanicos->getId();

      try {
          $sql= "SELECT `id`, `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`, `salario`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `mecanicos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $mecanicos->setId($data[$i]['id']);
          $mecanicos->setNombres($data[$i]['nombres']);
          $mecanicos->setApellidos($data[$i]['apellidos']);
          $mecanicos->setCedula($data[$i]['cedula']);
          $mecanicos->setEdad($data[$i]['edad']);
          $mecanicos->setCorreo($data[$i]['correo']);
          $mecanicos->setTelefono($data[$i]['telefono']);
          $mecanicos->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
          $mecanicos->setSalario($data[$i]['salario']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $mecanicos->setId_servicio($servicios);
          $mecanicos->setCreated_at($data[$i]['created_at']);
          $mecanicos->setUpdated_at($data[$i]['updated_at']);

          }
      return $mecanicos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Mecanicos en la base de datos.
     * @param mecanicos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($mecanicos){
      $id=$mecanicos->getId();
$nombres=$mecanicos->getNombres();
$apellidos=$mecanicos->getApellidos();
$cedula=$mecanicos->getCedula();
$edad=$mecanicos->getEdad();
$correo=$mecanicos->getCorreo();
$telefono=$mecanicos->getTelefono();
$fecha_nacimiento=$mecanicos->getFecha_nacimiento();
$salario=$mecanicos->getSalario();
$id_servicio=$mecanicos->getId_servicio()->getId();
$created_at=$mecanicos->getCreated_at();
$updated_at=$mecanicos->getUpdated_at();

      try {
          $sql= "UPDATE `mecanicos` SET`id`='$id' ,`nombres`='$nombres' ,`apellidos`='$apellidos' ,`cedula`='$cedula' ,`edad`='$edad' ,`correo`='$correo' ,`telefono`='$telefono' ,`fecha_nacimiento`='$fecha_nacimiento' ,`salario`='$salario' ,`id_servicio`='$id_servicio' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Mecanicos en la base de datos.
     * @param mecanicos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($mecanicos){
      $id=$mecanicos->getId();

      try {
          $sql ="DELETE FROM `mecanicos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Mecanicos en la base de datos.
     * @return ArrayList<Mecanicos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`, `salario`, `id_servicio`, `created_at`, `updated_at`"
          ."FROM `mecanicos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $mecanicos= new Mecanicos();
          $mecanicos->setId($data[$i]['id']);
          $mecanicos->setNombres($data[$i]['nombres']);
          $mecanicos->setApellidos($data[$i]['apellidos']);
          $mecanicos->setCedula($data[$i]['cedula']);
          $mecanicos->setEdad($data[$i]['edad']);
          $mecanicos->setCorreo($data[$i]['correo']);
          $mecanicos->setTelefono($data[$i]['telefono']);
          $mecanicos->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
          $mecanicos->setSalario($data[$i]['salario']);
           $servicios = new Servicios();
           $servicios->setId($data[$i]['id_servicio']);
           $mecanicos->setId_servicio($servicios);
          $mecanicos->setCreated_at($data[$i]['created_at']);
          $mecanicos->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$mecanicos);
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