<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('level') > 0) {
            return redirect()->to('/Dashboard'); 
        } else {
            $model = new M_model();
            return view('login/login');
        }
    }

    public function aksi_login()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getarray('user', $data);
        if ($cek>0) {
            $where=array('id_pegawai_user'=>$cek['id_user']);
            $pegawai=$model->getarray('pegawai', $where);

                if ($pegawai) { 
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_pegawai', $pegawai['nama_pegawai']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Dashboard');
                }
            } else {         
        }
        return redirect()->to('/');
    }

    public function logout()
    {
        if(session()->get('id') > 0) {
            $model = new M_model();
            $id = session()->get('id');

            session()->destroy();
            return redirect()->to('/');
        } else {
            return redirect()->to('/Dashboard');
        }
    }
}
