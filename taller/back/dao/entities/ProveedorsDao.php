<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\

include_once realpath('../dao/interfaz/IProveedorsDao.php');
include_once realpath('../dto/Proveedors.php');

class ProveedorsDao implements IProveedorsDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Proveedors en la base de datos.
     * @param proveedors objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proveedors){
      $id=$proveedors->getId();
$nombre=$proveedors->getNombre();
$nit=$proveedors->getNit();
$representante_legal=$proveedors->getRepresentante_legal();
$ciudad=$proveedors->getCiudad();
$telefono=$proveedors->getTelefono();
$correo=$proveedors->getCorreo();
$sitio_web=$proveedors->getSitio_web();
$created_at=$proveedors->getCreated_at();
$updated_at=$proveedors->getUpdated_at();

      try {
          $sql= "INSERT INTO `proveedors`( `id`, `nombre`, `nit`, `representante_legal`, `ciudad`, `telefono`, `correo`, `sitio_web`, `created_at`, `updated_at`)"
          ."VALUES ('$id','$nombre','$nit','$representante_legal','$ciudad','$telefono','$correo','$sitio_web','$created_at','$updated_at')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proveedors){
      $id=$proveedors->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `nit`, `representante_legal`, `ciudad`, `telefono`, `correo`, `sitio_web`, `created_at`, `updated_at`"
          ."FROM `proveedors`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $proveedors->setId($data[$i]['id']);
          $proveedors->setNombre($data[$i]['nombre']);
          $proveedors->setNit($data[$i]['nit']);
          $proveedors->setRepresentante_legal($data[$i]['representante_legal']);
          $proveedors->setCiudad($data[$i]['ciudad']);
          $proveedors->setTelefono($data[$i]['telefono']);
          $proveedors->setCorreo($data[$i]['correo']);
          $proveedors->setSitio_web($data[$i]['sitio_web']);
          $proveedors->setCreated_at($data[$i]['created_at']);
          $proveedors->setUpdated_at($data[$i]['updated_at']);

          }
      return $proveedors;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proveedors){
      $id=$proveedors->getId();
$nombre=$proveedors->getNombre();
$nit=$proveedors->getNit();
$representante_legal=$proveedors->getRepresentante_legal();
$ciudad=$proveedors->getCiudad();
$telefono=$proveedors->getTelefono();
$correo=$proveedors->getCorreo();
$sitio_web=$proveedors->getSitio_web();
$created_at=$proveedors->getCreated_at();
$updated_at=$proveedors->getUpdated_at();

      try {
          $sql= "UPDATE `proveedors` SET`id`='$id' ,`nombre`='$nombre' ,`nit`='$nit' ,`representante_legal`='$representante_legal' ,`ciudad`='$ciudad' ,`telefono`='$telefono' ,`correo`='$correo' ,`sitio_web`='$sitio_web' ,`created_at`='$created_at' ,`updated_at`='$updated_at' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proveedors){
      $id=$proveedors->getId();

      try {
          $sql ="DELETE FROM `proveedors` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proveedors en la base de datos.
     * @return ArrayList<Proveedors> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `nit`, `representante_legal`, `ciudad`, `telefono`, `correo`, `sitio_web`, `created_at`, `updated_at`"
          ."FROM `proveedors`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $proveedors= new Proveedors();
          $proveedors->setId($data[$i]['id']);
          $proveedors->setNombre($data[$i]['nombre']);
          $proveedors->setNit($data[$i]['nit']);
          $proveedors->setRepresentante_legal($data[$i]['representante_legal']);
          $proveedors->setCiudad($data[$i]['ciudad']);
          $proveedors->setTelefono($data[$i]['telefono']);
          $proveedors->setCorreo($data[$i]['correo']);
          $proveedors->setSitio_web($data[$i]['sitio_web']);
          $proveedors->setCreated_at($data[$i]['created_at']);
          $proveedors->setUpdated_at($data[$i]['updated_at']);

          array_push($lista,$proveedors);
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