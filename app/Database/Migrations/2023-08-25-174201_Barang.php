<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_barang' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_barang_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'nama_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'kota_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'qty_barang' => [
                'type'          => 'BIGINT',
                'constraint'     => 20,
            ],
            'cabang_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->addForeignKey('jenis_barang_id', 'jenis_barang', 'id_jenis_barang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('cabang_id', 'cabang', 'id_cabang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('barang');

        // $this->db->enableForeignKeyChecks();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
