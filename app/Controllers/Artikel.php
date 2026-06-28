<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    public function index()
    {
        $title   = 'Daftar Artikel';
        $model   = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori();
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model   = new ArtikelModel();
        $artikel = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.slug', $slug)
            ->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title       = 'Daftar Artikel (Admin)';
        $q           = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $sort        = $this->request->getVar('sort') ?? 'id-desc';
        $page        = (int) ($this->request->getVar('page') ?? 1);

        if ($this->request->isAJAX()) {
            $model = new ArtikelModel();
            $model->select('artikel.*, kategori.nama_kategori')
                  ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

            if ($q != '') {
                $model->like('artikel.judul', $q);
            }
            if ($kategori_id != '') {
                $model->where('artikel.id_kategori', $kategori_id);
            }

            // Sorting — whitelist field & arah biar aman dari SQL injection
            [$sortField, $sortDir] = array_pad(explode('-', $sort), 2, 'desc');
            if (!in_array($sortField, ['id', 'judul'], true)) {
                $sortField = 'id';
            }
            if (!in_array($sortDir, ['asc', 'desc'], true)) {
                $sortDir = 'desc';
            }
            $model->orderBy('artikel.' . $sortField, $sortDir);

            $artikel = $model->paginate(10, 'default', $page);
            $pager   = $model->pager;

            return $this->response->setJSON([
                'artikel' => $artikel,
                'pager'   => $pager->getDetails(),
            ]);
        }

        // Bukan AJAX (pertama kali buka halaman) — cuma render shell-nya,
        // datanya nanti diisi otomatis lewat AJAX pas halaman loaded.
        $kategoriModel = new KategoriModel();

        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'sort'        => $sort,
            'kategori'    => $kategoriModel->findAll(),
        ];

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $kategoriModel = new KategoriModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul'       => 'required',
            'id_kategori' => 'required|integer',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul')),
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
            return redirect('admin/artikel');
        }

        $title    = "Tambah Artikel";
        $kategori = $kategoriModel->findAll();
        return view('artikel/form_add', compact('title', 'kategori'));
    }

    public function edit($id)
    {
        $artikel       = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul'       => 'required',
            'id_kategori' => 'required|integer',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori'),
            ]);
            return redirect('admin/artikel');
        }

        $data = [
            'title'    => 'Edit Artikel',
            'artikel'  => $artikel->find($id),
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('artikel/form_edit', $data);
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        return redirect('admin/artikel');
    }
}