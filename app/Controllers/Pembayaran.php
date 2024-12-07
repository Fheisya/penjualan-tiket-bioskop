<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PemesananModel;

class Pembayaran extends BaseController
{
    protected $pembayaranModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data = [
            'tbpembayaran' => $this->pembayaranModel->getPembayaranWithPemesanan(),
            'title' => "CineTix || Pembayaran",
            'judul' => "Data Pembayaran",
            'active' => "pembayaran"
        ];
        return view('admin/pembayaran/index', $data);
    }


    public function create()
    {
        $data = [
            'title' => "CineTix || Pembayaran",
            'judul' => "Tambah Data Pembayaran",
            'active' => "pembayaran",
            'pemesanan' => $this->pemesananModel->findAll()
        ];
        return view('admin/pembayaran/create', $data);
    }

    public function store()
    {
        $rules = [
            'id_pemesanan' => [
                'rules' => 'required|is_not_unique[pemesanan.id_pemesanan]',
                'errors' => [
                    'required' => 'ID Pemesanan wajib dipilih.',
                    'is_not_unique' => 'ID Pemesanan tidak valid atau tidak ditemukan.'
                ]
            ],
            'tgl_pembayaran' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal pembayaran tidak boleh kosong.',
                    'valid_date' => 'Format tanggal harus YYYY-MM-DD.'
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Metode pembayaran harus dipilih.'
                ]
            ],
            'jmlh_pembayaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah pembayaran wajib diisi.',
                    'numeric' => 'Jumlah pembayaran harus berupa angka.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'id_pemesanan' => $this->request->getPost('id_pemesanan'),
                'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
                'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                'jmlh_pembayaran' => $this->request->getPost('jmlh_pembayaran'),
            ];

            $this->pembayaranModel->save($data);

            return redirect()->to(base_url('pembayaran'))->with('success', 'Data pembayaran berhasil ditambahkan.');
        } else {
            return redirect()->to(base_url('pembayaran/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        $pembayaran = $this->pembayaranModel->find($id);

        if (!$pembayaran) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pembayaran dengan ID $id tidak ditemukan.");
        }
        $data = [
            'title' => "CineTix || Pembayaran",
            'judul' => "Edit Data Pembayaran",
            'active' => "pembayaran",
            'pembayaran' => $pembayaran,
            'pemesanan' => $this->pemesananModel->findAll()
        ];
        return view('admin/pembayaran/update', $data);
    }

    public function update($id)
    {
        $input = $this->request->getPost();
        $rules = [
            'id_pemesanan' => [
                'rules' => 'required|is_not_unique[pemesanan.id_pemesanan]',
                'errors' => [
                    'required' => 'ID Pemesanan wajib dipilih.',
                    'is_not_unique' => 'ID Pemesanan tidak valid.'
                ]
            ],
            'tgl_pembayaran' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal pembayaran tidak boleh kosong.',
                    'valid_date' => 'Format tanggal harus YYYY-MM-DD.'
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Metode pembayaran wajib diisi.'
                ]
            ],
            'jmlh_pembayaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah pembayaran wajib diisi.',
                    'numeric' => 'Jumlah pembayaran harus berupa angka.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'id_pemesanan' => $input['id_pemesanan'],
                'tgl_pembayaran' => $input['tgl_pembayaran'],
                'metode_pembayaran' => $input['metode_pembayaran'],
                'jmlh_pembayaran' => $input['jmlh_pembayaran'],
            ];

            $this->pembayaranModel->update($id, $data);

            return redirect()->to(base_url('pembayaran'))->with('success', 'Data pembayaran berhasil diubah.');
        } else {
            return redirect()->to(base_url("pembayaran/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        try {
            $this->pembayaranModel->delete($id);
            return redirect()->to('/pembayaran')->with('success', 'pembayaran berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to('/pembayaran')->with('errors', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
