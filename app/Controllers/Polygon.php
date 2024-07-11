<?php

namespace App\Controllers;

use App\Models\ModelPolygon;

class Polygon extends BaseController
{
    protected $ModelPolygon;

    public function __construct()
    {
        $this->ModelPolygon = new ModelPolygon();
    }


    public function index()
    {
        $validation = \Config\Services::validation();
        $data  = [
            'menu' => 'polygon',
            'validation' => $validation,
            'polygon' => $this->ModelPolygon->getPolygon()
        ];
        return view('sig/v_polygon', $data);
    }

    public function InsertData()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tambahan.nama]',
                'errors' => [
                    'required' => 'Nama harus diisi!!!',
                    'is_unique' => 'Nama sudah ada!!!'
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude harus diisi!!!',
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude harus diisi!!!',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/polygon')->withInput();
        } else {
            $this->ModelPolygon->save([
                'nama' => $this->request->getVar('nama'),
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude')
            ]);
            session()->setFlashdata('insert', 'Data Berhasil ditambahkan.');

            return redirect()->to('/polygon');
        }
    }

    public function UpdateData($idpolygon)
    {
        $DataLama = $this->ModelPolygon->find($idpolygon);
        if ($DataLama['nama'] == $this->request->getVar('nama')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tambahan.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Nama harus diisi!!!',
                    'is_unique' => 'Nama sudah ada!!!'
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude harus diisi!!!',
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude harus diisi!!!',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/polygon' . $this->request->getVar('idpolygon'))->withInput();
        }

        $this->ModelPolygon->save([
            'idpolygon' => $idpolygon,
            'nama' => $this->request->getVar('nama'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude')
        ]);
        session()->setFlashdata('update', 'Data Berhasil diedit.');

        return redirect()->to('/polygon');
    }


    public function Delete($idpolygon)
    {
        if ($this->ModelPolygon->delete($idpolygon)) {
            session()->setFlashdata('delete', 'Data Berhasil dihapus.');
        } else {
            session()->setFlashdata('delete', 'Data gagal dihapus.');
        }

        return redirect()->to('/polygon');
    }
}
