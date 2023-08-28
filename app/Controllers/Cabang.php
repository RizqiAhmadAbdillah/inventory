<?php

namespace App\Controllers;

use App\Models\CabangModel;

class Cabang extends BaseController
{
    protected $cabang;
    public function __construct()
    {
        $this->cabang = new CabangModel();
    }
    public function index()
    {
        $cabang = $this->cabang->paginate(7, 'cabang');
        $data = [
            'title' => 'Cabang',
            'cabang' => $cabang,
            'pager' => $this->cabang->pager,
        ];
        return view('pages/cabang/home', $data);
    }
    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $cabang = $this->cabang->search($keyword);
        $result = isset($cabang) ? $this->cabang->getCabang() : '';
        $data = [
            'title' => 'Hasil Pencarian Cabang',
            'cabang' => $result
        ];
        return view('pages/cabang/search_result', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Cabang',
            'cabang' => $this->cabang->getCabang($id)
        ];

        if (empty($data['cabang'])) {
            return view('pages/notfound', $data);
        }

        return view('pages/cabang/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];
        return view('pages/cabang/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_cabang' => [
                'rules' => 'required'
            ],
            'kota_cabang' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->to('/cabang')->withInput();
        }

        $this->cabang->save([
            'nama_cabang' => $this->request->getVar('nama_cabang'),
            'kota_cabang' => $this->request->getVar('kota_cabang'),
        ]);
        session()->setFlashdata('message', 'Data successfully added!');
        return redirect()->to('/cabang');
    }
    public function delete($id)
    {
        $this->cabang->delete($id);
        session()->setFlashdata('message', 'Data successfully deleted!');
        return redirect()->to('/cabang');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Cabang',
            'cabang' => $this->cabang->getCabang($id)
        ];
        return view('pages/cabang/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama_cabang' => [
                'rules' => 'required'
            ],
            'kota_cabang' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->to('/cabang')->withInput();
        }

        $this->cabang->save([
            'id_cabang' => $id,
            'nama_cabang' => $this->request->getVar('nama_cabang'),
            'kota_cabang' => $this->request->getVar('kota_cabang'),
        ]);
        session()->setFlashdata('message', 'Data successfully edited!');
        return redirect()->to('/cabang');
    }
}
