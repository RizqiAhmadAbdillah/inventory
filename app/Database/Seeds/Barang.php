<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_barang_id' => 1,
                'nama_barang' => 'komputer',
                'deskripsi_barang' => 'komputer besar merah',
                'qty_barang' => 1,
                'cabang_id' => 1,
            ],
            [
                'jenis_barang_id' => 4,
                'nama_barang' => 'teflon',
                'deskripsi_barang' => 'teflon anti karat',
                'qty_barang' => 2,
                'cabang_id' => 3,
            ],
            [
                'jenis_barang_id' => 6,
                'nama_barang' => 'sepeda',
                'deskripsi_barang' => 'sepeda pancal biru',
                'qty_barang' => 1,
                'cabang_id' => 2,
            ],
        ];
        $this->db->table('barang')->insert($data);
    }
}
