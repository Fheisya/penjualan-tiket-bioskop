<?php

namespace App\Controllers;

use App\Models\StudioModel;

class Studio extends BaseController
{
    protected $studioModel;
    protected $bioskopModel;
    public function __construct()
    {
        $this->studioModel = new StudioModel();
    }
    public function index()
    {
        $data = [
            'tbstudio' => $this->studioModel->getStudio(),
            'title' => "CineTix || Studio",
            'judul' => "Data Studio",
            'active' => "studio"
        ];
        return view('admin/studio/index', $data);
    }



    public function create()
    {
        $data = [
            'judul' => "Tambah Data Studio",
            'title' => "CineTix || Studio",
            'active' => "studio",
            'bioskop' => $this->studioModel->getBioskop(),
        ];
        return view('admin/studio/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_studio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama studio tidak boleh kosong.'
                ]
            ],
            'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapasitas wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_studio' => $this->request->getPost('nama_studio'),
                'kapasitas' => $this->request->getPost('kapasitas'),
                'id_bioskop' => $this->request->getPost('id_bioskop')
            ];

            $this->studioModel->save($data);

            return redirect()->to(base_url('studio'))->with('success', 'Data studio berhasil ditambahkan.');
        } else {
            $errors = implode(' ', $this->validator->getErrors());
            return redirect()->to(base_url('studio/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        $studio = $this->studioModel->find($id);
        $bioskop = $this->studioModel->getBioskop();
        if (!$studio) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Bioskop dengan ID $id tidak ditemukan");
        }

        $data = [
            'judul' => "Ubah Data Studio",
            'title' => "CineTix || Studio",
            'active' => "studio",
            'bioskop' => $bioskop,
            'studio' => $studio
        ];

        return view('admin/studio/update', $data);
    }
    public function update($id)
    {
        $input = $this->request->getPost();

        $rules = [
            'nama_studio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama studio tidak boleh kosong.'
                ]
            ],
            'kapasitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kapasitas wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_studio' => $input['nama_studio'],
                'kapasitas' => $input['kapasitas'],
                'id_bioskop' => $this->request->getPost('id_bioskop')
            ];

            $this->studioModel->update($id, $data);

            return redirect()->to(base_url('studio'))->with('success', 'Data studio berhasil diubah.');
        } else {
            return redirect()->to(base_url("studio/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $this->studioModel->delete($id);
        return redirect()->to('/studio')->with('success', 'Studio deleted successfully');
    }
}
