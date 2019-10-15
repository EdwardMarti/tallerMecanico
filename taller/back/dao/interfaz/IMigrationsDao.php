<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\


interface IMigrationsDao {

    /**
     * Guarda un objeto Migrations en la base de datos.
     * @param migrations objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($migrations);
    /**
     * Modifica un objeto Migrations en la base de datos.
     * @param migrations objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($migrations);
    /**
     * Elimina un objeto Migrations en la base de datos.
     * @param migrations objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($migrations);
    /**
     * Busca un objeto Migrations en la base de datos.
     * @param migrations objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($migrations);
    /**
     * Lista todos los objetos Migrations en la base de datos.
     * @return Array<Migrations> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!