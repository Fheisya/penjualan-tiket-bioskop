<?php

namespace App\Controllers;

use App\Models\TiketModel;
use App\Models\StudioModel;
use App\Models\FilmModel;
use App\Models\JadwalModel;

class Tiket extends BaseController
{
    protected $tiketModel;
    protected $studioModel;
    protected $filmModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->tiketModel = new TiketModel();
        $this->studioModel = new StudioModel();
        $this->filmModel = new FilmModel();
        $this->jadwalModel = new JadwalModel();
    }

    // Display all tickets
    public function index()
    {
        $data = [
            'tbtiket' => $this->tiketModel->findAll(),
            'title' => "CineTix || Tiket",
            'judul' => "Data Tiket",
            'active' => "tiket"
        ];
        return view('admin/tiket/index', $data);
    }

    // Display the form to create a new ticket
    public function create()
    {
        $data = [
            'title' => "CineTix || Tiket",
            'judul' => "Tambah Data Tiket",
            'active' => "tiket",
            'jadwal' => $this->jadwalModel->findAll()  // Get all schedules
        ];

        return view('admin/tiket/create', $data);
    }

    // Handle ticket creation (insert data into the database)
    public function store()
    {
        $input = $this->request->getPost();

        // Validate input data
        if ($this->validate($this->getValidationRules())) {
            $data = [
                'harga' => $input['harga'],
                'jumlah' => $input['jumlah'],
                'tempat_duduk' => $input['tempat_duduk'],
                'id_jadwal' => $input['id_jadwal'],
            ];

            // Save data into the database
            $this->tiketModel->save($data);

            return redirect()->to(base_url('tiket'))->with('success', 'Data tiket berhasil ditambahkan.');
        } else {
            // If validation fails, redirect back with error messages
            return redirect()->to(base_url('tiket/create'))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    // Display the form to edit a ticket
    public function edit($id)
    {
        // Retrieve ticket by ID
        $tiket = $this->tiketModel->find($id);

        // If ticket not found, throw an exception
        if (!$tiket) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Tiket dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => "CineTix || Tiket",
            'judul' => "Ubah Data Tiket",
            'active' => "tiket",
            'tiket' => $tiket,  // Pass ticket data to the view
            'jadwal' => $this->jadwalModel->findAll()  // Get all schedules
        ];

        return view('admin/tiket/update', $data);
    }

    // Handle ticket update (edit data in the database)
    public function update($id)
    {
        $input = $this->request->getPost();

        // Validate input data
        if ($this->validate($this->getValidationRules())) {
            $data = [
                'harga' => $input['harga'],
                'jumlah' => $input['jumlah'],
                'tempat_duduk' => $input['tempat_duduk'],
            ];

            // Update ticket data in the database
            $this->tiketModel->update($id, $data);

            return redirect()->to(base_url('tiket'))->with('success', 'Data tiket berhasil diubah.');
        } else {
            // If validation fails, redirect back with error messages
            return redirect()->to(base_url("tiket/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    // Handle ticket deletion
    public function delete($id)
    {
        // Delete ticket from the database
        $this->tiketModel->delete($id);

        return redirect()->to(base_url('tiket'))->with('success', 'Tiket berhasil dihapus.');
    }

    // Private method to define validation rules (for reuse)
    private function getValidationRules()
    {
        return [
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong.',
                    'numeric' => 'Harga harus berupa angka.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Jumlah wajib diisi.',
                    'integer' => 'Jumlah harus berupa angka bulat.'
                ]
            ],
            'tempat_duduk' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Tempat duduk wajib diisi.',
                    'string' => 'Tempat duduk harus berupa teks.',
                    'max_length' => 'Tempat duduk tidak boleh melebihi 255 karakter.'
                ]
            ],
        ];
    }
}
