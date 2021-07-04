<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\M_role;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request;
 */

class selek extends BaseController
{
    public function __construct()
    {
        $this->user = new M_user();
        $this->role = new M_role();
    }
    public function index()
    {
        if ($this->request->getPost('role') == null) {
            $user = $this->user->getAllData();
        } else {
            $user = $this->user->getAllData($this->request->getPost('role'));
        }
        $data = [
            'user' => $user
        ];
        return view('V_selek', $data);
    }
    public function getRole()
    {
        if ($this->request->isAJAX()) {
            $caridata = $this->request->getVar('search');
            $dataRole = $this->role->getAllData($caridata);
            if ($dataRole->resultID->num_rows > 0) {
                $list = [];
                $key = 0;
                foreach ($dataRole->getResultArray() as $dik) {
                    $list[$key]['id'] = $dik['id_role'];
                    $list[$key]['text'] = $dik['nama_role'];
                    $key++;
                }
                echo json_encode($list);
            }
        }
    }
}
