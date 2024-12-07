<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['tgl', 'jam', 'id_studio', 'id_film'];

    /**
     * Ambil data Studio yang terkait dengan jadwal
     * @return array
     */
    public function getStudio()
    {
        return $this->db->table('studio')
            ->select('studio.id_studio, studio.nama_studio, studio.id_bioskop')
            ->join('jadwal', 'studio.id_studio = jadwal.id_studio', 'left')
            ->get()
            ->getResultArray();
    }

    /**
     * Ambil data Film yang terkait dengan jadwal
     * @return array
     */
    public function getFilm()
    {
        return $this->db->table('film')
            ->select('film.id_film, film.judul')
            ->join('jadwal', 'film.id_film = jadwal.id_film', 'left')
            ->get()
            ->getResultArray();
    }
}
