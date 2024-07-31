<?php

namespace App\Controllers;

use App\Models\ModelBarang;

class BarangController extends BaseController
{
    public function index()
    {
        $model = new ModelBarang();
        $data['barang'] = $model->findAll();
        
        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $model = new ModelBarang();
        $model->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
        ]);
        
        session()->setFlashdata('success', 'Barang berhasil ditambahkan.');
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $model = new ModelBarang();
        $data['barang'] = $model->find($id);

        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $model = new ModelBarang();
        $model->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
        ]);

        session()->setFlashdata('success', 'Barang berhasil diupdate.');
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $model = new ModelBarang();
        $model->delete($id);

        session()->setFlashdata('success', 'Barang berhasil dihapus.');
        return redirect()->to('/barang');
    }
}
