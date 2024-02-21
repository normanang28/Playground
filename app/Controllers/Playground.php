<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Playground extends BaseController
{
    public function list_permainan()
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $on='permainan.maker_permainan=user.id_user';
        $data['data']=$model->fusionOderBy('permainan', 'user', $on, 'tanggal_permainan');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/list_permainan/list_permainan');
        echo view('layout/footer'); 

        }else{
            return redirect()->to('/');
        }
    }

    public function tambah_list_permainan()
    {
        $model=new M_model();
        $nama_permainan=$this->request->getPost('nama_permainan');
        $harga_permainan=$this->request->getPost('harga_permainan');
        $maker_permainan=session()->get('id');
        $data=array(

            'nama_permainan '=>$nama_permainan,
            'harga_permainan'=>$harga_permainan,
            'maker_permainan'=>$maker_permainan
        );
        
        $model->simpan('permainan',$data);
        return redirect()->to('/Playground/list_permainan');
    }

    public function edit_list_permainan($id)
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $where2=array('permainan.id_permainan '=>$id);

        $on='permainan.maker_permainan=user.id_user';
        $data['data']=$model->edit_user('permainan', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/list_permainan/edit_list_permainan');
        echo view('layout/footer');

        }else{
            return redirect()->to('/');
        }
    }

    public function aksi_edit_list_permainan()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nama_permainan=$this->request->getPost('nama_permainan');
        $harga_permainan=$this->request->getPost('harga_permainan');
        $maker_permainan=session()->get('id');

        $data=array(
            'nama_permainan'=>$nama_permainan,
            'harga_permainan'=>$harga_permainan,
            'maker_permainan'=>$maker_permainan
        );

        $where=array('id_permainan'=>$id);
        $model->edit('permainan',$data,$where);
        return redirect()->to('/Playground/list_permainan');
    }

    public function hapus_list_permainan($id)
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $where=array('id_permainan '=>$id);
        $model->hapus('permainan',$where);
        return redirect()->to('/Playground/list_permainan');

        }else{
            return redirect()->to('/');
        }
    }

    public function pembelian_tiket()
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $where2=array('username'=>session()->get('username'));

        $on='playground.id_permainan_playground=permainan.id_permainan';
        $on2='playground.maker_playground=user.id_user';
        $data['data']=$model->superOderByWhere('playground', 'permainan' , 'user', $on, $on2 , 'tanggal_playground', $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['p']=$model->tampil('permainan'); 

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/pembelian_tiket/pembelian_tiket');
        echo view('layout/footer'); 

        }else{
            return redirect()->to('/');
        }
    }

    public function tambah_pembelian_tiket()
    {
        $model = new M_model();
        $id_permainan = $this->request->getPost('id_permainan');
        $nama_pemain = $this->request->getPost('nama_pemain');
        $durasi = $this->request->getPost('durasi');

        $jam_selesai = date('H:i:s', strtotime("+$durasi hour"));

        $total_harga = $this->request->getPost('total_harga');
        $maker_playground = session()->get('id');

        $data = array(
            'id_permainan_playground' => $id_permainan,
            'nama_pemain' => $nama_pemain,
            'durasi' => $durasi,
            'jam_selesai' => $jam_selesai,
            'total_harga' => $total_harga,
            'status' => '1',
            'maker_playground' => $maker_playground
        );

        $model->simpan('playground', $data);
        return redirect()->to('/Playground/pembelian_tiket');
    }

    public function hapus_pembelian_tiket($id)
    {
        if(session()->get('id')>0) {

        $model=new M_model();
        $where=array('id_playground '=>$id);
        $model->hapus('playground',$where);
        return redirect()->to('/Playground/pembelian_tiket');

        }else{
            return redirect()->to('/');
        }
    }
}
