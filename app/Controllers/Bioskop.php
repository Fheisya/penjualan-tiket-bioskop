<?php

namespace App\Controllers;

use App\Models\BioskopModel;

class Bioskop extends BaseController
{
    protected $bioskopModel;
    public function __construct()
    {
        $this->bioskopModel = new BioskopModel();
    }
    public function index(): string
    {

        $data = [
            'tbbioskop' => $this->bioskopModel->findAll(),
            'title' => "CineTix || Bioskop",
            'judul' => "Data Bioskop",
            'active' => "bioskop"
        ];
        return view('admin/bioskop/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "CineTix || Bioskop",
            'judul' => "Tambah Data Bioskop",
            'active' => "bioskop"
        ];
        return view('admin/bioskop/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_bioskop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama bioskop tidak boleh kosong.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi wajib diisi.'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota wajib diisi.'
                ]
            ]
        ];

        // Validasi input
        if ($this->validate($rules)) {
            // Menyimpan input yang valid ke dalam variabel $data
            $data = [
                'nama_bioskop' => $this->request->getPost('nama_bioskop'),
                'lokasi' => $this->request->getPost('lokasi'),
                'kota' => $this->request->getPost('kota'),
            ];

            $this->bioskopModel->save($data);

            return redirect()->to(base_url('bioskop'))->with('success', 'Data bioskop berhasil ditambahkan.');
        } else {
            // Menampilkan pesan error
            $errors = implode(' ', $this->validator->getErrors());
            return redirect()->to(base_url('bioskop/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    public function edit($id)
    {
        // Ambil data bioskop berdasarkan ID
        $bioskop = $this->bioskopModel->find($id);

        if (!$bioskop) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Bioskop dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => "CineTix || Edit Bioskop",
            'judul' => "Edit Data Bioskop",
            'active' => "bioskop",
            'bioskop' => $bioskop  // Mengirimkan data bioskop yang akan diedit
        ];

        return view('admin/bioskop/update', $data);
    }

    public function update($id)
    {
        $input = $this->request->getPost();

        $rules = [
            'nama_bioskop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama bioskop tidak boleh kosong.'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi wajib diisi.'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_bioskop' => $input['nama_bioskop'],
                'lokasi' => $input['lokasi'],
                'kota' => $input['kota'],
            ];

            $this->bioskopModel->update($id, $data);

            return redirect()->to(base_url('bioskop'))->with('success', 'Data bioskop berhasil diubah.');
        } else {
            return redirect()->to(base_url("bioskop/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        try {
            $this->bioskopModel->delete($id);
            return redirect()->to('/bioskop')->with('success', 'Bioskop deleted successfully');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            if ($e->getCode() == 1451) {
                return redirect()->to('/bioskop')->with('error', 'Tidak dapat menghapus bioskop ini karena masih ada tabel studio yang terkait.');
            }
            // Menangani error lainnya jika diperlukan
            return redirect()->to('/bioskop')->with('error', 'Terjadi kesalahan saat menghapus data bioskop.');
        }
    }
}
