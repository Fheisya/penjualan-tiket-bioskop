<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = [
        'total_harga',
        'jumlh_tiket',
        'tgl_pemesanan',
        'id_pengguna',
        'id_tiket',
    ];
    protected $useTimestamps = false;
    protected $validationRules = [
        'total_harga' => 'required|decimal',
        'jumlh_tiket' => 'required|integer',
        'tgl_pemesanan' => 'required|valid_date',
        'id_pengguna' => 'required|is_natural_no_zero',
        'id_tiket' => 'required|is_natural_no_zero',
    ];
    protected $validationMessages = [
        'total_harga' => [
            'required' => 'Total harga wajib diisi.',
            'decimal' => 'Total harga harus berupa angka desimal.'
        ],
        'jumlh_tiket' => [
            'required' => 'Jumlah tiket wajib diisi.',
            'integer' => 'Jumlah tiket harus berupa angka bulat.'
        ],
        'tgl_pemesanan' => [
            'required' => 'Tanggal pemesanan wajib diisi.',
            'valid_date' => 'Format tanggal tidak valid.'
        ],
        'id_pengguna' => [
            'required' => 'ID pengguna wajib diisi.',
            'is_natural_no_zero' => 'ID pengguna harus berupa angka positif.'
        ],
        'id_tiket' => [
            'required' => 'ID tiket wajib diisi.',
            'is_natural_no_zero' => 'ID tiket harus berupa angka positif.'
        ],
    ];
    protected $beforeInsert = ['validateData'];
    protected $beforeUpdate = ['validateData'];
    protected function validateData(array $data)
    {
        if (!$this->validate($data['data'])) {
            throw new \RuntimeException('Validasi gagal: ' . implode(', ', $this->validation->getErrors()));
        }
        return $data;
    }
}
