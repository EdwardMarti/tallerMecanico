<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\


interface IVehiculo_serviciosDao {

    /**
     * Guarda un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($vehiculo_servicios);
    /**
     * Modifica un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($vehiculo_servicios);
    /**
     * Elimina un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($vehiculo_servicios);
    /**
     * Busca un objeto Vehiculo_servicios en la base de datos.
     * @param vehiculo_servicios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($vehiculo_servicios);
    /**
     * Lista todos los objetos Vehiculo_servicios en la base de datos.
     * @return Array<Vehiculo_servicios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!