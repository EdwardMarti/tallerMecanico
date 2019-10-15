<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\


interface ICliente_vehiculosDao {

    /**
     * Guarda un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cliente_vehiculos);
    /**
     * Modifica un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cliente_vehiculos);
    /**
     * Elimina un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cliente_vehiculos);
    /**
     * Busca un objeto Cliente_vehiculos en la base de datos.
     * @param cliente_vehiculos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cliente_vehiculos);
    /**
     * Lista todos los objetos Cliente_vehiculos en la base de datos.
     * @return Array<Cliente_vehiculos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!