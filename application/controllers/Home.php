<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // load assets in folder sipadu-template/
            $this->load->view('home/index');


    }

    public function login()
    {


        $cek1 = $this->input->post('username');
        $username = htmlspecialchars($cek1);
        $cek2 = $this->input->post('password');
        $password = htmlspecialchars($cek2);
       $cek3 = $this->input->post('kategori_user');
       $kategori_user = htmlspecialchars($cek3);
        $super = htmlspecialchars('user');

        $admin = $this->db->get_where('admin_users', ['email' => $username])->row_array();
        $dataadmin=$admin['username'];
        $datapass=$admin['password'];
        $datakategori=$admin['kategori_user'];

        $this->db->where('email', $username);
        $this->db->from('admin_users');
        $data['jumlah'] = $this->db->count_all_results();
        //anggota login
        $anggota = $this->db->get_where('anggota', ['nia' => $username])->row_array();
        $anggotapass = $this->db->get_where('anggota', ['password' => $password])->row_array();
        $dataanggota=$anggota['nia'];
        $passanggota=$anggota['password'];
        $katanggota=$anggota['kategori_data'];
        //selesai anggota
        $adminP = $this->db->get_where('admin_users', ['password' => $password])->row_array();
       $adminK = $this->db->get_where('admin_users', ['kategori_user' => $kategori_user])->row_array();

        //$bos = $this->db->get_where('admin_users', ['username' => $username])->row_array();
        //$bosP = $this->db->get_where('admin_users', ['password' => $password])->row_array();
        if ($dataadmin) {
            if ($datapass==$cek2) {
                if($datakategori==$cek3){
                $data =
                    [
                        'email' => $admin['email'],
                        'password' => $admin['password'],
                        'level'=> $admin['level'],
                        'id_pimpinan' => $admin['id_pimpinan'],
                        'tingkatan' => $admin['tingkatan'],
                        'kategori' => $admin['kategori_user'],
                        'ket' => $admin['ket'],
                        'status' => 'admin'
                    ];
                $this->session->set_userdata($data);
                redirect('admin/dashboard');
            }else {

              $this->session->set_flashdata('flash', 'Gagal');
              redirect('/');
            }
         }
        }
        //anggota if
        if ($anggota) {
            if ($passanggota==$cek2) {
              if($katanggota==$cek3){
                $data =
                    [
                        'nia' => $anggota['nia'],
                        'level'=> 'anggota',
                        'password' => $anggota['password'],
                        'id_pimpinan' => $anggota['id_pimpinan'],
                        'kategori' => $anggota['kategori_data'],
                        //'status' => 'bos'
                    ];
                $this->session->set_userdata($data);
                redirect('anggota');
            } } else {

              $this->session->set_flashdata('flash', 'Gagal');
              redirect('/');
            }
        }
        else{
          //$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          //Username does not registered !!
          // </div>');
          //redirect('/');
          $this->session->set_flashdata('flash', 'Gagal');
          redirect('/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('/');
    }
}
