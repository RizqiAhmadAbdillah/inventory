<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_barang' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jenis_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_jenis_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_jenis_barang', true);
        $this->forge->createTable('jenis_barang');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_barang');
    }
}
