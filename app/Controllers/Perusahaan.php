<?php

namespace App\Controllers;

use App\Models\PerusahaanModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use Exception;

class Perusahaan extends BaseController
{
    public function __construct()
    {
        $this->perusahaanModel = new PerusahaanModel();
    }
    public function perusahaan()
    {
        $dataPerusahaan = $this->perusahaanModel->getPerusahaan()->getResult();
        // $pr = $this->perusahaanModel->findAll();
        session();
        $data = [
            "perusahaan" => $dataPerusahaan,
            "title" => "Perusahaan",
            'info' => $this->perusahaanModel->findAll(),
            'validation' => \config\Services::validation()
        ];
        if (session()->get('role') == 'admin') {
            return view('/admin/perusahaan', $data);
        } elseif (session()->get('role') == 'instansi') {
            return view('/instansi/perusahaan', $data);
        } elseif (session()->get('role') == 'pencaker') {
            return view('/pencaker/perusahaan', $data);
        }
    }

    // func for insert data

    public function tambah()
    {
        if (!$this->validate([
            'nm_prshn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan harus di isi '
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus di isi '
                ]
            ],
            'tlp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telpon harus di isi '
                ]
            ],
            'logo' => [
                'rules' => 'uploaded[logo]|max_size[logo,5000]|is_image[logo]|mime_in[logo,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'pilih logo terlebih dahulu',
                    'max_size' => 'ukuran logo terlalu besar',
                    'is_image' => 'yang anda pilihh bukan logo',
                    'mime-in' => 'yang anda pilihh bukan logo'
                ]
            ],
            'srt_izin' => [
                'rules' => 'uploaded[srt_izin]|mime_in[srt_izin,application/pdf,application/mword]',
                'errors' => [
                    'uploaded' => 'pilih File terlebih dahulu',
                    'mime_in' => 'yang anda masukkan bukan file'
                ]
            ],
            'strk_organis' => [
                'rules' => 'uploaded[strk_organis]|mime_in[strk_organis,application/pdf,application/mword]',
                'errors' => [
                    'uploaded' => 'pilih FIle terlebih dahulu',
                    'mime_in' => 'yang anda masukkan bukan file'
                ]
            ],
        ])) {
            session()->setFlashdata('pesan', 'Data Belum Lengkap !');
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/perusahaan'));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/perusahaan'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/perusahaan'));
            }
            // return redirect()->to(base_url('admin/perusahaan'))->withInput();
        }

        // ambil gambar
        $fileLogo = $this->request->getFile('logo');
        $fileSurat = $this->request->getFile('srt_izin');
        $fileStruktur = $this->request->getFile('strk_organis');

        // pindahkan file
        $fileLogo->move('img2');
        $fileSurat->move('surat');
        $fileStruktur->move('strk_organis');


        // ambil nama file
        $namaLogo = $fileLogo->getName();
        $namaSurat = $fileSurat->getName();
        $namaStruktur = $fileStruktur->getName();
        // dd($fileLogo);

        $data = [
            'nm_prshn' => $this->request->getPost('nm_prshn'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'tlp' => $this->request->getPost('tlp'),
            'logo' => $namaLogo,
            'srt_izin' => $namaSurat,
            'strk_organis' => $namaStruktur,
            // 'id_prshn' =>$this->request->getPost()
        ];
        $success = $this->perusahaanModel->tambah($data);
        if ($success) {
            session()->setFlashdata('pesan2', 'Data Berhasil Ditambah !');
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin/perusahaan',));
            } elseif (session()->get('role') == 'instansi') {
                return redirect()->to(base_url('/instansi/perusahaan'));
            } elseif (session()->get('role') == 'pencaker') {
                return redirect()->to(base_url('/pencaker/perusahaan'));
            }
            // dd($data);
        }
    }

    // fungsi edit
    public function edit($id_prshn)
    {
        $this->perusahaanModel->save([
            'id_prshn' => $id_prshn,
            'nm_prshn' => $this->request->getVar('nm_prshn'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'tlp' => $this->request->getVar('tlp'),
            'logo' => $this->request->getVar('logo'),
            'srt_izin' => $this->request->getVar('srt_izin'),
            'strk_organis' => $this->request->getVar('strk_organis')

        ]);
        if (session()->get('role') == 'admin') {
            return redirect()->to(base_url('/admin/perusahaan'));
        } elseif (session()->get('role') == 'instansi') {
            return redirect()->to(base_url('/instansi/perusahaan'));
        } elseif (session()->get('role') == 'pencaker') {
            return redirect()->to(base_url('/pencaker/perusahaan'));
        }
        // return redirect()->to(base_url('/admin/perusahaan'));
    }

    // function hapus
    public function hapus($id_prshn)
    {
        $this->perusahaanModel->delete($id_prshn);
        if (session()->get('role') == 'admin') {
            return redirect()->to(base_url('/admin/perusahaan'));
        } elseif (session()->get('role') == 'instansi') {
            return redirect()->to(base_url('/instansi/perusahaan'));
        } elseif (session()->get('role') == 'pencaker') {
            return redirect()->to(base_url('/pencaker/perusahaan'));
        }
        // return redirect()->to(base_url('/admin/perusahaan'));
    }
}
