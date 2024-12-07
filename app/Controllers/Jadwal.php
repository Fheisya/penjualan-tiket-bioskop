<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\StudioModel;
use App\Models\FilmModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $studioModel;
    protected $filmModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->studioModel = new StudioModel(); // Pastikan model Studio dibuat
        $this->filmModel = new FilmModel();     // Pastikan model Film dibuat
    }

    public function index()
    {
        $data = [
            'tbjadwal' => $this->jadwalModel->findAll(),
            'title' => "CineTix || Jadwal",
            'judul' => "Data Jadwal",
            'active' => "jadwal",
        ];
        return view('admin/jadwal/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "CineTix || Jadwal",
            'judul' => "Tambah Data Jadwal",
            'studio' => $this->studioModel->findAll(),
            'film' => $this->filmModel->findAll(),
            'active' => "jadwal",
        ];
        return view('admin/jadwal/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tgl' => 'required|valid_date',
            'id_studio' => 'required|integer',
            'id_film' => 'required|integer',
            'jam' => 'required|regex_match[/^(?:[01]\d|2[0-3]):[0-5]\d$/]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'tgl' => $this->request->getPost('tgl'),
            'id_studio' => $this->request->getPost('id_studio'),
            'id_film' => $this->request->getPost('id_film'),
            'jam' => $this->request->getPost('jam'),
        ];
        $this->jadwalModel->save($data);
        return redirect()->to('/jadwal')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = $this->jadwalModel->find($id);

        if (!$jadwal) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Jadwal dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => "CineTix || Jadwal",
            'judul' => "Edit Data Jadwal",
            'active' => "jadwal",
            'jadwal' => $jadwal,
            'studio' => $this->studioModel->findAll(),
            'film' => $this->filmModel->findAll(),
        ];
        return view('admin/jadwal/update', $data);
    }

    public function update($id)
    {
        $input = $this->request->getPost();
        if (!$this->validate([
            'id_studio' => 'required|integer',
            'id_film' => 'required|integer',
            'tgl' => 'required|valid_date',
            'jam' => [
                'rules' => 'required|regex_match[/^(2[0-3]|[01][0-9]):([0-5][0-9])$/]',
                'errors' => [
                    'regex_match' => 'Format jam harus valid (HH:MM).'
                ]
            ]
        ])) {
            return redirect()->to(base_url("jadwal/update/$id"))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $data = [
            'id_studio' => $input['id_studio'],
            'id_film' => $input['id_film'],
            'tgl' => $input['tgl'],
            'jam' => $input['jam'],
        ];
        $this->jadwalModel->update($id, $data);
        return redirect()->to(base_url('jadwal'))->with('success', 'Data jadwal berhasil diubah.');
    }

    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/jadwal')->with('success', 'Jadwal berhasil dihapus.');
    }
}
