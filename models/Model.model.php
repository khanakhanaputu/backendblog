<?php

class Model extends Database
{
    public function __construct()
    {
        // Inisialisasi koneksi database atau resource lain di sini
        parent::__construct();
    }

    public function getAll($table)
    {
        // Ambil semua data dari tabel
        $query = "SELECT * FROM $table";
        $hasil = mysqli_query($this->connect, $query);
        $data = [];
        if (mysqli_num_rows($hasil) > 0) {
            while ($row = mysqli_fetch_assoc($hasil)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById($table, $field, $id)
    {
        // Ambil satu data berdasarkan ID
        $query = "SELECT * FROM $table WHERE $field='$id'";
        return mysqli_query($this->connect, $query);
    }

    public function create($table, ...$data)
    {
        foreach ($data as $rows) {
            $datanya = implode(",", $rows);
            $query = "INSERT INTO $table VALUES (" . $datanya . ")";
        }
        mysqli_query($this->connect, $query);
    }

    public function update($id, $data)
    {
        // Update data berdasarkan ID
    }

    public function delete($id)
    {
        // Hapus data berdasarkan ID
    }
}