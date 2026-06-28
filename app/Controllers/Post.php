<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    // Baca body request, support JSON (dari VueJS/axios) maupun
    // form-urlencoded (dari Postman, atau form HTML biasa).
    private function getInputData(): array
    {
        $json = $this->request->getJSON(true);
        if (is_array($json)) {
            return $json;
        }

        $raw = $this->request->getRawInput();
        if (is_array($raw) && count($raw) > 0) {
            return $raw;
        }

        return [
            'judul' => $this->request->getVar('judul'),
            'isi'   => $this->request->getVar('isi'),
        ];
    }

    public function index()
    {
        $model = new ArtikelModel();
        $data  = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data  = $model->find($id);

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Data tidak ditemukan.');
    }

    public function create()
    {
        $input = $this->getInputData();
        $judul = $input['judul'] ?? null;

        if (empty($judul)) {
            return $this->failValidationErrors('Judul wajib diisi.');
        }

        $model = new ArtikelModel();
        $model->insert([
            'judul'  => $judul,
            'isi'    => $input['isi'] ?? null,
            'slug'   => url_title($judul, '-', true),
            'status' => $input['status'] ?? 0,
        ]);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil ditambahkan.',
            ],
        ];

        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $model = new ArtikelModel();

        if (!$model->find($id)) {
            return $this->failNotFound('Data tidak ditemukan.');
        }

        $input = $this->getInputData();

        $model->update($id, [
            'judul'  => $input['judul'] ?? null,
            'isi'    => $input['isi'] ?? null,
            'status' => $input['status'] ?? 0,
        ]);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil diubah.',
            ],
        ];

        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new ArtikelModel();

        if (!$model->find($id)) {
            return $this->failNotFound('Data tidak ditemukan.');
        }

        $model->delete($id);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data artikel berhasil dihapus.',
            ],
        ];

        return $this->respondDeleted($response);
    }
}