<?php

namespace App\Models;

use CodeIgniter\Model;
use Countable;

class LokerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'loker';
    protected $primaryKey       = 'id_loker';
    protected $foreignKey       = true;
    // return view('partials/modal');
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id_ktgr",    "id_prshn",    "judul_loker",    "posisi",    "tgl_buka",    "tgl_tutup",    "syrt_pend",    "gaji",    "detail_loker"
    ];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getKtgrLoker()
    {
        $query = $this->db->table('ktgr_loker');
        return $query->get();
    }

    public function getPerusahaan()
    {
        $query = $this->db->table('perusahaan');
        return $query->get();
    }

    public function getLoker()
    {
        $builder = $this->db->table('loker');
        $builder->join('perusahaan', 'perusahaan.id_prshn = loker.id_prshn');
        $builder->join('ktgr_loker', 'ktgr_loker.id_ktgr = loker.id_ktgr');
        $query = $builder->get();
        return $query->getResultArray();

        // 
        // return $query->getFieldCount();
    }

    // function tambah data
    public function tambah($data)
    {
        return $this->db->table('loker')->insert($data);
    }

    public function info($id_loker)
    {
        if ($id_loker) {
            $builder = $this->db->table('loker');
            $query = $builder->get();
            return $query->getResultArray();
        }
        $builder = $this->db->table('loker');
        $builder->where('id_loker', $id_loker);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function edit($data, $id_loker)
    {
        // return $this->id_loker->query($this->prepQuery($data), $this->$id_loker);
        return $this->db->table('loker')->update($data, array('id_loker' => $id_loker));
    }

    public function hapus($id_loker)
    {
        return $this->table('loker')->delete(array('id_loker' => $id_loker));
    }

    public function countData()
    {
        $data = $this->db->table('loker')->countAllResults();
        return $data;
    }
}
