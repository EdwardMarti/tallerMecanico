<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


interface IProveedorsDao {

    /**
     * Guarda un objeto Proveedors en la base de datos.
     * @param proveedors objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proveedors);
    /**
     * Modifica un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proveedors);
    /**
     * Elimina un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proveedors);
    /**
     * Busca un objeto Proveedors en la base de datos.
     * @param proveedors objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proveedors);
    /**
     * Lista todos los objetos Proveedors en la base de datos.
     * @return Array<Proveedors> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!