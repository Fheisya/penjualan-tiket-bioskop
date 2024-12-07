<?php

namespace App\Models;

use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table      = 'studio';
    protected $primaryKey = 'id_studio';
    protected $allowedFields = ['nama_studio', 'kapasitas', 'id_bioskop'];

    public function getStudio()
    {
        $query = $this->query(
            "SELECT
            `bioskop`.`nama_bioskop`,
            `bioskop`.`id_bioskop`,
            `studio`.`id_studio`,
            `studio`.`nama_studio`,
            `studio`.`kapasitas`
          FROM
            `bioskop`
            INNER JOIN `studio` ON `bioskop`.`id_bioskop` = `studio`.`id_bioskop`"
        );

        return $query->getResultArray();
    }
    public function getBioskop()
    {
        $query = $this->query(
            "SELECT
        `bioskop`.`nama_bioskop`,
        `bioskop`.`id_bioskop`
      FROM
        `bioskop`
        LEFT JOIN `studio` ON `bioskop`.`id_bioskop` = `studio`.`id_bioskop`"
        );
        return $query->getResultArray();
    }
}
