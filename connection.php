<?php
class config
{
    protected static $hostname = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "hospital";
}

class connection extends config
{
    public $connect;
    public function __construct()
    {
        $this->connect = mysqli_connect(parent::$hostname, parent::$username,
            parent::$password, parent::$database);
        if (mysqli_connect_errno()) {
            // echo "Koneksi database gagal : " . mysqli_connect_error();
        } else {
            // echo "koneksi database berhasil";
        }
    }
}

$koneksi = new connection();
?>