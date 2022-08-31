<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'perusahaan';
    protected $primaryKey       = 'id_prshn';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "nm_prshn",    "alamat",    "email",    "no_tlp	logo",    "srt_izin",    "strk_organis",    "created_at",    "updated_at"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // func for read data
    public function getPerusahaan()
    {
        $query = $this->db->table('perusahaan');
        return $query->get();
    }

    // func for insert data
    public function tambah($data)
    {
        return $this->db->table('perusahaan')->insert($data);
    }

    // info
    public function getInfo($id_prshn = false)
    {
        if ($id_prshn = false) {
            $builder = $this->db->table('perusahaan');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $builder = $this->db->table('perusahaan');
        $builder->where('id_prshn', $id_prshn);
        $query = $builder->get();
        return $query->getResultArray();
    }

    // func edit
    public function edit($data, $id_prshn)
    {
        return $this->db->table('perusahaan')->update($data, array('id_prshn' => $id_prshn));
    }

    // func hapus
    public function hapus($id_prshn)
    {
        return $this->db->table('perusahaan')->delete(array('id_prshn' => $id_prshn));
        // return $this->db->table('perusahaan')->update(array('id_prshn' => $id_prshn));
    }

    // function for count data to dashboard
    public function countData()
    {
        $data = $this->db->table('perusahaan')->countAllResults();
        return $data;
    }
}
