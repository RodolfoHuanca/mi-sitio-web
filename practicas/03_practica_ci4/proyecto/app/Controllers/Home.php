<?php namespace App\Controllers;

use App\Models\CrudModel; // Importamos nuestro modelo

class Home extends BaseController {
    
    public function index() {
        $model = new CrudModel();
        $datos = $model->listarNombres(); // Obtenemos los datos de la BD

        $data = [
            "titulo" => "CRUD con CodeIgniter 4",
            "datos" => $datos
        ];

        // Enviamos los datos a la vista llamada 'listado'
        return view('listado', $data);
    }

    public function crear() {
        $model = new CrudModel();
    
        // Recogemos los datos del formulario POST
        $data = [
            "nombres" => $_POST['nombres'],
            "apellidos" => $_POST['apellidos']
        ];

        // El modelo inserta los datos automáticamente
        if ($model->insert($data)) {
            return redirect()->to(base_url());
        }
    }


    public function eliminar($id = null) {
        $model = new CrudModel();

        // Ejecuta el borrado basado en el ID
        if ($model->delete($id)) {
            return redirect()->to(base_url());
        }
    }


}