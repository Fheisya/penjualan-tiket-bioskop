<?php
namespace App\Models;
use CodeIgniter\Model;
class TiketModel extends Model
{
    protected $table      = 'tiket';
    protected $primaryKey = 'id_tiket';
    protected $allowedFields = ['harga', 'jumlah', 'tempat_duduk', 'id_jadwal'];
    protected $validationRules = [
        'harga' => 'required|numeric',
        'jumlah' => 'required|integer',
        'tempat_duduk' => 'required|string|max_length[255]',
        'id_jadwal' => 'required|integer',
    ];

    protected $validationMessages = [
        'harga' => [
            'required' => 'Harga is required.',
            'numeric' => 'Harga must be a valid number.'
        ],
        'jumlah' => [
            'required' => 'Jumlah is required.',
            'integer' => 'Jumlah must be an integer.'
        ],
        'tempat_duduk' => [
            'required' => 'Tempat duduk is required.',
            'string' => 'Tempat duduk must be a string.',
            'max_length' => 'Tempat duduk must not exceed 255 characters.'
        ],
    ];
    protected $beforeInsert = ['sanitizeData'];
    protected function sanitizeData(array $data)
    {
        $data['data']['harga'] = trim($data['data']['harga']);
        $data['data']['jumlah'] = (int)$data['data']['jumlah'];

        return $data;
    }

    public function getTicketDetails($id)
    {
        return $this->select('tiket.*, studio.nama_studio, film.judul')
            ->where('id_tiket', $id)
            ->first();
    }
}
