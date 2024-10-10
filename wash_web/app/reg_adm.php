<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    //require_one.'core/class.dbconfig,php';
//$conn->dbconnection();
    session_start();
    require_once 'core/class.adm.php';
    $regadmin = new adm();
    
    if (isset($_POST['regadm'])) {
        $fname = trim($_POST['nombre']);
        $age = trim($_POST['edad']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['contraseña']);

        $data =$regadmin->runQuery("SELECT * FROM admin WHERE email = :email ");
        $data->execute(array(":email"=> $email));
        $data->fetch(PDO::FETCH_ASSOC);

        if($data->rowCount()> 0) {
        $msg = array("disculpa, el email ya existe, utiliza otro","danger");
        } else {

        if ($regadmin->reg_adm($fname, $age, $email, $pass)) {
            $msg = array("datos ingresados","success");
        } else {
            echo "lo siento no se puede guardar tus datos";

        }

        }
    }
    ?>
</body>

</html>