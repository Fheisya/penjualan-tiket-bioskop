<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\TiketModel;
use App\Models\PenggunaModel;

class Pemesanan extends BaseController
{
    protected $pemesananModel;
    protected $tiketModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
        $this->tiketModel = new TiketModel();
        $this->penggunaModel = new PenggunaModel();
    }

    // Menampilkan semua data pemesanan
    public function index()
    {
        $data = [
            'tbpemesanan' => $this->pemesananModel
                ->select('pemesanan.*, pengguna.nama as nama_pengguna, tiket.id_tiket as judul_tiket, tiket.harga as harga_tiket')
                ->join('pengguna', 'pemesanan.id_pengguna = pengguna.id_pengguna', 'left')
                ->join('tiket', 'pemesanan.id_tiket = tiket.id_tiket', 'left')
                ->findAll(),
            'title' => "CineTix || Pemesanan",
            'judul' => "Data Pemesanan",
            'active' => "pemesanan"
        ];
        return view('admin/pemesanan/index', $data);
    }

    // Menampilkan form tambah data pemesanan
    public function create()
    {
        $data = [
            'title' => "CineTix || Pemesanan",
            'judul' => "Tambah Data Pemesanan",
            'active' => "pemesanan",
            'tiket' => $this->tiketModel->findAll(),
            'pengguna' => $this->penggunaModel->findAll()
        ];
        return view('admin/pemesanan/create', $data);
    }

    public function store()
    {
        $input = $this->request->getPost();

        $rules = [
            'tgl_pemesanan' => 'required|valid_date',
            'jumlh_tiket' => 'required|integer',
            'total_harga' => 'required|numeric',
            'id_pengguna' => 'required|is_not_unique[pengguna.id_pengguna]',
            'id_tiket' => 'required|is_not_unique[tiket.id_tiket]',
        ];

        if ($this->validate($rules)) {
            try {
                $this->pemesananModel->save([
                    'tgl_pemesanan' => $input['tgl_pemesanan'],
                    'jumlh_tiket' => $input['jumlh_tiket'],
                    'total_harga' => $input['total_harga'],
                    'id_pengguna' => $input['id_pengguna'],
                    'id_tiket' => $input['id_tiket'],
                ]);

                return redirect()->to(base_url('pemesanan'))->with('success', 'Data pemesanan berhasil ditambahkan.');
            } catch (\Exception $e) {
                return redirect()->to(base_url('pemesanan/create'))->withInput()->with('errors', $e->getMessage());
            }
        } else {
            return redirect()->to(base_url('pemesanan/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        $pemesanan = $this->pemesananModel->find($id);

        if (!$pemesanan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pemesanan dengan ID $id tidak ditemukan.");
        }

        $data = [
            'title' => "CineTix || Pemesanan",
            'judul' => "Edit Pemesanan",
            'active' => "pemesanan",
            'pemesanan' => $pemesanan,
            'tiket' => $this->tiketModel->findAll(),
            'pengguna' => $this->penggunaModel->findAll()
        ];

        return view('admin/pemesanan/update', $data);
    }

    public function update($id)
    {
        $input = $this->request->getPost();

        $rules = [
            'Tgl_pemesanan' => 'required|valid_date',
            'jumlh_tiket' => 'required|integer',
            'total_harga' => 'required|numeric',
        ];

        if ($this->validate($rules)) {
            try {
                $this->pemesananModel->update($id, [
                    'Tgl_pemesanan' => $input['Tgl_pemesanan'],
                    'jumlh_tiket' => $input['jumlh_tiket'],
                    'total_harga' => $input['total_harga'],
                ]);

                return redirect()->to(base_url('pemesanan'))->with('success', 'Data pemesanan berhasil diubah.');
            } catch (\Exception $e) {
                return redirect()->to(base_url("pemesanan/edit/$id"))->withInput()->with('errors', $e->getMessage());
            }
        } else {
            return redirect()->to(base_url("pemesanan/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        try {
            $this->pemesananModel->delete($id);
            return redirect()->to('/pemesanan')->with('success', 'Pemesanan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->to('/pemesanan')->with('errors', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
