<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\

include_once realpath('../dao/interfaz/IClientesDao.php');
include_once realpath('../dto/Clientes.php');

class ClientesDao implements IClientesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Clientes en la base de datos.
     * @param clientes objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($clientes){
 //     $id=$clientes->getId();
$nombres=$clientes->getNombres();
$apellidos=$clientes->getApellidos();
$cedula=$clientes->getCedula();
$edad=$clientes->getEdad();
$correo=$clientes->getCorreo();
$telefono=$clientes->getTelefono();
$fecha_nacimiento=$clientes->getFecha_nacimiento();
//$created_at=$clientes->getCreated_at();
//$updated_at=$clientes->getUpdated_at();

      try {
          $sql= "INSERT INTO `clientes`(  `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`)"
          ."VALUES ('$nombres','$apellidos','$cedula','$edad','$correo','$telefono','$fecha_nacimiento')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Clientes en la base de datos.
     * @param clientes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($clientes){
      $id=$clientes->getId();

      try {
          $sql= "SELECT `id`, `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`, `created_at`, `updated_at`"
          ."FROM `clientes`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $clientes->setId($data[$i]['id']);
          $clientes->setNombres($data[$i]['nombres']);
          $clientes->setApellidos($data[$i]['apellidos']);
          $clientes->setCedula($data[$i]['cedula']);
          $clientes->setEdad($data[$i]['edad']);
          $clientes->setCorreo($data[$i]['correo']);
          $clientes->setTelefono($data[$i]['telefono']);
          $clientes->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
          $clientes->setCreated_at($data[$i]['created_at']);
          $clientes->setUpdated_at($data[$i]['updated_at']);

          }
      return $clientes;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Clientes en la base de datos.
     * @param clientes objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($clientes){
      $id=$clientes->getId();
$nombres=$clientes->getNombres();
$apellidos=$clientes->getApellidos();
$cedula=$clientes->getCedula();
$edad=$clientes->getEdad();
$correo=$clientes->getCorreo();
$telefono=$clientes->getTelefono();
$fecha_nacimiento=$clientes->getFecha_nacimiento();
$created_at=$clientes->getCreated_at();
$updated_at=$clientes->getUpdated_at();

      try {
          $sql= "UPDATE `clientes` SET`id`='$id' ,`nombres`='$nombres' ,`apellidos`='$apellidos' ,`cedula`='$cedula' ,`edad`='$edad' ,`correo`='$correo' ,`telefono`='$telefono' ,`fecha_nacimiento`='$fecha_nacimiento' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Clientes en la base de datos.
     * @param clientes objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($clientes){
      $id=$clientes->getId();

      try {
          $sql ="DELETE FROM `clientes` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Clientes en la base de datos.
     * @return ArrayList<Clientes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombres`, `apellidos`, `cedula`, `edad`, `correo`, `telefono`, `fecha_nacimiento`, `created_at`, `updated_at`"
          ."FROM `clientes`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $clientes= new Clientes();
          $clientes->setId($data[$i]['id']);
          $clientes->setNombres($data[$i]['nombres']);
          $clientes->setApellidos($data[$i]['apellidos']);
          $clientes->setCedula($data[$i]['cedula']);
          $clientes->setEdad($data[$i]['edad']);
          $clientes->setCorreo($data[$i]['correo']);
          $clientes->setTelefono($data[$i]['telefono']);
          $clientes->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
          $clientes->setCreated_at($data[$i]['created_at']);
          $clientes->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$clientes);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  // <editor-fold defaultstate="collapsed" desc="Metodos Adicionales">
 
    public function listAll_Clientes(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombres`, `apellidos`, `cedula`, `correo`, `telefono`"
          ."FROM `clientes`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $clientes= new Clientes();
          $clientes->setId($data[$i]['id']);
          $clientes->setNombres($data[$i]['nombres']);
        $clientes->setApellidos($data[$i]['apellidos']);
          $clientes->setCedula($data[$i]['cedula']);
      //    $clientes->setEdad($data[$i]['edad']);
          $clientes->setCorreo($data[$i]['correo']);
          $clientes->setTelefono($data[$i]['telefono']);
      //    $clientes->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
       //   $clientes->setCreated_at($data[$i]['created_at']);
       //   $clientes->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$clientes);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
    public function listAll_ClientesDetalles($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombres`, `apellidos`, `cedula`, `correo`, `telefono`, `fecha_nacimiento`"
          ."FROM `clientes`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $clientes= new Clientes();
          $clientes->setId($data[$i]['id']);
          $clientes->setNombres($data[$i]['nombres']);
        $clientes->setApellidos($data[$i]['apellidos']);
          $clientes->setCedula($data[$i]['cedula']);
      //    $clientes->setEdad($data[$i]['edad']);
          $clientes->setCorreo($data[$i]['correo']);
          $clientes->setTelefono($data[$i]['telefono']);
          $clientes->setFecha_nacimiento($data[$i]['fecha_nacimiento']);
       //   $clientes->setCreated_at($data[$i]['created_at']);
       //   $clientes->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$clientes);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
// </editor-fold>


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