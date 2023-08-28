<?php

namespace App\Models;

use CodeIgniter\Model;

class CabangModel extends Model
{
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_cabang', 'kota_cabang'];
    public function getCabang($id = false)
    {
        if (!$id) {
            return $this->findAll();
        }

        return $this->where(['id_cabang' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('cabang')->like('nama_cabang', $keyword)->orLike('kota_cabang', $keyword);
    }
}
