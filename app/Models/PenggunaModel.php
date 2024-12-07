<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['nama', 'email', 'kata_sandi', 'no_telp', 'role'];
}
