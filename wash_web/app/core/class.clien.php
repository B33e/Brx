<?php
require_once 'class.dbconfig.php';

class clien
{
    //declarar variables

    private $conn;

    public function __construct()
    {
        $database = new database();
        $db = $database->dbconnection();
        $this->conn = $db;
    }
    public function runQuery($sql)
    {
        $temp = $this->conn->prepare($sql);
        return $temp;
    }


    public function reg_cliente($nombre, $correo, $telefono, $user, $clave)
    {
        try {
            $epass = md5($clave);
            $temp = $this->conn->prepare("INSERT INTO cliente (nombre, correo, telefono, user, clave) VALUES (?,?,?,?,?)");
            $temp->bindparam(1, $nombre);
            $temp->bindparam(2, $correo);
            $temp->bindparam(3, $telefono);
            $temp->bindparam(4, $user);
            $temp->bindparam(5, $epass);
            $temp->execute();
            return $temp;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function login($user, $clave)
    {
        try {
            $temp = $this->conn->prepare('SELECT * FROM cliente WHERE user=:user');
            $temp->execute(array(':user' => $user));
            $usrrow = $temp->fetch(PDO::FETCH_ASSOC);

            if ($usrrow['clave'] == md5($clave)) {
                $_SESSION['usrsession'] = $usrrow['idcliente'];
                return true;
            } else {
                header('location: ./inicio?error');
                exit;
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function logged_in()
    {
        if (isset($_SESSION['usrsession'])) {
            return true;
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        $_SESSION['usrsession'] = false;
    }
    public function redirect($url)
    {
        header("location: $url");
    }
}
