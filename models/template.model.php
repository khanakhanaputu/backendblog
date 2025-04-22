<?php

class UserModel extends Database
{
    public function __construct()
    {
        // Inisialisasi koneksi database atau resource lain di sini
        parent::__construct();
    }

    public function getAll()
    {
        // Ambil semua data dari tabel
    }

    public function getById($id)
    {
        // Ambil satu data berdasarkan ID
    }

    public function create($data)
    {
        // Tambahkan data baru ke tabel
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
