<?php

namespace App\Models;

use CodeIgniter\Model;

class BioskopModel extends Model
{
    protected $table      = 'bioskop';
    protected $primaryKey = 'id_bioskop';
    protected $allowedFields = ['nama_bioskop', 'lokasi', 'kota'];
}
