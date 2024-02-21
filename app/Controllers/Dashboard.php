<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $on='playground.id_permainan_playground=permainan.id_permainan';
        $data['data']=$model->fusionOderBy('playground', 'permainan', $on, 'jam_mulai');

        $data2['data2']=$model->fusionOderByASC('playground', 'permainan', $on, 'jam_selesai');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data2['foto']=$model->getRow('user',$where);

        echo view ('layout/header');
        echo view ('layout/menu');
        echo view ('dashboard_1', $data);
        echo view ('dashboard_2', $data2);
        echo view ('layout/footer');

        }else{
            return redirect()->to('/');
        }
    }

    public function edit_status($id_playground)
    {
        if ($this->request->getMethod() === 'post' && $this->request->getPost('edit_status_btn') !== null) {
            $model = new M_model();

            $data = [
                'status' => '2'
            ];

            $where = ['id_playground' => $id_playground];
            $model->edit('playground', $data, $where);

            return redirect()->to('/Dashboard');
        }
    }
}
