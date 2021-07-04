<?php

namespace App\Models;

use CodeIgniter\Model;

class M_role extends Model
{

    protected $table = 'role';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAllData($search)
    {
        return $this->builder()
            ->like('nama_role', $search)
            ->get();
    }
}
