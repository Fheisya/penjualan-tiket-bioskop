<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['id_pemesanan', 'tgl_pembayaran', 'metode_pembayaran', 'jmlh_pembayaran'];

    protected $validationRules = [
        'id_pemesanan' => 'required|is_not_unique[pemesanan.id_pemesanan]',
        'tgl_pembayaran' => 'required|valid_date[Y-m-d]',
        'metode_pembayaran' => 'required',
        'jmlh_pembayaran' => 'required|numeric',
    ];

    protected $validationMessages = [
        'id_pemesanan' => [
            'required' => 'ID Pemesanan harus dipilih.',
            'is_not_unique' => 'ID Pemesanan tidak valid atau tidak ada.',
        ],
        'tgl_pembayaran' => [
            'required' => 'Tanggal Pembayaran harus diisi.',
            'valid_date' => 'Format Tanggal Pembayaran harus YYYY-MM-DD.',
        ],
        'metode_pembayaran' => [
            'required' => 'Metode Pembayaran harus dipilih.',
        ],
        'jmlh_pembayaran' => [
            'required' => 'Jumlah Pembayaran harus diisi.',
            'numeric' => 'Jumlah Pembayaran harus berupa angka.',
        ]
    ];

    public function getPembayaranWithPemesanan($id = null)
    {
        if ($id === null) {
            return $this->join('pemesanan', 'pembayaran.id_pemesanan = pemesanan.id_pemesanan')->findAll();
        }
        return $this->join('pemesanan', 'pembayaran.id_pemesanan = pemesanan.id_pemesanan')->where('id_pembayaran', $id)->first();
    }
}
