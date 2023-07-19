<?php
if (isset($_GET['i'])) {
    $codigo = $_GET['i'];
    require_once('../../controllers/municipio_controller.php');
    $controller = new MunicipioController();
    $result_municipio = $controller->BuscarMunicipioByCodigo($codigo);
    $numrows = mysqli_num_rows($result_municipio);

    if ($numrows != 0) {
        while ($row = mysqli_fetch_array($result_municipio)) {
            if (isset($row["codigo"])) {
                $codigo_bd = $row["codigo"];
            } else {
                $codigo_bd = "";
            }
            if (isset($row["descripcion"])) {
                $descripcion = $row["descripcion"];
            } else {
                $descripcion = "";
            }
            if (isset($row["Estado_Codigo"])) {
                $estado_codigo = $row["Estado_Codigo"];
            } else {
                $estado_codigo = "";
            }
        }
        ?>
        <div class="container">
            <div class="page-content">

                <hr>
                <h4>Actualización de Municipio</h4>
                <form action="?controller=Municipio&action=UpdateMunicipio1" method="POST">
                    <div class="col-12">
                        <br>
                        <div class="alert alert-success">
                            <div class="row">
                                <div class="col-6">
                                    <label for="codigo"><b>Código del Municipio:</b></label>
                                    <input class="form-control" type="text" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                    <br>
                                    <label for="descripcion"><b>Nueva Descripción:</b></label>
                                    <textarea class="form-control" name="descripcion" rows="4" required><?php echo $descripcion; ?></textarea>
                                    <br>
                                    <label for="estado_codigo"><b>Código del Estado:</b></label>
                                    <input class="form-control" type="text" name="estado_codigo" value="<?php echo $estado_codigo; ?>" readonly>
                                    <br>
                                </div>
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    } else {
        require_once('../../views/municipio/list_municipio.php');
    }
} else {
    require_once('../../views/municipio/list_municipio.php');
}
?>
