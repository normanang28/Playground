<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Data_Pegawai extends BaseController
{
    public function index()
    {
        $model=new M_model();
        $on='pegawai.id_pegawai_user=user.id_user';
        $data['data']=$model->fusionOderBy('pegawai', 'user', $on, 'tanggal_pegawai');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('user/pegawai');
        echo view('layout/footer'); 
    }

    public function tambah()
    {
        $nama_pegawai=$this->request->getPost('nama_pegawai');
        $no_telp=$this->request->getPost('no_telp');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_pegawai=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5('@dmin123'),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $pegawai = array(
            'nama_pegawai' => $nama_pegawai,
            'no_telp' => $no_telp,
            'id_pegawai_user' => $iduser,
            'maker_pegawai' => $maker_pegawai,
        );

        $model->simpan('pegawai', $pegawai);
        return redirect()->to('/Data_Pegawai');
    }  

    public function hapus($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_pegawai_user'=>$id);

        $model->hapus('pegawai',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/Data_Pegawai');
    }
}
