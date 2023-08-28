<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CabangModel;
use App\Models\JenisBarangModel;

class Barang extends BaseController
{
    protected $barang;
    protected $jenisbarang;
    protected $cabang;
    public function __construct()
    {
        $this->barang = new BarangModel();
        $this->jenisbarang = new JenisBarangModel();
        $this->cabang = new CabangModel();
    }
    public function index()
    {
        $data = $this->barang->getBarangPaginated(7);
        $data['jenisbarang'] = $this->jenisbarang->getJenisBarang();
        $data['cabang'] = $this->cabang->getCabang();
        $data['title'] = 'Barang';

        return view('pages/barang/home', $data);
    }
    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $data =  $this->barang->getBarangPaginated(10000, $keyword);
        $data['title'] = 'Barang';
        return view('pages/barang/search_result', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barang->getBarang($id)
        ];

        if (empty($data['barang'])) {
            return view('pages/notfound', $data);
        }

        return view('pages/barang/detail', $data);
    }
    public function create()
    {
        $jenisbarang = $this->jenisbarang->getJenisBarang();
        $cabang = $this->cabang->getCabang();
        // $validation = isset(session()->has('validation'))  ? session()->has('validation') : '';
        $data = [
            'title' => 'Add Barang',
            'barang' => $this->barang->getBarang(),
            'jenisbarang' => $jenisbarang,
            'cabang' => $cabang,
        ];
        return view('pages/barang/add', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required'
            ],
            'deskripsi_barang' => [
                'rules' => 'required'
            ],
            'qty_barang' => [
                'rules' => 'required|numeric|greater_than[0]'
            ],
        ])) {
            $validation_nama_barang = $this->validator->getError('nama_barang');
            $validation_deskripsi_barang = $this->validator->getError('deskripsi_barang');
            $validation_qty_barang = $this->validator->getError('qty_barang');
            // dd($validation);
            // dd($this->validator->getError('nama_barang'));
            return redirect()->back()->withInput()
                ->with('validation_nama_barang', $validation_nama_barang)
                ->with('validation_deskripsi_barang', $validation_deskripsi_barang)
                ->with('validation_qty_barang', $validation_qty_barang);
            // return redirect()->to('/barang/create')->withInput()->with('validation', $validation)->with('errors', $this->validator->getErrors());
            // return redirect()->to('/barang/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barang->save([
            'jenis_barang_id' => $this->request->getVar('jenis_barang_id'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'deskripsi_barang' => $this->request->getVar('deskripsi_barang'),
            'qty_barang' => $this->request->getVar('qty_barang'),
            'cabang_id' => $this->request->getVar('cabang_id'),
        ]);
        session()->setFlashdata('message', 'Data successfully added!');
        return redirect()->to('/barang');
    }
    public function delete($id)
    {
        $this->barang->delete($id);
        session()->setFlashdata('message', 'Data successfully deleted!');
        return redirect()->to('/barang');
    }
    public function edit($id)
    {
        $jenisbarang = $this->jenisbarang->getJenisBarang();
        $cabang = $this->cabang->getCabang();
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->barang->getBarang($id),
            'jenisbarang' => $jenisbarang,
            'cabang' => $cabang,
        ];
        return view('pages/barang/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required'
            ],
            'deskripsi_barang' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->to('/barang')->withInput();
        }

        $this->barang->save([
            'id_barang' => $id,
            'jenis_barang_id' => $this->request->getVar('jenis_barang_id'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'deskripsi_barang' => $this->request->getVar('deskripsi_barang'),
            'qty_barang' => $this->request->getVar('qty_barang'),
            'cabang_id' => $this->request->getVar('cabang_id'),
        ]);
        session()->setFlashdata('message', 'Data successfully edited!');
        return redirect()->to('/barang');
    }
}
