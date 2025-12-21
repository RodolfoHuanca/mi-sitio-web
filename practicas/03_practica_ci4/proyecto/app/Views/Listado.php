<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title><?php echo $titulo; ?></title>
  </head>
  <body>
    <div class="container mt-4">
        <h1>CRUD con CodeIgniter 4</h1>
        
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Guardar Registro</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos as $persona): ?>
                            <tr>
                                <td><?php echo $persona['id']; ?></td>
                                <td><?php echo $persona['nombres']; ?></td>
                                <td><?php echo $persona['apellidos']; ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar/'.$persona['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>