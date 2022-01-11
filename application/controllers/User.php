<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            # code...
            redirect('/');
        }
        if ($this->session->userdata('level') == 'anggota') {
            redirect('/anggota');
        }
        $this->load->library('form_validation');
        $this->load->library('pdf');

    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        redirect('/');
    }

    public function index()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$ket = $this->session->userdata('ket');

        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();
        }

        $this->db->count_all('pimpinan');
        $this->db->where('pimpinan', 'PC');
        $this->db->where('kategori_data', $kat);
        $this->db->from('pimpinan');
        $data['pc'] = $this->db->count_all_results();

        $this->db->where('kategori_data', $kat);
        $this->db->where('status_verifikasi', 'belum');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['belumverifikasi'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_ac');
        $data['pac'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['pac_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt_aktif'] = $this->db->count_all_results();

        if($tingkatan=='PC'){
        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_rk');
        $data['ranting'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['ranting_aktif'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PR');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->from('pimpinan_rk');
            $data['ranting'] = $this->db->count_all_results();

            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PR');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->where('status_aktif', 'aktif');
            $this->db->from('pimpinan_rk');
            $data['ranting_aktif'] = $this->db->count_all_results();
        }

        if($tingkatan=='PC'){
        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_rk');
        $data['komisariat'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['komisariat_aktif'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PK');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->from('pimpinan_rk');
            $data['komisariat'] = $this->db->count_all_results();

            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PK');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->where('status_aktif', 'aktif');
            $this->db->from('pimpinan_rk');
            $data['komisariat_aktif'] = $this->db->count_all_results();
        }

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/dashboard');
        $this->load->view('template/footerUser');
    }
    public function aplikasi()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        }
        elseif($tingkatan=='PAC'){
            //$this->db->join('pimpinan_ac', 'id_pimpinan');
            $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
            $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
            }
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/aplikasi');
        $this->load->view('template/footerUser');
    }
    public function editaplikasi_foto()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $kolom = $this->input->post('kolom');
        $isi = $this->input->get('isi');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editaplikasi_foto');
        $this->load->view('template/footerUser');
    }
    public function updateaplikasi_foto()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');

      $config['upload_path'] = './upload/setting-app/';
      $config['allowed_types'] = 'jpeg|jpg|png';
      $this->load->library('upload', $config);
      $this->upload->do_upload($namakolom);
      $name = $this->upload->data('file_name');
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

      $state =
          [
            $namakolom => $name
          ];
      $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
      $this->db->update('pengaturan_pimpinan', $state);

      $this->session->set_flashdata('flash', 'Diedit');
      redirect('user/aplikasi');
    }
    public function editaplikasi_dokumen()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $kolom = $this->input->post('kolom');
        $isi = $this->input->get('isi');

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editaplikasi_dokumen');
        $this->load->view('template/footerUser');
    }
    public function updateaplikasi_dokumen()
    {
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');

      $config['upload_path'] = './upload/setting-app/';
      $config['allowed_types'] = array('pdf');
      $this->load->library('upload', $config);
      $this->upload->do_upload($namakolom);
      $name = $this->upload->data('file_name');

      $state =
          [
            $namakolom => $name
          ];
      $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
      $this->db->update('pengaturan_pimpinan', $state);

      $this->session->set_flashdata('flash', 'Diedit');
      redirect('user/aplikasi');
    }
    public function editaplikasi_text()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $kolom = $this->input->post('$kolom');
        $isi = $this->input->get('$isi');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editaplikasi_text');
        $this->load->view('template/footerUser');
    }
    public function updateaplikasi_text()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $state =
            [
                $namakolom => $kolom
            ];
        $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
        $this->db->update('pengaturan_pimpinan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('user/aplikasi');
    }

    public function editaplikasi_date()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $kolom = $this->input->post('$kolom');
        $isi = $this->input->get('$isi');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editaplikasi_date');
        $this->load->view('template/footerUser');
    }
    public function updateaplikasi_date()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $state =
            [
                $namakolom => $kolom
            ];
        $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
        $this->db->update('pengaturan_pimpinan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('user/aplikasi');
    }
    public function about()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/about');
        $this->load->view('template/footerUser');
    }
    public function kodedaerah()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->select('*');
        $this->db->where('pimpinan', 'PC');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $this->session->userdata('kategori'));
        $this->db->order_by('kd_pimpinan');
        $data['pimpinan'] = $this->db->get('pimpinan')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/kodedaerah');
        $this->load->view('template/footerUser');
    }
    public function editpc()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan = $this->input->get('id');
        $data['kodedaerah'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editpc');
        $this->load->view('template/footerUser');
    }
    public function updatepc()
    {
        $id_pimpinan = $this->input->post('id_pimpinan');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $state =
            [
                'nama_pimpinan' => $this->input->post('nama_pimpinan'),
                'kd_pimpinan' => $this->input->post('kd_pimpinan')
            ];
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->update('pimpinan', $state);

        redirect('user/kodedaerah');
    }
    public function kodepac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan = $this->input->get('id');
        $id_pimpinan_ac = $this->input->get('pac');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $tingkatan=$this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
            $this->db->select('*');
            $this->db->where('id_pimpinan', $id_pimpinan);
            $this->db->where('pimpinan_ac', 'PAC');
            $this->db->order_by('kd_pimpinan_ac');
            $data['pimpinan'] = $this->db->get('pimpinan_ac')->result_array();
        }
        elseif($tingkatan=='PAC'){
            $this->db->select('*');
            $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
            $this->db->order_by('kd_pimpinan_ac');
            $data['pimpinan'] = $this->db->get('pimpinan_ac')->result_array();
        }
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/kodepac');
        $this->load->view('template/footerUser');
    }
    public function inpac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$id_pimpinan_ac = $this->input->get('id');
        $id_pimpinan = $this->input->get('id');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inpac');
        $this->load->view('template/footerUser');
    }
    public function addpac()
    {
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $pimpinan = $this->input->post('id_pimpinan');
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan = $this->input->post('id_pimpinan');
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'pimpinan_ac' => 'PAC',
            'kategori_data' => $kat,
            'kd_pimpinan_ac' => $this->input->post('kd_pimpinan_ac'),
            'nama_pimpinan_ac' => $this->input->post('nama_pimpinan_ac')
        ];
        $this->db->insert('pimpinan_ac', $data);
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('user/kodepac?id=' .$pimpinan );
    }
    public function editpac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan_ac = $this->input->get('id');
        $data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editpac');
        $this->load->view('template/footerUser');
    }
    public function updatepac()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan=$this->input->post('id_pimpinan');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $state =
            [
                'nama_pimpinan_ac' => $this->input->post('nama_pimpinan_ac'),
                'kd_pimpinan_ac' => $this->input->post('kd_pimpinan_ac'),
                'status_aktif' => $this->input->post('status_aktif')
            ];
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->update('pimpinan_ac', $state);
        $tingkatan= $this->session->userdata('tingkatan');

        if($tingkatan=='PC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/kodepac?id=' .$id_pimpinan);
        }
        elseif($tingkatan=='PAC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/kodepac?id=' .$id_pimpinan. '&pac=' .$id_pimpinan_ac);
        }
    }
    public function kodepkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan = $this->input->get('id');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();

        $this->db->select('*');
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->order_by('kd_pimpinan_ac');
        $data['pimpinan'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/kodepkpt');
        $this->load->view('template/footerUser');
    }
    public function inpkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$id_pimpinan_ac = $this->input->get('id');
        $id_pimpinan = $this->input->get('id');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inpkpt');
        $this->load->view('template/footerUser');
    }
    public function addpkpt()
    {
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $pimpinan = $this->input->post('id_pimpinan');

        $id_pimpinan = $this->input->post('id_pimpinan');
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'pimpinan_ac' => 'PKPT',
            'kategori_data' => $kat,
            'kd_pimpinan_ac' => $this->input->post('kd_pimpinan_ac'),
            'nama_pimpinan_ac' => $this->input->post('nama_pimpinan_ac')
        ];
        $this->db->insert('pimpinan_ac', $data);
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('user/kodepkpt?id=' .$pimpinan );
    }
    public function editpkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->get('id');
        $data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editpkpt');
        $this->load->view('template/footerUser');
    }
    public function updatepkpt()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan=$this->input->post('id_pimpinan');
        $state =
            [
                'nama_pimpinan_ac' => $this->input->post('nama_pimpinan_ac'),
                'kd_pimpinan_ac' => $this->input->post('kd_pimpinan_ac'),
                'status_aktif' => $this->input->post('status_aktif')
            ];
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->update('pimpinan_ac', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('user/kodepkpt?id=' .$id_pimpinan);
    }
    public function koderanting()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->get('id');
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan = $this->input->get('id2');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->order_by('kd_pimpinan_rk');
        $data['pimpinan'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/koderanting');
        $this->load->view('template/footerUser');
    }

    public function kodekomisariat()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->get('id');
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan = $this->input->get('id2');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->order_by('kd_pimpinan_rk');
        $data['pimpinan'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/kodekomisariat');
        $this->load->view('template/footerUser');
    }
    public function inranting()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan_ac = $this->input->get('id');
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $id_pimpinan = $this->input->get('id2');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inranting');
        $this->load->view('template/footerUser');
    }
    public function addranting()
    {
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan = $this->input->post('id_pimpinan');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $jenis = $this->input->post('pimpinan_rk');
        $data = [
            'id_pimpinan_ac' => $this->input->post('id_pimpinan_ac'),
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'pimpinan_rk' => $this->input->post('pimpinan_rk'),
            'kategori_data' => $kat,
            'kd_pimpinan_rk' => $this->input->post('kd_pimpinan_rk'),
            'nama_pimpinan_rk' => $this->input->post('nama_pimpinan_rk')
        ];
        $this->db->insert('pimpinan_rk', $data);
        if($jenis=='PR'){
            $this->session->set_flashdata('flash', 'Tersimpan');
            redirect('user/koderanting?id2=' .$id_pimpinan.'&id=' .$id_pimpinan_ac);
            }else{
                $this->session->set_flashdata('flash', 'Tersimpan');
                redirect('user/kodekomisariat?id2=' .$id_pimpinan.'&id=' .$id_pimpinan_ac);
            }
    }
    public function editranting()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan_rk = $this->input->get('id_rk');
        $data['koderanting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editranting');
        $this->load->view('template/footerUser');
    }
    public function updateranting()
    {
        $id_pimpinan = $this->input->post('id_pimpinan');
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan_rk = $this->input->post('id_pimpinan_rk');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $jenis = $this->input->post('pimpinan_rk');
        $state =
            [
                'nama_pimpinan_rk' => $this->input->post('nama_pimpinan_rk'),
                'kd_pimpinan_rk' => $this->input->post('kd_pimpinan_rk'),
                'status_aktif' => $this->input->post('status_aktif')
            ];
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->update('pimpinan_rk', $state);
        if($jenis=='PR'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/koderanting?id2='.$id_pimpinan.'&id='.$id_pimpinan_ac);
            }else{
                $this->session->set_flashdata('flash', 'Diedit');
                redirect('user/kodekomisariat?id2='.$id_pimpinan.'&id='.$id_pimpinan_ac);
            }
    }
    public function manajemenuser()
    {
       //data default parameter
       $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
       $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
       $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
       $pimp = $data['id_pimpinan'];
       $data['kategori_data'] = $this->session->userdata('kategori');
       $kat = $data['kategori_data'];
       $pc=$this->input->get('pc');
       $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
       $tingkatan= $this->session->userdata('tingkatan');

       if($tingkatan=='PC'){
       $this->db->select('*');
       $this->db->where('aktif', 'Y');
       $this->db->where('kategori_user', $kat);
       $this->db->where('ket', $pc);
       $this->db->order_by('username');
       $data['manajemenuser'] = $this->db->get('admin_users')->result_array();
       }
       elseif($tingkatan=='PAC'){
        $this->db->select('*');
        $this->db->where('aktif', 'Y');
        $this->db->where('kategori_user', $kat);
        $this->db->where('ket', $pc);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('username');
        $data['manajemenuser'] = $this->db->get('admin_users')->result_array();
       }
       $this->load->view('template/headerUser', $data);
       $this->load->view('operator/user');
       $this->load->view('template/footerUser');
    }
    public function edituser()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_user = $this->input->get('id');
        $data['user'] = $this->db->get_where('admin_users', ['id_user' => $id_user])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/edituser');
        $this->load->view('template/footerUser');
    }
    public function updateuser()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan');
        $id_user = $this->input->post('id_user');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $state =
            [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_telpon' => $this->input->post('no_telpon'),
                'sekretariat' => $this->input->post('sekretariat')
            ];
        $pc=$this->input->post('ket');
        //$this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('id_user', $id_user);
        $this->db->update('admin_users', $state);
        $tingkatan= $this->session->userdata('tingkatan');

        if($tingkatan=='PC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/manajemenuser?pc=' .$pc);
        }
        elseif($tingkatan=='PAC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/manajemenuser?pc=' .$pc. '&pac=' .$id_pimpinan_ac);
        }
    }
    public function deleteuser()
    {
        $id_user = $this->input->get('id');
        $pc=$this->input->get('pc');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $this->db->delete('admin_users', ['id_user' => $id_user]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/manajemenuser?pc=' .$pc);
    }
    public function inusercabang()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inusercabang');
        $this->load->view('template/footerUser');
    }
    public function inuserpac()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('kd_pimpinan');
        $data['pimpinan_cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('nama_pimpinan_ac');
        $data['anakcabang'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inuserpac');
        $this->load->view('template/footerUser');
    }
    public function inuserpilihranting()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('nama_pimpinan_ac');
        $data['anakcabang'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/inuserpilihranting');
        $this->load->view('template/footerUser');
    }
    public function inuserranting()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->order_by('nama_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Inuserranting');
        $this->load->view('template/footerUser');
    }
    public function adduser()
    {
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
      $tingkatan = $this->input->post('tingkatan');
      $pc=$this->input->post('id_pimpinan1');
      if($tingkatan=='PW'){
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'kategori_user' => $kat,
            'tingkatan' => $this->input->post('tingkatan'),
            'sekretariat' => $this->input->post('sekretariat'),
            'email' => $this->input->post('email'),
            'no_telpon' => $this->input->post('no_telpon'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'level' => $this->input->post('level'),
            'aktif' => 'Y'
        ];
        $this->db->insert('admin_users', $data);
      }elseif($tingkatan=='PC'){
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'kategori_user' => $kat,
            'tingkatan' => $this->input->post('tingkatan'),
            'sekretariat' => $this->input->post('sekretariat'),
            'email' => $this->input->post('email'),
            'no_telpon' => $this->input->post('no_telpon'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'level' => $this->input->post('level'),
            'aktif' => 'Y'
        ];
        $this->db->insert('admin_users', $data);

        $data_setting = [
            'id_pimpinan' =>$this->input->post('id_pimpinan')
        ];
        $this->db->insert('pengaturan_pimpinan', $data_setting);
      }elseif($tingkatan=='PAC'){
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'kategori_user' => $kat,
            'tingkatan' => $this->input->post('tingkatan'),
            'sekretariat' => $this->input->post('sekretariat'),
            'email' => $this->input->post('email'),
            'no_telpon' => $this->input->post('no_telpon'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'level' => $this->input->post('level'),
            'ket' => $this->input->post('id_pimpinan1'),
            'aktif' => 'Y'
        ];
        $this->db->insert('admin_users', $data);

        $data_setting = [
            'id_pimpinan' =>$this->input->post('id_pimpinan'),
            'tingkatan' => 'PAC'
        ];
        $this->db->insert('pengaturan_pimpinan', $data_setting);
      }
      $this->session->set_flashdata('flash', 'Tersimpan');
      redirect('user/manajemenuser?pc=' .$pc);
    }
    public function anggotapc()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotapc');
        $this->load->view('template/footerUser');
    }
    public function verifikasianggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->where('status_verifikasi', 'belum');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/verifikasianggota');
        $this->load->view('template/footerUser');
    }
    public function editverifikasianggota()
    {
        $id_anggota = $this->input->post('id');
        $state =
            [
              'status_verifikasi' => 'sudah'
            ];
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $state);


        $email = $this->input->post('email');
        $nia = $this->input->post('nia');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $config = array(
          'protocol' =>'smtp',
          'smtp_host' =>'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' =>'sipadu.ipnujateng@gmail.com',
          'smtp_pass' =>'drcipto180',
          'mailtype' =>'html',
          'charset' =>'iso-8859-1'
          );
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('sipadu.ipnujateng@gmail.com', 'SIPADU APP');
        $this->email->to($email);
        //$this->email->cc('ipnujawatengah@gmail.com');
        $this->email->subject('Pemberitahuan');
        $this->email->message('<div align="justify" style="color:#7f8c8d;"><h1>Halo '.$nama.'!</h1>
        <h3>Anda sudah terdaftar di SIPADU APP</h3><br/><br/>
        <img src="https://sipadu.ipnujateng.or.id/sipadu-template/assets/img/responsive-device.png"/>
        <br/><br/>Selamat datang di Sistem Informasi Pelajar dan Administrasi Terpadu (SIPADU) PW IPNU & IPPNU Provinsi Jawa Tengah.
        <br/> Melalui email ini, kami menginformasikan terkait <b>Data Diri Anda</b> yang sudah terdaftar dan terverifikasi sebagai Anggota di
        <b>Sistem Informasi Pelajar dan Administrasi Terpadu (SIPADU)</b>.<br/><br/>Untuk mengupdate data diri anda, silakan mengunjungi
        Aplikasi SIPADU atau melalui link berikut ini:</div> <br/> <br/>
        <div align="center"><a style="background:#3498db;color:#fff;padding:15px;padding-left:20px;padding-right:20px;border-radius:9px;" href="https://sipadu.ipnujateng.or.id">Login Disini</a></div><br/><br/>
        <br/>Akses Masuk Anda :<br/>
        <i>(Informasi ini Bersifat Rahasia)</i><br/><br/>
        <table><tr><td>Username</td> <td>:</td> <td>' .$nia. '</td></tr>
        <tr><td>Password</td> <td>:</td> <td>' .$password.
        '<td></tr></table> <br/> Keterangan : Password dibuat otomatis oleh sistem, silakan diubah!<br/><br/>
        <div style="color:#7f8c8d;">Jika anda mengalami kendala dalam akses, dapat menghubungi Tim Database Cabang atau Anak Cabang di wilayah anda.<br/> <br/>
        Terimakasih<br/><br/>Tim Database Wilayah<br/><br/>
        <img src="https://sipadu.ipnujateng.or.id/sipadu-template/assets/img/logo-login.png" width="300px"/><br/> <br/>
        Jl. Dr. Cipto No.180 Kota Semarang<br/>sipadu@ipnujateng.or.id<br/><a href="https://api.whatsapp.com/send?phone=6281906806090">+62 819-0680-6090</a>
        </div>');
        $this->email->send();

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('user/verifikasianggota');
    }
    public function printanggotapc()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/printanggotapc', $data);
    }
    public function exportanggotapc()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/exportanggotapc', $data);
    }
    public function anggotapcranting()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $id_pimpinan_rk = $this->input->get('id');
        $data['ranting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Anggotapcranting');
        $this->load->view('template/footerUser');
    }
    public function anggotapac()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->where('id_pimpinan', $pimp);
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();
        $pac = $this->input->get('id2');
        $data['ac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.id_pimpinan', $this->input->get('id'));
        $this->db->where('anggota.id_pimpinan_ac', $this->input->get('id2'));
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotapac');
        $this->load->view('template/footerUser');
    }
    public function printanggotapac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pac = $this->input->get('id2');

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pac);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/printanggotapac', $data);
    }

    public function exportanggotapac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pac = $this->input->get('id2');

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pac);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/exportanggotapac', $data);
    }
    public function anggotapkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pkpt'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('kd_pimpinan_ac');
        $data['pkpt'] = $this->db->get('pimpinan_ac')->result_array();
        $id_pkpt = $this->input->get('id2');
        $data['data_pkpt'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.id_pimpinan', $pimp);
        $this->db->where('anggota.id_pimpinan_ac', $this->input->get('id2'));
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotapkpt');
        $this->load->view('template/footerUser');
    }
    public function printanggotapkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pkpt = $this->input->get('id2');

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.kategori_data', $kat);
        //$this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pkpt);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/printanggotapkpt', $data);
    }

    public function exportanggotapkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pkpt = $this->input->get('id2');

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.kategori_data', $kat);
        //$this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pkpt);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/exportanggotapkpt', $data);
    }
    public function anggotapr()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['get_rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id3')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();
        $tingkatan= $this->session->userdata('tingkatan');

        if($tingkatan=='PC'){
            $this->db->select('*');
            $this->db->where('kategori_data', $kat);
            $this->db->order_by('kd_pimpinan_rk');
            $data['prpk'] = $this->db->get('pimpinan_rk')->result_array();
        }
        elseif($tingkatan=='PAC'){
            $pac=$this->session->userdata('id_pimpinan');
            $this->db->select('*');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pac);
            $this->db->order_by('kd_pimpinan_rk');
            $data['prpk'] = $this->db->get('pimpinan_rk')->result_array();
        }


        //$pc = $this->input->get('id');
        //$pac = $this->input->get('id2');
        //$prpk = $this->input->get('id3');
        $data['ac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id')])->row_array();
        $data['rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id2')])->row_array();


        if($tingkatan=='PC'){
            $this->db->select('*');
            $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
            $this->db->where('anggota.kategori_data', $kat);
            $this->db->where('anggota.id_pimpinan', $this->input->get('id'));
            $this->db->where('anggota.id_pimpinan_ac', $this->input->get('id2'));
            $this->db->where('anggota.id_pimpinan_rk', $this->input->get('id3'));
            $this->db->where_not_in('aktif_kepengurusan', 'PW');
            $this->db->order_by('id_anggota');
            $data['anggota'] = $this->db->get('anggota')->result_array();
        }
        elseif($tingkatan=='PAC'){
            $this->db->select('*');
            $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
            $this->db->where('anggota.kategori_data', $kat);
            $this->db->where('anggota.id_pimpinan_rk', $this->input->get('id3'));
            $this->db->where_not_in('aktif_kepengurusan', 'PW');
            $this->db->order_by('id_anggota');
            $data['anggota'] = $this->db->get('anggota')->result_array();
        }

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotapr');
        $this->load->view('template/footerUser');
    }
    public function printanggotark()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['get_rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id3')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pac = $this->input->get('id2');
        $prpk = $this->input->get('id3');

        $this->db->select('*');
        $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pac);
        $this->db->where('anggota.id_pimpinan_rk', $prpk);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/printanggotark', $data);
    }
    public function exportanggotark()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();
        $data['get_rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id3')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');
        $pac = $this->input->get('id2');
        $prpk = $this->input->get('id3');

        $this->db->select('*');
        $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where('anggota.id_pimpinan_ac', $pac);
        $this->db->where('anggota.id_pimpinan_rk', $prpk);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('operator/exportanggotark', $data);
    }
    public function inanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $get_admin = $this->session->userdata('ket');
        $tingkatan= $this->session->userdata('tingkatan');
        if ($tingkatan=='PC'){
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        }
        elseif ($tingkatan=='PAC'){
            $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('ket')])->row_array();
        }
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();


        if ($tingkatan=='PC'){
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();
        }
        elseif ($tingkatan=='PAC'){
            $id = $get_admin;
            $this->db->select('*');
            $this->db->where('kategori_data', $kat);
            $this->db->where('pimpinan', 'PC');
            $this->db->where('id_pimpinan', $id);
            $this->db->order_by('kd_pimpinan');
            $data['cabang'] = $this->db->get('pimpinan')->result_array();
        }
        //$data['pimpinan_cabang'] = $this->db->get('pimpinan')->result_array();
        if ($tingkatan=='PC'){
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();
        }
        elseif ($tingkatan=='PAC'){
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();
        }

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('kd_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();

        //$this->db->where('id_pimpinan', 'PM615052');
        if ($tingkatan=='PC'){
        $id = $this->session->userdata('id_pimpinan');
        $this->db->from('anggota');
        $this->db->where('id_pimpinan', $id);
        $data['jumlah'] = $this->db->count_all_results();
        }

        elseif ($tingkatan=='PAC'){
        $id = $get_admin;
        $this->db->from('anggota');
        $this->db->where('id_pimpinan', $id);
        $data['jumlah'] = $this->db->count_all_results();
        }

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inanggota');
        $this->load->view('template/footerUser');
    }
    public function addanggota()
    {
        $this->load->library('form_validation');
      $this->form_validation->set_rules(
      'is_unique[anggota.email]',
        array(
                'is_unique'     => 'This %s already exists.'
        )
      );
      $this->form_validation->set_rules('email', 'email', 'is_unique[anggota.email]');
      if ($this->form_validation->run() == FALSE)
        {
            $id_pimpinan =$this->input->post('id_pimpinan');
            $id_pimpinan_ac =$this->input->post('id_pimpinan_ac');
            $this->session->set_flashdata('flash', 'Terpakai');
            if($this->input->post('jenis')=='PKPT'){
            redirect('user/inanggotapkpt?id=&id2=' .$id_pimpinan_ac);
            }else{
            redirect('user/inanggota?id=' .$id_pimpinan);
            }
        }
        else
        {
        $nia = $this->input->post('urut');
        $nia_urut = str_pad($nia,5,"0",STR_PAD_LEFT) ;
        $pw = $this->input->post('pw');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $rkpost = $this->input->post('id_pimpinan_rk');
        $this->db->select('*');
        $this->db->where('id_pimpinan_rk', $rkpost);
        $A = $this->db->get('pimpinan_rk')->row_array();
        $idP1 = $A['kd_pimpinan_rk'];

        $acpost = $this->input->post('id_pimpinan_ac');
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $acpost);
        $B = $this->db->get('pimpinan_ac')->row_array();
        $idP2 = $B['kd_pimpinan_ac'];

        $pcpost = $this->input->post('id_pimpinan');
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pcpost);
        $C = $this->db->get('pimpinan')->row_array();
        $pc = $C['kd_pimpinan'];

        $tgl_masuk = $this->input->post('waktu_makesta');
        $th=substr($tgl_masuk,2,2);

        $tgl_lahir = $this->input->post('tanggal_lahir');
        $th_lahir=substr($tgl_lahir,2,2);

        $nia_jadi = $pw . '.' . $pc. '.' .$th_lahir. '.' .$nia_urut;

        $config['upload_path'] = './upload/anggota/';
        $config['allowed_types'] = 'jpeg|jpg|png';


        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $name = $this->upload->data('file_name');

        $datanonformal = implode(", ",$this->input->post('pelatihan_nonformal'));

        $data = [
            'nia' => $nia_jadi,
            'nama' => $this->input->post('nama'),
            'kategori_data' => $this->input->post('kategori_data'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'id_pw' => '18',
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'id_pimpinan_ac' => $this->input->post('id_pimpinan_ac'),
            'id_pimpinan_rk' => $this->input->post('id_pimpinan_rk'),
            'aktif_kepengurusan' => $this->input->post('aktif_kepengurusan'),
            'pelatihan_formal' => $this->input->post('pelatihan_formal'),
            'makesta' => $this->input->post('makesta'),
            'penyelenggara_makesta' => $this->input->post('penyelenggara_makesta'),
            'tempat_makesta' => $this->input->post('tempat_makesta'),
            'waktu_makesta' => $this->input->post('waktu_makesta'),
            'lakmud' => $this->input->post('lakmud'),
            'penyelenggara_lakmud' => $this->input->post('penyelenggara_lakmud'),
            'tempat_lakmud' => $this->input->post('tempat_lakmud'),
            'waktu_lakmud' => $this->input->post('waktu_lakmud'),
            'lakut' => $this->input->post('lakut'),
            'penyelenggara_lakut' => $this->input->post('penyelenggara_lakut'),
            'tempat_lakut' => $this->input->post('tempat_lakut'),
            'waktu_lakut' => $this->input->post('waktu_lakut'),
            'pelatihan_nonformal' => $datanonformal,
            'status_cbp' => $this->input->post('status_cbp'),
            //'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'tempat_input_kta' => $this->input->post('tempat_input_kta'),
            'tanggal_input_kta' => $this->input->post('tanggal_input_kta'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'pendidikan_sd' => $this->input->post('pendidikan_sd'),
            'pendidikan_smp' => $this->input->post('pendidikan_smp'),
            'pendidikan_sma' => $this->input->post('pendidikan_sma'),
            'pendidikan_pt' => $this->input->post('pendidikan_pt'),
            'pendidikan_nonformal' => $this->input->post('pendidikan_nonformal'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'fb' => $this->input->post('fb'),
            'ig' => $this->input->post('ig'),
            'twitter' => $this->input->post('twitter'),
            'password' => base64_encode($tgl_lahir),
            'status_verifikasi' => 'belum',
            'foto' => $name

        ];
        $this->db->insert('anggota', $data);
        $tingkatan= $this->session->userdata('tingkatan');
        $id_pimpinan =$this->input->post('id_pimpinan');
        $id_pimpinan_ac =$this->input->post('id_pimpinan_ac');

        $this->session->set_flashdata('flash', 'Tersimpan');
        if($tingkatan=='PC'){
            redirect('user/anggotapc');
        }
        elseif($tingkatan=='PAC'){
            redirect('user/anggotapac?id=' .$id_pimpinan. '&id2=' .$id_pimpinan_ac);
        }
    }
    }
    public function addanggotaippnu()
    {
        $this->load->library('form_validation');
      $this->form_validation->set_rules(
      'is_unique[anggota.email]',
        array(
                'is_unique'     => 'This %s already exists.'
        )
      );
      $this->form_validation->set_rules('email', 'email', 'is_unique[anggota.email]');
      if ($this->form_validation->run() == FALSE)
        {
            $id_pimpinan =$this->input->post('id_pimpinan');
            $id_pimpinan_ac =$this->input->post('id_pimpinan_ac');
            $this->session->set_flashdata('flash', 'Terpakai');
            if($this->input->post('jenis')=='PKPT'){
            redirect('user/inanggotapkpt?id=&id2=' .$id_pimpinan_ac);
            }else{
            redirect('user/inanggota?id=' .$id_pimpinan);
            }
        }
        else
    {
        $nia = $this->input->post('urut');
        $nia_urut = str_pad($nia,4,"0",STR_PAD_LEFT) ;
        $pw = $this->input->post('pw');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $rkpost = $this->input->post('id_pimpinan_rk');
        $this->db->select('*');
        $this->db->where('id_pimpinan_rk', $rkpost);
        $A = $this->db->get('pimpinan_rk')->row_array();
        $idP1 = $A['kd_pimpinan_rk'];

        $acpost = $this->input->post('id_pimpinan_ac');
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $acpost);
        $B = $this->db->get('pimpinan_ac')->row_array();
        $idP2 = $B['kd_pimpinan_ac'];

        $pcpost = $this->input->post('id_pimpinan');
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pcpost);
        $C = $this->db->get('pimpinan')->row_array();
        $pc = $C['kd_pimpinan'];

        $tgl_masuk = $this->input->post('waktu_makesta');
        $th=substr($tgl_masuk,2,2);
        $bln=substr($tgl_masuk,5,2);

        $tgl_lahir = $this->input->post('tanggal_lahir');
        $th_lahir=substr($tgl_lahir,2,2);

        $nia_jadi = $pw . '' . $pc. '' .$th. '' .$bln. ''  .$nia_urut;

        $config['upload_path'] = './upload/anggota/';
        $config['allowed_types'] = 'jpeg|jpg|png';


        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $name = $this->upload->data('file_name');

        $datanonformal = implode(", ",$this->input->post('pelatihan_nonformal'));

        $data = [
            'nia' => $nia_jadi,
            'nama' => $this->input->post('nama'),
            'kategori_data' => $this->input->post('kategori_data'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'id_pw' => '38',
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'id_pimpinan_ac' => $this->input->post('id_pimpinan_ac'),
            'id_pimpinan_rk' => $this->input->post('id_pimpinan_rk'),
            'aktif_kepengurusan' => $this->input->post('aktif_kepengurusan'),
            'pelatihan_formal' => $this->input->post('pelatihan_formal'),
            'makesta' => $this->input->post('makesta'),
            'penyelenggara_makesta' => $this->input->post('penyelenggara_makesta'),
            'tempat_makesta' => $this->input->post('tempat_makesta'),
            'waktu_makesta' => $this->input->post('waktu_makesta'),
            'lakmud' => $this->input->post('lakmud'),
            'penyelenggara_lakmud' => $this->input->post('penyelenggara_lakmud'),
            'tempat_lakmud' => $this->input->post('tempat_lakmud'),
            'waktu_lakmud' => $this->input->post('waktu_lakmud'),
            'lakut' => $this->input->post('lakut'),
            'penyelenggara_lakut' => $this->input->post('penyelenggara_lakut'),
            'tempat_lakut' => $this->input->post('tempat_lakut'),
            'waktu_lakut' => $this->input->post('waktu_lakut'),
            'pelatihan_nonformal' => $datanonformal,
            'status_cbp' => $this->input->post('status_cbp'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'tempat_input_kta' => $this->input->post('tempat_input_kta'),
            'tanggal_input_kta' => $this->input->post('tanggal_input_kta'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'pendidikan_sd' => $this->input->post('pendidikan_sd'),
            'pendidikan_smp' => $this->input->post('pendidikan_smp'),
            'pendidikan_sma' => $this->input->post('pendidikan_sma'),
            'pendidikan_pt' => $this->input->post('pendidikan_pt'),
            'pendidikan_nonformal' => $this->input->post('pendidikan_nonformal'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'fb' => $this->input->post('fb'),
            'ig' => $this->input->post('ig'),
            'twitter' => $this->input->post('twitter'),
            'foto' => $name

        ];
        $this->db->insert('anggota', $data);
        $tingkatan= $this->session->userdata('tingkatan');
        $id_pimpinan =$this->input->post('id_pimpinan');
        $id_pimpinan_ac =$this->input->post('id_pimpinan_ac');

        $this->session->set_flashdata('flash', 'Tersimpan');
        if($tingkatan=='PC'){
            redirect('user/anggotapc');
        }
        elseif($tingkatan=='PAC'){
            redirect('user/anggotapac?id=' .$id_pimpinan. '&id2=' .$id_pimpinan_ac);
        }
    }
    }
    public function inanggotapkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id = $this->input->get('id');
        $id2 = $this->input->get('id2');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        //$data['pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan_ac', $id2);
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('kd_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();

        //$this->db->where('id_pimpinan', 'PM615052');

        $this->db->from('anggota');
        $this->db->where('id_pimpinan', $id);
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/inanggotapkpt');
        $this->load->view('template/footerUser');
    }
    public function printformanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('operator/printformanggota', $data);
    }
    public function deleteanggota()
    {
        $id_anggota = $this->input->get('id');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $this->db->delete('anggota', ['id_anggota' => $id_anggota]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/anggotapc');
    }
    public function viewanggota()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        //$data['admin'] = $this->db->get_where('admin_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/viewanggota');
        $this->load->view('template/footerUser');
    }

    public function printktaipnu()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();


        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();
        $data['cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();

        $this->load->view('operator/printktaipnu', $data);
    }
    public function printktaippnu()
    {
      //data default parameter
      $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
      $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
      $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
      $pimp = $data['id_pimpinan'];
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();


      //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
      $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();
      $data['cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();
      $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();

      $this->load->view('operator/printktaippnu', $data);
    }
    public function editanggota()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_anggota = $this->input->get('id');
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editanggota');
        $this->load->view('template/footerUser');
    }
    public function updateanggota()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan=$this->input->post('id_pimpinan');
        $id_anggota = $this->input->post('id');
        $datanonformal = implode(", ",$this->input->post('pelatihan_nonformal'));
        $state =
            [
              'nia' => $this->input->post('nia'),
              'nama' => $this->input->post('nama'),
              'tempat_lahir' => $this->input->post('tempat_lahir'),
              'tanggal_lahir' => $this->input->post('tanggal_lahir'),
              'alamat_lengkap' => $this->input->post('alamat_lengkap'),
              'nama_ayah' => $this->input->post('nama_ayah'),
              'nama_ibu' => $this->input->post('nama_ibu'),
              'aktif_kepengurusan' => $this->input->post('aktif_kepengurusan'),
              'pelatihan_formal' => $this->input->post('pelatihan_formal'),
              'makesta' => $this->input->post('makesta'),
              'penyelenggara_makesta' => $this->input->post('penyelenggara_makesta'),
              'tempat_makesta' => $this->input->post('tempat_makesta'),
              'waktu_makesta' => $this->input->post('waktu_makesta'),
              'lakmud' => $this->input->post('lakmud'),
              'penyelenggara_lakmud' => $this->input->post('penyelenggara_lakmud'),
              'tempat_lakmud' => $this->input->post('tempat_lakmud'),
              'waktu_lakmud' => $this->input->post('waktu_lakmud'),
              'lakut' => $this->input->post('lakut'),
              'penyelenggara_lakut' => $this->input->post('penyelenggara_lakut'),
              'tempat_lakut' => $this->input->post('tempat_lakut'),
              'waktu_lakut' => $this->input->post('waktu_lakut'),
              'pelatihan_nonformal' => $datanonformal,
              'status_cbp' => $this->input->post('status_cbp'),
              'tanggal_masuk' => $this->input->post('tanggal_masuk'),
              'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
              'pendidikan_sd' => $this->input->post('pendidikan_sd'),
              'pendidikan_smp' => $this->input->post('pendidikan_smp'),
              'pendidikan_sma' => $this->input->post('pendidikan_sma'),
              'pendidikan_pt' => $this->input->post('pendidikan_pt'),
              'pendidikan_nonformal' => $this->input->post('pendidikan_nonformal'),
              'email' => $this->input->post('email'),
              'no_hp' => $this->input->post('no_hp'),
              'fb' => $this->input->post('fb'),
              'ig' => $this->input->post('ig'),
              'twitter' => $this->input->post('twitter')
            ];
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $state);
        $tingkatan= $this->session->userdata('tingkatan');

        if($tingkatan=='PC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/viewanggota?id=' .$id_anggota);
        }
        elseif($tingkatan=='PAC'){
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('user/viewanggota?id=' .$id_anggota);
        }
    }
    public function editfotoanggota()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_anggota = $this->input->get('id');
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/editfotoanggota');
        $this->load->view('template/footerUser');
    }
    public function updatefotoanggota()
    {
        $id_anggota = $this->input->post('id');

        $config['upload_path'] = './upload/anggota/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $name = $this->upload->data('file_name');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $state =
            [
              'foto' => $name
            ];
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('user/viewanggota?id=' .$id_anggota);
    }
    public function statistikorganisasi()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();
        }

        $this->db->count_all('pimpinan');
        $this->db->where('pimpinan', 'PC');
        $this->db->where('kategori_data', $kat);
        $this->db->from('pimpinan');
        $data['pc'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_ac');
        $data['pac'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['pac_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt_aktif'] = $this->db->count_all_results();

        if($tingkatan=='PC'){
        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_rk');
        $data['ranting'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['ranting_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->from('pimpinan_rk');
        $data['komisariat'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('kategori_data', $kat);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['komisariat_aktif'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PR');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->from('pimpinan_rk');
            $data['ranting'] = $this->db->count_all_results();

            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PR');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->where('status_aktif', 'aktif');
            $this->db->from('pimpinan_rk');
            $data['ranting_aktif'] = $this->db->count_all_results();

            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PK');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->from('pimpinan_rk');
            $data['komisariat'] = $this->db->count_all_results();

            $this->db->count_all('pimpinan_rk');
            $this->db->where('pimpinan_rk', 'PK');
            $this->db->where('kategori_data', $kat);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->where('status_aktif', 'aktif');
            $this->db->from('pimpinan_rk');
            $data['komisariat_aktif'] = $this->db->count_all_results();
        }

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/statistikorganisasi');
        $this->load->view('template/footerUser');
    }
    public function potensikader()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'makesta');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['makesta'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakmud');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['lakmud'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakut');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['lakut'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('status_cbp', 'ya');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['cbp'] = $this->db->count_all_results();
        }
        elseif($tingkatan=='PAC'){
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'makesta');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['makesta'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakmud');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['lakmud'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakut');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['lakut'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('status_cbp', 'ya');
        $this->db->where('id_pimpinan_ac', $pimp);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['cbp'] = $this->db->count_all_results();
        }

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/potensikader');
        $this->load->view('template/footerUser');
    }
    public function potensikaderranting()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $id_pimpinan_rk = $this->input->get('id');
        $data['ranting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->where('pelatihan', 'PKD');
        $this->db->from('anggota');
        $data['pkd'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->where('pelatihan', 'PKL');
        $this->db->from('anggota');
        $data['pkl'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->where('pelatihan', 'PKN');
        $this->db->from('anggota');
        $data['pkn'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->where('pelatihan', 'Belum Pengkaderan');
        $this->db->from('anggota');
        $data['belum'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/potensikader');
        $this->load->view('template/footerUser');
    }
    public function suratkeluar()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal_surat');
        $data['suratkeluar'] = $this->db->get('surat_keluar')->result_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/suratkeluar');
        $this->load->view('template/footerUser');
    }
    public function insuratkeluar()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Insuratkeluar');
        $this->load->view('template/footerUser');
    }
    public function editsuratkeluar()
    {
        $id_sk = $this->input->get('id');
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratkeluar'] = $this->db->get_where('surat_keluar', ['id_sk' => $id_sk])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Editsuratkeluar');
        $this->load->view('template/footerUser');
    }
    public function updatesuratkeluar()
    {
        $id_sk = $this->input->post('id_sk');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $state =
            [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'website' => $this->input->post('website'),
                'no_telpon' => $this->input->post('no_telpon'),
                'sekretariat' => $this->input->post('sekretariat')
            ];
        $this->db->where('id_sk', $id_sk);
        $this->db->update('surat_keluar', $state);

        redirect('admin/suratkeluar');
    }
    public function deletesuratkeluar()
    {
        $id_sk = $this->input->get('id');
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $this->db->delete('surat_keluar', ['id_sk' => $id_sk]);
        redirect('admin/suratkeluar');
    }
    public function suratmasuk()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal_surat_diterima');
        $data['suratmasuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/suratmasuk');
        $this->load->view('template/footerUser');
    }
    public function inventarisbarang()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('nama_barang');
        $data['inventarisbarang'] = $this->db->get('inventaris_barang')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/inventarisbarang');
        $this->load->view('template/footerUser');
    }
    public function keuangan()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal_transaksi');
        $data['keuangan'] = $this->db->get('keuangan')->result_array();

        $this->db->select_sum('masuk');
        $this->db->where('id_pimpinan', 'PM615052');
        $data['masuk'] = $this->db->get('keuangan')->row_array();

        $this->db->select_sum('keluar');
        $this->db->where('id_pimpinan', 'PM615052');
        $data['keluar'] = $this->db->get('keuangan')->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/keuangan');
        $this->load->view('template/footerUser');
    }
    public function downloadperaturan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('judul_file');
        $data['download_peraturan'] = $this->db->get('download_peraturan')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/downloadperaturan');
        $this->load->view('template/footerUser');
    }
    public function rencanakegiatan()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('rencana_waktu_mulai');
        $data['rencanakegiatan'] = $this->db->get('rencana_kegiatan')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/rencanakegiatan');
        $this->load->view('template/footerUser');
    }
    public function daftarkegiatan()
    {
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal');
        $data['daftarkegiatan'] = $this->db->get('daftar_kegiatan')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/daftarkegiatan');
        $this->load->view('template/footerUser');
    }

    public function datapr()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->join('pimpinan_ac', 'id_pimpinan');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('pimpinan_rk.kategori_data', $this->session->userdata('kategori'));
        $this->db->where('pimpinan_rk.status_aktif', 'aktif');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('id_pimpinan');
        $this->db->order_by('kd_pimpinan_ac');
        $this->db->group_by('id_pimpinan_rk');
        $data['data_pr'] = $this->db->get('pimpinan_rk')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/datapr');
        $this->load->view('template/footerUser');
    }
    public function datapkpt()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('pimpinan_ac.kategori_data', $this->session->userdata('kategori'));
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('pimpinan_ac.status_aktif', 'aktif');
        $this->db->order_by('id_pimpinan');
        $data['data_pkpt'] = $this->db->get('pimpinan_ac')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/datapkpt');
        $this->load->view('template/footerUser');
    }
    public function datapk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->join('pimpinan_ac', 'id_pimpinan');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('pimpinan_rk.kategori_data', $this->session->userdata('kategori'));
        $this->db->where('pimpinan_rk.status_aktif', 'aktif');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('id_pimpinan');
        $this->db->order_by('kd_pimpinan_ac');
        $this->db->group_by('id_pimpinan_rk');
        $data['data_pk'] = $this->db->get('pimpinan_rk')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/datapk');
        $this->load->view('template/footerUser');
    }
    public function anggotacbp()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('status_cbp', 'ya');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();
        }
        elseif($tingkatan=='PAC'){
            $this->db->select('*');
            $this->db->join('pimpinan', 'id_pimpinan');
            $this->db->where('anggota.kategori_data', $kat);
            $this->db->where('status_cbp', 'ya');
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->order_by('id_anggota');
            $data['anggota'] = $this->db->get('anggota')->result_array();
        }
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotacbp');
        $this->load->view('template/footerUser');
    }
    public function anggotaformal()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $kaderisasi = $this->input->get('id');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $tingkatan = $this->session->userdata('tingkatan');
        if($tingkatan=='PC'){
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('pelatihan_formal', $kaderisasi);
        $this->db->where('id_pimpinan', $pimp);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();
        }
        elseif($tingkatan=='PAC'){
            $this->db->select('*');
            $this->db->join('pimpinan', 'id_pimpinan');
            $this->db->where('anggota.kategori_data', $kat);
            $this->db->where('pelatihan_formal', $kaderisasi);
            $this->db->where('id_pimpinan_ac', $pimp);
            $this->db->order_by('id_anggota');
            $data['anggota'] = $this->db->get('anggota')->result_array();
        }


        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/anggotaformal');
        $this->load->view('template/footerUser');
    }

    public function incoba()
    {

        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Incoba');
        $this->load->view('template/footerUser');
    }
    public function addcoba()
    {
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();
        $data = [
            'id_coba' => $this->input->post('id_pimpinan'),
            'foto' => $this->input->post('id_pimpinan')
        ];
        $this->db->insert('coba', $data);
        redirect('admin/incoba');
    }


}
