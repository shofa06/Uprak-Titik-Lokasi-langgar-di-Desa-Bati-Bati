<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPolygon extends Model
{
    protected $table      = 'polygon';
    protected $primaryKey = 'idpolygon';
    protected $allowedFields = ['nama', 'latitude', 'longitude'];

    public function getPolygon($idpolygon = false)
    {
        if ($idpolygon == false) {
            return $this->findAll();
        }

        return $this->where(['idpolygon' => $idpolygon])->first();
    }
}
