<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_barang', 'jenis_barang_id', 'deskripsi_barang', 'qty_barang', 'cabang_id'];

    public function getBarang($id = false)
    {
        if (!$id) {
            $builder = $this->builder();
            $builder
                ->join('jenis_barang', 'jenis_barang.id_jenis_barang=barang.jenis_barang_id')
                ->join('cabang', 'cabang.id_cabang=barang.cabang_id')
                ->orderBy('id_barang', 'DESC');

            $query = $builder->get();
            return $query->getResultArray();
            // return [
            //     'barang' => $this->builder,
            // ];
        }

        return $this->where(['id_barang' => $id])
            ->join('jenis_barang', 'jenis_barang.id_jenis_barang=barang.jenis_barang_id')
            ->join('cabang', 'cabang.id_cabang=barang.cabang_id')
            ->first();
    }
    public function getBarangPaginated($num, $keyword = false)
    {
        $builder = $this->builder();
        $builder
            ->join('jenis_barang', 'jenis_barang.id_jenis_barang=barang.jenis_barang_id')
            ->join('cabang', 'cabang.id_cabang=barang.cabang_id')
            ->orderBy('id_barang', 'DESC');
        if ($keyword) {
            $builder
                ->like('nama_barang', $keyword)
                ->orLike('deskripsi_barang', $keyword)
                ->orLike('qty_barang', $keyword)
                ->orLike('nama_jenis_barang', $keyword)
                ->orLike('nama_cabang', $keyword);
        }
        return [
            'barang' => $this->paginate($num, 'barang'),
            'pager' => $this->pager
        ];
    }
    public function search($keyword)
    {
        return $this->table('barang')
            ->like('nama_barang', $keyword)
            ->orLike('deskripsi_barang', $keyword)
            ->orLike('qty_barang', $keyword)
            ->orLike('nama_jenis_barang', $keyword)
            ->orLike('nama_cabang', $keyword);
    }
}
