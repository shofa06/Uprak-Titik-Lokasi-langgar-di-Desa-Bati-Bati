<?php

namespace App\Controllers;

use App\Models\ModelKelola;

class Kelola extends BaseController
{
    protected $ModelKelola;

    public function __construct()
    {
        $this->ModelKelola = new ModelKelola();
    }


    public function index()
    {
        $validation = \Config\Services::validation();
        $data  = [
            'menu' => 'kelola',
            'validation' => $validation,
            'kelola' => $this->ModelKelola->getKelola()
        ];
        return view('sig/v_kelola', $data);
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
            return redirect()->to('/kelola')->withInput();
        } else {
            $this->ModelKelola->save([
                'nama' => $this->request->getVar('nama'),
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude')
            ]);
            session()->setFlashdata('insert', 'Data Berhasil ditambahkan.');

            return redirect()->to('/kelola');
        }
    }

    public function UpdateData($idtambahan)
    {
        $DataLama = $this->ModelKelola->find($idtambahan);
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
            return redirect()->to('/kelola' . $this->request->getVar('idtambahan'))->withInput();
        }

        $this->ModelKelola->save([
            'idtambahan' => $idtambahan,
            'nama' => $this->request->getVar('nama'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude')
        ]);
        session()->setFlashdata('update', 'Data Berhasil diedit.');

        return redirect()->to('/kelola');
    }


    public function Delete($idtambahan)
    {
        if ($this->ModelKelola->delete($idtambahan)) {
            session()->setFlashdata('delete', 'Data Berhasil dihapus.');
        } else {
            session()->setFlashdata('delete', 'Data gagal dihapus.');
        }

        return redirect()->to('/kelola');
    }
}
