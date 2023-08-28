<?php

namespace App\Controllers;

use App\Models\JenisBarangModel;

class JenisBarang extends BaseController
{
    protected $jenisbarang;
    public function __construct()
    {
        $this->jenisbarang = new JenisBarangModel();
    }
    public function index()
    {
        $jenisbarang = $this->jenisbarang->paginate(7, 'jenis_barang');
        $data = [
            'title' => 'Jenis Barang',
            'jenisbarang' => $jenisbarang,
            'pager' => $this->jenisbarang->pager
        ];
        return view('pages/jenisbarang/home', $data);
    }
    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $jenisbarang = $this->jenisbarang->search($keyword);
        $result = isset($jenisbarang) ? $this->jenisbarang->getJenisBarang() : '';
        $data = [
            'title' => 'Hasil Pencarian Jenis Barang',
            'jenisbarang' => $result
        ];
        return view('pages/jenisbarang/search_result', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Jenis Barang',
            'jenisbarang' => $this->jenisbarang->getJenisBarang($id)
        ];

        if (empty($data['jenisbarang'])) {
            return view('pages/notfound', $data);
        }

        return view('pages/jenisbarang/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('pages/jenisbarang/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_jenis_barang' => [
                'rules' => 'required'
            ],
            'deskripsi_jenis_barang' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->to('/jenisbarang')->withInput();
        }

        $this->jenisbarang->save([
            'nama_jenis_barang' => $this->request->getVar('nama_jenis_barang'),
            'deskripsi_jenis_barang' => $this->request->getVar('deskripsi_jenis_barang'),
        ]);
        session()->setFlashdata('message', 'Data successfully added!');
        return redirect()->to('/jenisbarang');
    }
    public function delete($id)
    {
        $this->jenisbarang->delete($id);
        session()->setFlashdata('message', 'Data successfully deleted!');
        return redirect()->to('/jenisbarang');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Jenis Barang',
            'jenisbarang' => $this->jenisbarang->getJenisBarang($id)
        ];
        return view('pages/jenisbarang/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama_jenis_barang' => [
                'rules' => 'required'
            ],
            'deskripsi_jenis_barang' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->to('/jenisbarang')->withInput();
        }

        $this->jenisbarang->save([
            'id_jenis_barang' => $id,
            'nama_jenis_barang' => $this->request->getVar('nama_jenis_barang'),
            'deskripsi_jenis_barang' => $this->request->getVar('deskripsi_jenis_barang'),
        ]);
        session()->setFlashdata('message', 'Data successfully edited!');
        return redirect()->to('/jenisbarang');
    }
}
