<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


interface IFacturasDao {

    /**
     * Guarda un objeto Facturas en la base de datos.
     * @param facturas objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($facturas);
    /**
     * Modifica un objeto Facturas en la base de datos.
     * @param facturas objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($facturas);
    /**
     * Elimina un objeto Facturas en la base de datos.
     * @param facturas objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($facturas);
    /**
     * Busca un objeto Facturas en la base de datos.
     * @param facturas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($facturas);
    /**
     * Lista todos los objetos Facturas en la base de datos.
     * @return Array<Facturas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!