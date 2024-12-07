<?php

namespace App\Controllers;

use App\Models\FilmModel;

class Film extends BaseController
{
    protected $filmModel;
    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }
    public function index()
    {
        $data = [
            'tbfilm' => $this->filmModel->findAll(),
            'title' => "CineTix || Film",
            'judul' => "Data Film",
            'active' => "film"
        ];
        return view('admin/film/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => "CineTix || Film",
            'judul' => "Tambah Data Film",
            'active' => "film"
        ];
        return view('admin/film/create', $data);
    }

    public function store()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul film tidak boleh kosong.'
                ]
            ],
            'sinopsis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sinopsis wajib diisi.'
                ]
            ],
            'durasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi wajib diisi.'
                ]
            ],
            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Genre wajib diisi.'
                ]
            ],
            'rating' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Rating wajib diisi.'
                ]
            ],
            'sutradara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sutradara wajib diisi.'
                ]
            ],
            'poster' => [
                'rules' => 'uploaded[poster]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]|max_size[poster,2048]',
                'errors' => [
                    'uploaded' => 'Poster wajib diunggah.',
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format file harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran file tidak boleh lebih dari 2MB.'
                ]
            ],
            'banner' => [
                'rules' => 'is_image[banner]|mime_in[banner,image/jpg,image/jpeg,image/png]|max_size[banner,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format file harus JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran file tidak boleh lebih dari 2MB.'
                ]
            ],
            'movie' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Movie wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $poster = $this->request->getFile('poster');
            $banner = $this->request->getFile('banner');

            if ($poster->isValid() && !$poster->hasMoved()) {
                $posterName = $poster->getRandomName();
                $poster->move(FCPATH . 'assets/img/poster', $posterName);
            } else {
                return redirect()->to(base_url('admin/film/create'))
                    ->withInput()
                    ->with('errors', ['poster' => 'Gagal mengunggah file poster.']);
            }

            if ($banner && $banner->isValid() && !$banner->hasMoved()) {
                $bannerName = $banner->getRandomName();
                $banner->move(FCPATH . 'assets/img/poster', $bannerName);
            } else {
                // Jika banner tidak ada, Anda bisa mengatur nama banner ke default atau null
                $bannerName = null; // atau default value
            }


            $data = [
                'judul' => $this->request->getPost('judul'),
                'sinopsis' => $this->request->getPost('sinopsis'),
                'durasi' => $this->request->getPost('durasi'),
                'genre' => $this->request->getPost('genre'),
                'rating' => $this->request->getPost('rating'),
                'sutradara' => $this->request->getPost('sutradara'),
                'poster' => $posterName,
                'banner' => $bannerName,
                'movie' => $this->request->getPost('movie'),
            ];

            $this->filmModel->save($data);

            return redirect()->to(base_url('admin/film'))->with('success', 'Data film berhasil ditambahkan.');
        } else {
            // Menampilkan pesan error validasi
            return redirect()->to(base_url('admin/film/create'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        // Ambil data bioskop berdasarkan ID
        $film = $this->filmModel->find($id);

        if (!$film) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Bioskop dengan ID $id tidak ditemukan");
        }

        $data = [
            'title' => "CineTix || Film",
            'judul' => "Tambah Data Film",
            'active' => "film",
            'film' => $film  // Mengirimkan data bioskop yang akan diedit
        ];

        // var_dump($data);
        // exit;

        return view('admin/film/update', $data);
    }

    public function update($id)
    {
        $input = $this->request->getPost();

        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul film tidak boleh kosong.'
                ]
            ],
            'sinopsis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sinopsis wajib diisi.'
                ]
            ],
            'durasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi wajib diisi.'
                ]
            ],
            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Genre wajib diisi.'
                ]
            ],
            'rating' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Rating wajib diisi.'
                ]
            ],
            'sutradara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sutradara wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'judul' => $input['judul'],
                'sinopsis' => $input['sinopsis'],
                'durasi' => $input['durasi'],
                'genre' => $input['genre'],
                'rating' => $input['rating'],
                'sutradara' => $input['sutradara'],
            ];

            $this->filmModel->update($id, $data);

            return redirect()->to(base_url('admin/film'))->with('success', 'Data film berhasil diubah.');
        } else {
            return redirect()->to(base_url("admin/film/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $this->filmModel->delete($id);
        return redirect()->to('/admin/film')->with('success', 'Film deleted successfully');
    }
}
