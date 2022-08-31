<?php

namespace App\Models;

use CodeIgniter\Model;

class KtgrLokerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ktgr_loker';
    protected $primaryKey       = 'id_ktgr';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nm_ktgr'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKtgrLoker()
    {
        $query = $this->db->table('ktgr_loker');
        return $query->get();
    }
    public function tambah($data)
    {
        return $this->db->table('ktgr_loker')->insert($data);
    }

    public function edit($data, $id_ktgr)
    {
        return $this->db->table('ktgr_loker')->update($data, array('id_ktgr' => $id_ktgr));
    }
    public function hapus($id_ktgr)
    {
        return $this->db->table('ktgr_loker')->update(array('id_ktgr' => $id_ktgr));
    }
}
