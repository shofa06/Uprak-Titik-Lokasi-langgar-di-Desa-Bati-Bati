<?php

namespace App\Controllers;

use App\Models\ModelKelola;
use App\Models\ModelPolygon;

class Home extends BaseController
{
    protected $ModelKelola;
    protected $ModelPolygon;

    public function __construct()
    {
        $this->ModelKelola = new ModelKelola();
        $this->ModelPolygon = new ModelPolygon();
    }

    public function index()
    {
        $data  = [
            'menu' => 'peta',
            'kelola' => $this->ModelKelola->getKelola(),
            'polygon' => $this->ModelPolygon->getPolygon(),
        ];
        return view('sig/index', $data);
    }
}
