<?php namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model {
    // Definimos la tabla y su llave primaria
    protected $table      = 'personas';
    protected $primaryKey = 'id';

    // Permitimos que estos campos sean manipulados
    protected $allowedFields = ['nombres', 'apellidos'];

    // Función para listar todos los registros
    public function listarNombres() {
        return $this->findAll();
    }
}