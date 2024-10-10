<?php
$updadm = new adm();

if (isset($_POST['btn-updadm'])) {
    $idadm = trim($_POST['idadm']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $pass = md5(trim($_POST['pass']));

    $data = $updadm->runQuery("SELECT * FROM adm WHERE pass=:pass");
    $data->execute(array(":pass" => $pass));
    $data->fetch(PDO::FETCH_ASSOC);

    if ($data->rowCount() > 0) {
        $updadm->upd_adm($idadm, $fname, $lname, $email);
        $msg = array("Datos Actualizados", "success");
    } else {
        $msg = array("La contraseña no es correcta", "danger");
    }
}
?>

<!--Section Alerts-->
<?php if (isset($msg)) { ?>
    <div class="alert alert-<?php echo $msg[1] ?> alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="location.href='homead?pg=perfilad';"></button>
        <strong>Alerta!</strong> <?php echo $msg[0] ?>
    </div>
<?php } ?>
<!--Section Alerts-->

<div class="card" style="width:400px">
    <div class="text-center">
        <i class="bi bi-person-bounding-box" style="font-size:75px;"></i>
    </div>
    <div class="card-body">
        <h4 class="card-title"><?php echo $row['fname'] . " " . $row['lname']; ?></h4>
        <p class="card-text"><?php echo $row['email']; ?></p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">Editar</button>
    </div>
</div>

<!-- The Modal perfil-->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Perfil</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="my-3">
                        <label for="fname" class="form-label">Nombres</label>
                        <input type="hidden" name="idadm" id="idadm" value="<?php echo $row['idadm']; ?>">
                        <input type="text" class="form-control" id="fname" name="fname"
                            value="<?php echo $row['fname']; ?>">
                    </div>
                    <div class="my-3">
                        <label for="lname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="lname" name="lname"
                            value="<?php echo $row['lname']; ?>">
                    </div>
                    <div class="my-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="my-3">
                        <label for="pass" class="form-label">Para cambiar datos debes escribir la Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="btn-updadm">Aceptar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- The Modal perfil-->