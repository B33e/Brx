<?php
require_once 'class.dbconfig.php';

class adm
{
    //Declarar variables

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

    public function reg_adm($fname, $age, $email, $pass)
    {
        try {
            $epass = md5($pass);
            $temp = $this->conn->prepare("INSERT INTO admin(name,age,email,pass) VALUES(?,?,?,?)");
            $temp->bindParam(1, $name);
            $temp->bindParam(2, $age);
            $temp->bindParam(3, $email);
            $temp->bindParam(4, $epass);
            $temp->execute();
            return $temp;

        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
    public function login($email, $pass)
    {

        try {
            $temp = $this->conn->prepare('SELECT * FROM admin WHERE email=:email');
            $temp->execute(array(":email" => $email));
            $admrow = $temp->fetch(PDO::FETCH_ASSOC);

            if ($admrow['pass'] == md5($pass)) {
                $_SESSION['admsession'] = $admrow['idadmin'];
                return true;
            } else {
                header('location: ./?error');
                exit;

            }


        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function logged_in()
    {
        if (isset($_SESSION['admsession'])) {
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['admsession'] = false;
    }

    public function redirect($url)
    {
        header("location: $url");
    }
}