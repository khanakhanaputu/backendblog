<?php

class Database
{
    protected $db;
    private $username;
    private $password;
    private $host;
    protected $connect;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root"; // atau username kamu sendiri
        $this->password = "";
        $this->db = "dummy"; // pastikan database "dummy" sudah dibuat

        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->db);

        if (!$this->connect) {
            die("Gagal koneksi ke database: " . mysqli_connect_error());
        }
    }
}
