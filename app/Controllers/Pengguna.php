<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index(): string
    {

        $data = [
            'tbpengguna' => $this->penggunaModel->findAll(),
            'title' => "CineTix || Pengguna",
            'judul' => "Data Pengguna",
            'active' => "pengguna"
        ];
        return view('admin/pengguna/index', $data);
    }



    public function create()
    {
        $data = [
            'title' => "CineTix || Pengguna",
            'judul' => "Tambah Data Pengguna",
            'active' => "pengguna"
        ];
        return view('admin/pengguna/create', $data);
    }

    public function store()
    {
        $input = $this->request->getPost();

        // Aturan dan pesan error untuk validasi

        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi.'
                ]
            ],
            'kata_sandi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kata sandi wajib diisi.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telp tidak boleh kosong.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $this->penggunaModel->save([
                'nama' => $input['nama'],
                'email' => $input['email'],
                'kata_sandi' => $input['kata_sandi'],
                'no_telp' => $input['no_telp'],
            ]);

            return redirect()->to(base_url('pengguna'))->with('success', 'Data pengguna berhasil ditambahkan.');
        } else {
            // $errors = implode(' ', $this->validator->getErrors());
            return redirect()->to(base_url('pengguna/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        // Ambil data bioskop berdasarkan ID
        $pengguna = $this->penggunaModel->find($id);

        if (!$pengguna) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Bioskop dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => "CineTix || Pengguna",
            'judul' => "Edit Data Pengguna",
            'active' => "pengguna",
            'pengguna' => $pengguna  // Mengirimkan data bioskop yang akan diedit
        ];

        return view('admin/pengguna/update', $data);
    }


    public function update($id)
    {
        $input = $this->request->getPost();

        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama bioskop tidak boleh kosong.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi.'
                ]
            ],
            'kata_sandi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kata sandi wajib diisi.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telpon wajib diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role sandi wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama' => $input['nama'],
                'email' => $input['email'],
                'kata_sandi' => $input['kata_sandi'],
                'no_telp' => $input['no_telp'],
                'role' => $input['role'],
            ];

            $this->penggunaModel->update($id, $data);

            return redirect()->to(base_url('pengguna'))->with('success', 'Data pengguna berhasil diubah.');
        } else {
            return redirect()->to(base_url("pengguna/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    public function delete($id)
    {
        $this->penggunaModel->delete($id);
        return redirect()->to('/pengguna')->with('success', 'Pengguna deleted successfully');
    }
}
