<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    var $column_order = array('id_user', 'nama', 'alamat', 'email', 'telepon');
    var $order = array('id_user' => 'asc');
    protected $table = 'user';
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAllData($id_role = '')
    {
        if ($id_role == '') {
            return $this->builder()
                ->join('role', 'role.id_role=user.id_role')
                ->get()->getResultArray();
        } else {
            return $this->builder()
                ->join('role', 'role.id_role=user.id_role')
                ->where('user.id_role', $id_role)
                ->get()->getResultArray();
        }
    }
    public function get_data()
    {
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "nama LIKE '%$search%' OR alamat LIKE '%$search%' OR email LIKE '%$search%' OR telepon LIKE '%$search%'";
        } else {
            $kondisi_search = "id_user > 0";
        }
        if ($_POST['length'] != -1);
        return $this->builder->where($kondisi_search)->orderBy('id_user', 'asc')->limit($_POST['length'], $_POST['start'])->get()->getResultArray();
    }
    function jumlah_semua()
    {
        $squery = "SELECT COUNT(id_user) as jml from user";
        $db = db_connect();
        $query = $db->query($squery)->getRow();
        return $query;
    }
    function jumlah_filter()
    {
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND(nama LIKE '%$search%' OR alamat LIKE '%$search%' OR email LIKE '%$search%' OR telepon LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }
        $squery = "SELECT COUNT(id_user) as jml from user where id_user > 0 $kondisi_search";
        $db = db_connect();
        $query = $db->query($squery)->getRow();
        return $query;
    }
}
