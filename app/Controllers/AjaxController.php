<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        $title = 'Data Artikel (AJAX)';
        return view('ajax/index', compact('title'));
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data  = $model->findAll();

        return $this->response->setJSON($data);
    }

    public function store()
    {
        $judul = $this->request->getPost('judul');

        if (empty($judul)) {
            return $this->response->setJSON([
                'status'  => 'ERROR',
                'message' => 'Judul wajib diisi.',
            ]);
        }

        $model = new ArtikelModel();
        $model->insert([
            'judul'  => $judul,
            'isi'    => $this->request->getPost('isi'),
            'slug'   => url_title($judul, '-', true),
            'status' => 0,
        ]);

        return $this->response->setJSON([
            'status'  => 'OK',
            'message' => 'Artikel berhasil ditambahkan.',
        ]);
    }

    public function update($id)
    {
        $judul = $this->request->getPost('judul');

        if (empty($judul)) {
            return $this->response->setJSON([
                'status'  => 'ERROR',
                'message' => 'Judul wajib diisi.',
            ]);
        }

        $model = new ArtikelModel();
        $model->update($id, [
            'judul' => $judul,
            'isi'   => $this->request->getPost('isi'),
        ]);

        return $this->response->setJSON([
            'status'  => 'OK',
            'message' => 'Artikel berhasil diubah.',
        ]);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);

        return $this->response->setJSON([
            'status' => 'OK',
        ]);
    }
}