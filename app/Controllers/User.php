<?php

namespace App\Controllers;

use App\Models\FilmModel;

class User extends BaseController
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
        return view('user/index', $data);
    }
}
