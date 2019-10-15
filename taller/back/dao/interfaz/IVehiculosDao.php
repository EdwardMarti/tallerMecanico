<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todos los animales son iguales, pero algunos animales son más iguales que otros  \\


interface IVehiculosDao {

    /**
     * Guarda un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($vehiculos);
    /**
     * Modifica un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($vehiculos);
    /**
     * Elimina un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($vehiculos);
    /**
     * Busca un objeto Vehiculos en la base de datos.
     * @param vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($vehiculos);
    /**
     * Lista todos los objetos Vehiculos en la base de datos.
     * @return Array<Vehiculos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!