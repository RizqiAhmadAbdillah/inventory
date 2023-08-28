<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBarangModel extends Model
{
    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jenis_barang';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_jenis_barang', 'deskripsi_jenis_barang'];

    public function getJenisBarang($id = false)
    {
        if (!$id) {
            return $this->findAll();
        }

        return $this->where(['id_jenis_barang' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('jenis_barang')->like('nama_jenis_barang', $keyword)->orLike('deskripsi_jenis_barang', $keyword);
    }
}
