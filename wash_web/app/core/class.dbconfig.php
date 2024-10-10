<?php
class database
{
    private $host = "localhost";
    private $dbname = "washweb";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    public $conn;

    public function dbconnection()
    {
        $this->conn = null;
        try {


            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $error) {
            echo "Conexión con error:" . $error->getMessage();

        }
        return $this->conn;
    }

}
?>