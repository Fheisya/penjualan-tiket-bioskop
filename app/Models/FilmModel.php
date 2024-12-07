<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table      = 'film';
    protected $primaryKey = 'id_film';
    protected $allowedFields = ['judul', 'sinopsis', 'durasi', 'genre', 'rating', 'sutradara', 'poster', 'banner', 'movie'];
}
