<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisBarang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jenis_barang' => 'elektronik',
                'deskripsi_jenis_barang' => 'jenis barang elektronik',
            ],
            [
                'nama_jenis_barang' => 'organik',
                'deskripsi_jenis_barang' => 'jenis barang organik',
            ],
            [
                'nama_jenis_barang' => 'plastik baru',
                'deskripsi_jenis_barang' => 'jenis barang plastik baru',
            ],
            [
                'nama_jenis_barang' => 'alat dapur',
                'deskripsi_jenis_barang' => 'jenis barang alat dapur',
            ],
            [
                'nama_jenis_barang' => 'perabotan',
                'deskripsi_jenis_barang' => 'jenis barang perabotan',
            ],
            [
                'nama_jenis_barang' => 'kendaraan',
                'deskripsi_jenis_barang' => 'jenis barang kendaraan',
            ],
        ];
        $this->db->table('jenis_barang')->insert($data);
    }
}
