<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelola extends Model
{
    protected $table      = 'tambahan';
    protected $primaryKey = 'idtambahan';
    protected $allowedFields = ['nama', 'latitude', 'longitude'];

    public function getKelola($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
