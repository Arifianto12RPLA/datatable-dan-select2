<?php

namespace App\Controllers;

use App\Models\M_user;

class datatabel extends BaseController
{
    public function __construct()
    {
        $this->user = new M_user();
    }
    public function index()
    {
        return view('V_datatabel');
    }
    public function get_data()
    {
        $list = $this->user->get_data();
        $total_semua = $this->user->jumlah_semua();
        $total_filter = $this->user->jumlah_filter();
        $no = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l['nama'];
            $row[] = $l['alamat'];
            $row[] = $l['email'];
            $row[] = $l['telepon'];
            $data[] =  $row;
        }
        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $total_semua->jml,
            "recordsFiltered" => $total_filter->jml,
            "data" => $data,
        ];
        echo json_encode($output);
    }
}
