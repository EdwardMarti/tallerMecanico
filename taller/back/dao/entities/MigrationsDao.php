<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

include_once realpath('../dao/interfaz/IMigrationsDao.php');
include_once realpath('../dto/Migrations.php');

class MigrationsDao implements IMigrationsDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Migrations en la base de datos.
     * @param migrations objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($migrations){
      $id=$migrations->getId();
$migration=$migrations->getMigration();
$batch=$migrations->getBatch();

      try {
          $sql= "INSERT INTO `migrations`( `id`, `migration`, `batch`)"
          ."VALUES ('$id','$migration','$batch')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Migrations en la base de datos.
     * @param migrations objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($migrations){
      $id=$migrations->getId();

      try {
          $sql= "SELECT `id`, `migration`, `batch`"
          ."FROM `migrations`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $migrations->setId($data[$i]['id']);
          $migrations->setMigration($data[$i]['migration']);
          $migrations->setBatch($data[$i]['batch']);

          }
      return $migrations;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Migrations en la base de datos.
     * @param migrations objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($migrations){
      $id=$migrations->getId();
$migration=$migrations->getMigration();
$batch=$migrations->getBatch();

      try {
          $sql= "UPDATE `migrations` SET`id`='$id' ,`migration`='$migration' ,`batch`='$batch' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Migrations en la base de datos.
     * @param migrations objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($migrations){
      $id=$migrations->getId();

      try {
          $sql ="DELETE FROM `migrations` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Migrations en la base de datos.
     * @return ArrayList<Migrations> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `migration`, `batch`"
          ."FROM `migrations`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $migrations= new Migrations();
          $migrations->setId($data[$i]['id']);
          $migrations->setMigration($data[$i]['migration']);
          $migrations->setBatch($data[$i]['batch']);

          array_push($lista,$migrations);
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