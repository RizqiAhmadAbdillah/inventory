<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Cabang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_cabang' => 'cabang 1',
                'kota_cabang' => 'malang',
            ],
            [
                'nama_cabang' => 'cabang 2',
                'kota_cabang' => 'surabaya',
            ],
            [
                'nama_cabang' => 'cabang 3',
                'kota_cabang' => 'sidoarjo',
            ],
            [
                'nama_cabang' => 'cabang 4',
                'kota_cabang' => 'jakarta',
            ],
        ];
        $this->db->table('cabang')->insert($data);
    }
}
