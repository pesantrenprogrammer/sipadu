<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            # code...
            redirect('/');
        }
        if ($this->session->userdata('level') == 'user') {
            redirect('/user');
        }
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    //public function index()
    //{
      //  $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
      //  $this->load->view('template/headerTemplate', $data);
      //  $this->load->view('home/index', $data);
     //   $this->load->view('template/footerTemplate');
    //}
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        redirect('/');
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

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/about');
        $this->load->view('template/footerTemplate');
    }
    public function dashboard()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->where('kategori_data', $kat);
        $this->db->where('status_verifikasi', 'belum');
        $this->db->from('anggota');
        $data['belumverifikasi'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan');
        $this->db->where('pimpinan', 'PC');
        $this->db->where('kategori_data', $kat);
        $this->db->from('pimpinan');
        $data['pc'] = $this->db->count_all_results();

        $this->db->select_sum('masuk');
        $this->db->select_sum('keluar');
        $this->db->from('keuangan');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data ['jumlah_keuangan'] = $this->db->get()->result_array();

        $this->db->count_all('surat_masuk');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->from('surat_masuk');
        $data['sm'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/template');
        $this->load->view('template/footerTemplate');
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

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/aplikasi');
        $this->load->view('template/footerTemplate');
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

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editaplikasi_foto');
        $this->load->view('template/footerTemplate');
    }
    public function updateaplikasi_foto()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');

      $config['upload_path'] = './upload/setting-app/';
      $config['allowed_types'] = 'jpg|png';
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
      redirect('admin/aplikasi');
    }

    public function editaplikasi_dokumen()
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

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editaplikasi_dokumen');
        $this->load->view('template/footerTemplate');
    }
    public function updateaplikasi_dokumen()
    {
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
      redirect('admin/aplikasi');
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

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editaplikasi_text');
        $this->load->view('template/footerTemplate');
    }
    public function updateaplikasi_text()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');

        $state =
            [
                $namakolom => $kolom
            ];
        $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
        $this->db->update('pengaturan_pimpinan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/aplikasi');
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

        $this->db->join('pimpinan', 'id_pimpinan');
        $data['aplikasi'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $pimp])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editaplikasi_date');
        $this->load->view('template/footerTemplate');
    }
    public function updateaplikasi_date()
    {
      $id_pengaturan = $this->input->post('id');
      $kolom = $this->input->post('kolom');
      $namakolom = $this->input->post('namakolom');

        $state =
            [
                $namakolom => $kolom
            ];
        $this->db->where('id_pengaturan_pimpinan', $id_pengaturan);
        $this->db->update('pengaturan_pimpinan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/aplikasi');
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

        $this->db->select('*');
        $this->db->where('pimpinan', 'PC');
        $this->db->where('kategori_data', $this->session->userdata('kategori'));
        $this->db->order_by('kd_pimpinan');
        $data['pimpinan'] = $this->db->get('pimpinan')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/kodedaerah');
        $this->load->view('template/footerTemplate');
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

        $id_pimpinan = $this->input->get('id');
        $data['kodedaerah'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editpc');
        $this->load->view('template/footerTemplate');
    }
    public function updatepc()
    {
        $id_pimpinan = $this->input->post('id_pimpinan');
        $state =
            [
                'nama_pimpinan' => $this->input->post('nama_pimpinan'),
                'kd_pimpinan' => $this->input->post('kd_pimpinan')
            ];
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->update('pimpinan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/kodedaerah');
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
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();

        $this->db->select('*');
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('kd_pimpinan_ac');
        $data['pimpinan'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/kodepac');
        $this->load->view('template/footerTemplate');
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

        //$id_pimpinan_ac = $this->input->get('id');
        $id_pimpinan = $this->input->get('id');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inpac');
        $this->load->view('template/footerTemplate');
    }
    public function addpac()
    {
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $pimpinan = $this->input->post('id_pimpinan');

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
        redirect('admin/kodepac?id=' .$pimpinan );
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

        $id_pimpinan_ac = $this->input->get('id');
        $data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editpac');
        $this->load->view('template/footerTemplate');
    }
    public function updatepac()
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
        redirect('admin/kodepac?id=' .$id_pimpinan);
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
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/kodepkpt');
        $this->load->view('template/footerTemplate');
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
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inpkpt');
        $this->load->view('template/footerTemplate');
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
        redirect('admin/kodepkpt?id=' .$pimpinan );
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
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editpkpt');
        $this->load->view('template/footerTemplate');
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
        redirect('admin/kodepkpt?id=' .$id_pimpinan);
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

        $id_pimpinan = $this->input->get('id2');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->order_by('kd_pimpinan_rk');
        $data['pimpinan'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/koderanting');
        $this->load->view('template/footerTemplate');
    }
    public function kodekomisariat()
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

        $id_pimpinan = $this->input->get('id2');
        $data['pimpinan_cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $id_pimpinan])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->order_by('kd_pimpinan_rk');
        $data['pimpinan'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/kodekomisariat');
        $this->load->view('template/footerTemplate');
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

        $id_pimpinan_ac = $this->input->get('id');
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $id_pimpinan = $this->input->get('id2');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inranting');
        $this->load->view('template/footerTemplate');
    }
    public function addranting()
    {
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan = $this->input->post('id_pimpinan');
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
        redirect('admin/koderanting?id2=' .$id_pimpinan.'&id=' .$id_pimpinan_ac);
        }else{
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/kodekomisariat?id2=' .$id_pimpinan.'&id=' .$id_pimpinan_ac);
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

        $id_pimpinan_rk = $this->input->get('id_rk');
        $data['koderanting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editranting');
        $this->load->view('template/footerTemplate');
    }
    public function updateranting()
    {
        $id_pimpinan = $this->input->post('id_pimpinan');
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan_rk = $this->input->post('id_pimpinan_rk');
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
        redirect('admin/koderanting?id2='.$id_pimpinan.'&id='.$id_pimpinan_ac);
        }else{
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/kodekomisariat?id2='.$id_pimpinan.'&id='.$id_pimpinan_ac);
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
        //$pc=$this->input->get('pc');

        $this->db->select('*');
        $this->db->where('aktif', 'Y');
        //$this->db->where('ket', $pimp);
        $this->db->where('kategori_user', $kat);
        $this->db->order_by('username');
        $data['manajemenuser'] = $this->db->get('admin_users')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/user');
        $this->load->view('template/footerTemplate');
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

        $id_user = $this->input->get('id');
        $data['user'] = $this->db->get_where('admin_users', ['id_user' => $id_user])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/edituser');
        $this->load->view('template/footerTemplate');
    }
    public function updateuser()
    {
        $id_user = $this->input->post('id_user');
        $state =
            [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_telpon' => $this->input->post('no_telpon'),
                'sekretariat' => $this->input->post('sekretariat')
            ];
        $this->db->where('id_user', $id_user);
        $this->db->update('admin_users', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/manajemenuser');
    }
    public function deleteuser()
    {
        $id_user = $this->input->get('id');
        $this->db->delete('admin_users', ['id_user' => $id_user]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/manajemenuser');
    }
    public function inuserpw()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inuserpw');
        $this->load->view('template/footerTemplate');
    }
    public function inusercabang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['pimpinan_cabang'] = $this->db->get('pimpinan')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inusercabang');
        $this->load->view('template/footerTemplate');
    }
    public function inuserpac()
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
        $data['pimpinan_cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('nama_pimpinan_ac');
        $data['anakcabang'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inuserpac');
        $this->load->view('template/footerTemplate');
    }
    public function inuserpilihranting()
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
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('nama_pimpinan_ac');
        $data['anakcabang'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inuserpilihranting');
        $this->load->view('template/footerTemplate');
    }
    public function inuserranting()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->order_by('nama_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inuserranting');
        $this->load->view('template/footerTemplate');
    }
    public function adduser()
    {
      $data['kategori_data'] = $this->session->userdata('kategori');
      $kat = $data['kategori_data'];
      $tingkatan = $this->input->post('tingkatan');
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
            'ket' => $this->input->post('id_pimpinan'),
            'aktif' => 'Y'
        ];
        $this->db->insert('admin_users', $data);

        $data_setting = [
            'id_pimpinan' =>$this->input->post('id_pimpinan'),
            'tingkatan' => 'PC'
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
        redirect('admin/manajemenuser');
    }
    public function penguruspw()
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
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->where('aktif_kepengurusan', 'PW');
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/penguruspw');
        $this->load->view('template/footerTemplate');
    }
    public function anggotapw()
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
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotapw');
        $this->load->view('template/footerTemplate');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('status_verifikasi', 'belum');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/verifikasianggota');
        $this->load->view('template/footerTemplate');
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
        redirect('admin/verifikasianggota');
    }
    public function printanggotapw()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('home/printanggotapw', $data);
    }
    public function exportanggotapw()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('home/exportanggotapw', $data);
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();

        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.id_pimpinan', $this->input->get('id'));
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotapc');
        $this->load->view('template/footerTemplate');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('home/printanggotapc', $data);
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $pc = $this->input->get('id');

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $pc);
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('home/exportanggotapc', $data);
    }
    public function anggotapac()
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
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

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

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotapac');
        $this->load->view('template/footerTemplate');
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

        $this->load->view('home/printanggotapac', $data);
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

        $this->load->view('home/exportanggotapac', $data);
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
        $data['get_pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id')])->row_array();
        $data['get_pkpt'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->order_by('kd_pimpinan_ac');
        $data['pkpt'] = $this->db->get('pimpinan_ac')->result_array();
        $id_pkpt = $this->input->get('id2');
        $data['data_pkpt'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.id_pimpinan', $this->input->get('id'));
        $this->db->where('anggota.id_pimpinan_ac', $this->input->get('id2'));
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotapkpt');
        $this->load->view('template/footerTemplate');
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

        $this->load->view('home/printanggotapkpt', $data);
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

        $this->load->view('home/exportanggotapkpt', $data);
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
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('kd_pimpinan_rk');
        $data['prpk'] = $this->db->get('pimpinan_rk')->result_array();

        //$pc = $this->input->get('id');
        //$pac = $this->input->get('id2');
        //$prpk = $this->input->get('id3');
        $data['ac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id')])->row_array();
        $data['rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('anggota.id_pimpinan', $this->input->get('id'));
        $this->db->where('anggota.id_pimpinan_ac', $this->input->get('id2'));
        $this->db->where('anggota.id_pimpinan_rk', $this->input->get('id3'));
        $this->db->where_not_in('aktif_kepengurusan', 'PW');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotapr');
        $this->load->view('template/footerTemplate');
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

        $this->load->view('home/printanggotark', $data);
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

        $this->load->view('home/exportanggotark', $data);
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

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        //$data['pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->order_by('kd_pimpinan');
        $data['cabang'] = $this->db->get('pimpinan')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('kd_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();

        //$this->db->where('id_pimpinan', 'PM615052');
        $id = $this->input->get('id');
        $this->db->from('anggota');
        $this->db->where('id_pimpinan', $id);
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inanggota');
        $this->load->view('template/footerTemplate');
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

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id = $this->input->get('id');
        $id2 = $this->input->get('id2');
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        //$data['pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->where('id_pimpinan', $id);
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



        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inanggotapkpt');
        $this->load->view('template/footerTemplate');
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
          $this->session->set_flashdata('flash', 'Terpakai');
          if($this->input->post('jenis')=='PKPT'){
          redirect('admin/inanggotapkpt?id=' .$id_pimpinan.'&id2='.$id_pimpinan_ac);
          }else{
          redirect('admin/inanggota?id=' .$id_pimpinan);
          }
        }
        else
        {
          $nia = $this->input->post('urut');
          $nia_urut = str_pad($nia,5,"0",STR_PAD_LEFT) ;
          $pw = $this->input->post('pw');

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

          $tgl_masuk = $this->input->post('tanggal_masuk');
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

          $this->session->set_flashdata('flash', 'Tersimpan');
          redirect('admin/anggotapw');

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
          redirect('admin/inanggotapkpt?id=' .$id_pimpinan.'&id2='.$id_pimpinan_ac);
          }else{
          redirect('admin/inanggota?id=' .$id_pimpinan);
          }
        }
        else
        {
        $nia = $this->input->post('urut');
        $nia_urut = str_pad($nia,4,"0",STR_PAD_LEFT) ;
        $pw = $this->input->post('pw');

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
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/anggotapw');
      }
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

        $this->load->view('home/printformanggota', $data);
    }
    public function deleteanggota()
    {
        $id_anggota = $this->input->get('id');
        $this->db->delete('anggota', ['id_anggota' => $id_anggota]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/anggotapw');
    }
    public function viewanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewanggota');
        $this->load->view('template/footerTemplate');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();
        $data['cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();
        //$data['wilayah'] = $this->db->get_where('pimpinan', ['id_pimpinan' => '18'])->row_array();
        $aktif = $this->input->get('aktif');
        if($aktif=='PW'){
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => '18'])->row_array();
        }else{
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();
        }

        $this->load->view('home/printktaipnu', $data);
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

      //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
      $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();
      $data['cabang'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();
      $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->input->get('id2')])->row_array();

      $this->load->view('home/printktaippnu', $data);
    }
    public function editanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_anggota = $this->input->get('id');
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editanggota');
        $this->load->view('template/footerTemplate');
    }
    public function updateanggota()
    {
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

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/viewanggota?id=' .$id_anggota);
    }
    public function editfotoanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_anggota = $this->input->get('id');
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editfotoanggota');
        $this->load->view('template/footerTemplate');
    }
    public function updatefotoanggota()
    {
        $id_anggota = $this->input->post('id');

        $config['upload_path'] = './upload/anggota/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $name = $this->upload->data('file_name');

        $state =
            [
              'foto' => $name
            ];
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/viewanggota?id=' .$id_anggota);
    }
    public function suratkeluar()
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
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat');
        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/suratkeluar');
        $this->load->view('template/footerTemplate');
    }
    public function printsuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat');
        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();

        $this->load->view('home/printsuratkeluar', $data);
    }
    public function exportsuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat');
        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();

        $this->load->view('home/exportsuratkeluar', $data);
    }
    public function insuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/insuratkeluar');
        $this->load->view('template/footerTemplate');
    }
    public function addsuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $config['upload_path'] = './upload/suratkeluar/';
        $config['allowed_types'] = 'pdf';


        $this->load->library('upload', $config);

        $this->upload->do_upload('file_surat');
        $name = $this->upload->data('file_name');

        $data = [
            'id_pimpinan' => $pimp,
            'kategori_data' => $kat,
            'nomor_surat' => $this->input->post('nomor_surat'),
            'index_surat' => $this->input->post('index_surat'),
            'tanggal_surat' => $this->input->post('tanggal_surat'),
            'tujuan_surat' => $this->input->post('tujuan_surat'),
            'perihal' => $this->input->post('perihal'),
            'keterangan' => $this->input->post('keterangan'),
            'file_surat' => $name

        ];
        $this->db->insert('surat_keluar', $data);
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/suratkeluar');
    }
    public function viewsuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_sk = $this->input->get('id');
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id_sk])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewsuratkeluar');
        $this->load->view('template/footerTemplate');
    }
    public function editsuratkeluar()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_sk = $this->input->get('id');
        $data['surat_keluar'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id_sk])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editsuratkeluar');
        $this->load->view('template/footerTemplate');
    }
    public function updatesuratkeluar()
    {
        $id_sk = $this->input->post('id_surat_keluar');
        $state =
            [
                'nomor_surat' => $this->input->post('nomor_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'tujuan_surat' => $this->input->post('tujuan_surat'),
                'perihal' => $this->input->post('perihal'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id_surat_keluar', $id_sk);
        $this->db->update('surat_keluar', $state);
        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/suratkeluar');
    }
    public function deletesuratkeluar()
    {
        $id_sk = $this->input->get('id');
        $this->db->delete('surat_keluar', ['id_surat_keluar' => $id_sk]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/suratkeluar');
    }
    public function suratmasuk()
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
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat_diterima');
        $data['suratmasuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/suratmasuk');
        $this->load->view('template/footerTemplate');
    }
    public function printsuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat_diterima');
        $data['suratmasuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('home/printsuratmasuk', $data);
    }
    public function exportsuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_surat_diterima');
        $data['suratmasuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('home/exportsuratmasuk', $data);
    }
    public function insuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/insuratmasuk');
        $this->load->view('template/footerTemplate');
    }
    public function addsuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $config['upload_path'] = './upload/suratmasuk/';
        $config['allowed_types'] = 'pdf|jpg|png';


        $this->load->library('upload', $config);

        $this->upload->do_upload('file_surat');
        $name = $this->upload->data('file_name');

        $data = [
            'id_pimpinan' => $pimp,
            'kategori_data' => $kat,
            'pengirim' => $this->input->post('pengirim'),
            'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima'),
            'perihal' => $this->input->post('perihal'),
            'nomor_surat_masuk' => $this->input->post('nomor_surat_masuk'),
            'tanggal_surat' => $this->input->post('tanggal_surat'),
            'tembusan' => $this->input->post('tembusan'),
            'catatan_disposisi' => $this->input->post('catatan_disposisi'),
            'keterangan' => $this->input->post('keterangan'),
            'file_surat' => $name

        ];
        $this->db->insert('surat_masuk', $data);
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/suratmasuk');
    }
    public function viewsuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id = $_GET['id'];
        $data['suratmasuk'] = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        //$this->db->select('*');
        //$this->db->where('id_pimpinan', $pimp);
        //$this->db->order_by('tanggal_surat_diterima');
        //$data['suratmasuk'] = $this->db->get('surat_masuk')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewsuratmasuk');
        $this->load->view('template/footerTemplate');
    }
    public function editsuratmasuk()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_sm = $this->input->get('id');
        $data['suratmasuk'] = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id_sm])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editsuratmasuk');
        $this->load->view('template/footerTemplate');
    }
    public function updatesuratmasuk()
    {
        $id_sm = $this->input->post('id_surat_masuk');
        $state =
            [
                'pengirim' => $this->input->post('pengirim'),
                'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima'),
                'perihal' => $this->input->post('perihal'),
                'nomor_surat_masuk' => $this->input->post('nomor_surat_masuk'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'tembusan' => $this->input->post('tembusan'),
                'catatan_disposisi' => $this->input->post('catatan_disposisi'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id_surat_masuk', $id_sm);
        $this->db->update('surat_masuk', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/suratmasuk');
    }
    public function deletesuratmasuk()
    {
        $id_sm = $this->input->get('id');
        $this->db->delete('surat_masuk', ['id_surat_masuk' => $id_sm]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/suratmasuk');
    }
    public function inventarisbarang()
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
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('nama_barang');
        $data['inventaris_barang'] = $this->db->get('inventaris_barang')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inventarisbarang');
        $this->load->view('template/footerTemplate');
    }
    public function printinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('nama_barang');
        $data['inventaris_barang'] = $this->db->get('inventaris_barang')->result_array();

        $this->load->view('home/printinventarisbarang', $data);
    }
    public function exportinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('nama_barang');
        $data['inventaris_barang'] = $this->db->get('inventaris_barang')->result_array();

        $this->load->view('home/exportinventarisbarang', $data);
    }
    public function ininventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/ininventarisbarang');
        $this->load->view('template/footerTemplate');
    }
    public function addinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $data = [
            'id_pimpinan' => $pimp,
            'kategori_data' => $kat,
            'index_barang' => $this->input->post('index_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'asal_barang' => $this->input->post('asal_barang'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'keterangan' => $this->input->post('keterangan')

        ];
        $this->db->insert('inventaris_barang', $data);
        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/inventarisbarang');
    }
    public function viewinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id = $_GET['id'];
        $data['inventaris_barang'] = $this->db->get_where('inventaris_barang', ['id_inventaris_barang' => $id])->row_array();


        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewinventarisbarang');
        $this->load->view('template/footerTemplate');
    }
    public function editinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_ib = $this->input->get('id');
        $data['inventaris_barang'] = $this->db->get_where('inventaris_barang', ['id_inventaris_barang' => $id_ib])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editinventarisbarang');
        $this->load->view('template/footerTemplate');
    }
    public function updateinventarisbarang()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_ib = $this->input->post('id_inventaris_barang');
        $state =
            [
                'index_barang' => $this->input->post('index_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'asal_barang' => $this->input->post('asal_barang'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id_inventaris_barang', $id_ib);
        $this->db->update('inventaris_barang', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/inventarisbarang');
    }
    public function deleteinventarisbarang()
    {
        $id_ib = $this->input->get('id');
        $this->db->delete('inventaris_barang', ['id_inventaris_barang' => $id_ib]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/inventarisbarang');
    }
    public function keuangan()
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
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_transaksi');
        $data['keuangan'] = $this->db->get('keuangan')->result_array();

        $this->db->select_sum('masuk');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['masuk'] = $this->db->get('keuangan')->row_array();

        $this->db->select_sum('keluar');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['keluar'] = $this->db->get('keuangan')->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/keuangan');
        $this->load->view('template/footerTemplate');
    }
    public function printkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_transaksi');
        $data['keuangan'] = $this->db->get('keuangan')->result_array();

        $this->db->select_sum('masuk');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['masuk'] = $this->db->get('keuangan')->row_array();

        $this->db->select_sum('keluar');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['keluar'] = $this->db->get('keuangan')->row_array();

        $this->load->view('home/printkeuangan', $data);
    }
    public function exportkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal_transaksi');
        $data['keuangan'] = $this->db->get('keuangan')->result_array();

        $this->db->select_sum('masuk');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['masuk'] = $this->db->get('keuangan')->row_array();

        $this->db->select_sum('keluar');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $data['keluar'] = $this->db->get('keuangan')->row_array();

        $this->load->view('home/exportkeuangan', $data);
    }
    public function inkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/inkeuangan');
        $this->load->view('template/footerTemplate');
    }
    public function addkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $data = [
            'id_pimpinan' => $pimp,
            'kategori_data' => $kat,
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uraian_pemasukan' => $this->input->post('uraian_pemasukan'),
            'uraian_pengeluaran' => $this->input->post('uraian_pengeluaran'),
            'masuk' => $this->input->post('masuk'),
            'keluar' => $this->input->post('keluar'),
            'keterangan' => $this->input->post('keterangan')

        ];
        $this->db->insert('keuangan', $data);

        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/keuangan');
    }
    public function viewkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id = $_GET['id'];
        $data['keuangan'] = $this->db->get_where('keuangan', ['id_keuangan' => $id])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewkeuangan');
        $this->load->view('template/footerTemplate');
    }
    public function editkeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_keuangan = $this->input->get('id');
        $data['keuangan'] = $this->db->get_where('keuangan', ['id_keuangan' => $id_keuangan])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editkeuangan');
        $this->load->view('template/footerTemplate');
    }
    public function updatekeuangan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_keuangan = $this->input->post('id_keuangan');
        $state =
            [
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
                'uraian_pemasukan' => $this->input->post('uraian_pemasukan'),
                'uraian_pengeluaran' => $this->input->post('uraian_pengeluaran'),
                'masuk' => $this->input->post('masuk'),
                'keluar' => $this->input->post('keluar'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id_keuangan', $id_keuangan);
        $this->db->update('keuangan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/keuangan');
    }
    public function deletekeuangan()
    {
        $id_keuangan = $this->input->get('id');
        $this->db->delete('keuangan', ['id_keuangan' => $id_keuangan]);

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/keuangan');
    }
    public function rencanakegiatan()
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
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('rencana_waktu_mulai');
        $data['rencanakegiatan'] = $this->db->get('rencana_kegiatan')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/rencanakegiatan');
        $this->load->view('template/footerTemplate');
    }
    public function daftarkegiatan()
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
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal');
        $data['daftar_kegiatan'] = $this->db->get('daftar_kegiatan')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/daftarkegiatan');
        $this->load->view('template/footerTemplate');
    }
    public function printdaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal');
        $data['daftar_kegiatan'] = $this->db->get('daftar_kegiatan')->result_array();

        $this->load->view('home/printdaftarkegiatan', $data);
    }
    public function exportdaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', $pimp);
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('tanggal');
        $data['daftar_kegiatan'] = $this->db->get('daftar_kegiatan')->result_array();

        $this->load->view('home/exportdaftarkegiatan', $data);
    }
    public function indaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/indaftarkegiatan');
        $this->load->view('template/footerTemplate');
    }
    public function adddaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $config['upload_path'] = './upload/lpj/';
        $config['allowed_types'] = 'pdf';


        $this->load->library('upload', $config);

        $this->upload->do_upload('file_lpj');
        $name = $this->upload->data('file_name');

        $data = [
            'id_pimpinan' => $pimp,
            'kategori_data' => $kat,
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'hari' => $this->input->post('hari'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'kategori_kegiatan' => $this->input->post('kategori_kegiatan'),
            'tempat' => $this->input->post('tempat'),
            'keterangan' => $this->input->post('keterangan'),
            'file_lpj' => $name

        ];
        $this->db->insert('daftar_kegiatan', $data);

        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/daftarkegiatan');
    }
    public function editdaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id_daftar_kegiatan = $this->input->get('id');
        $data['daftar_kegiatan'] = $this->db->get_where('daftar_kegiatan', ['id_daftar_kegiatan' => $id_daftar_kegiatan])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/editdaftarkegiatan');
        $this->load->view('template/footerTemplate');
    }
    public function updatedaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['setting_app'] = $this->db->get_where('pengaturan_pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();

        $id_daftar_kegiatan = $this->input->post('id_daftar_kegiatan');
        $state =
            [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'kategori_kegiatan' => $this->input->post('kategori_kegiatan'),
                'tempat' => $this->input->post('tempat'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id_daftar_kegiatan', $id_daftar_kegiatan);
        $this->db->update('daftar_kegiatan', $state);

        $this->session->set_flashdata('flash', 'Diedit');
        redirect('admin/daftarkegiatan');
    }
    public function viewdaftarkegiatan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $id = $_GET['id'];
        $data['daftar_kegiatan'] = $this->db->get_where('daftar_kegiatan', ['id_daftar_kegiatan' => $id])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/viewdaftarkegiatan');
        $this->load->view('template/footerTemplate');
    }
    public function deletedaftarkegiatan()
    {
        $id_daftar_kegiatan = $this->input->get('id');
        $this->db->delete('daftar_kegiatan', ['id_daftar_kegiatan' => $id_daftar_kegiatan]);

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/daftarkegiatan');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('kategori_data', $kat);
        $this->db->order_by('judul_file');
        $data['download_peraturan'] = $this->db->get('download_peraturan')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/downloadperaturan');
        $this->load->view('template/footerTemplate');
    }
    public function indownloadperaturan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/indownloadperaturan');
        $this->load->view('template/footerTemplate');
    }
    public function adddownloadperaturan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $data = [
            'kategori_data' => $kat,
            'judul_file' => $this->input->post('judul_file'),
            'link_download' => $this->input->post('link_download'),
            'keterangan' => $this->input->post('keterangan')

        ];
        $this->db->insert('download_peraturan', $data);

        $this->session->set_flashdata('flash', 'Tersimpan');
        redirect('admin/downloadperaturan');
    }
    public function deletedownloadperaturan()
    {
        $id_peraturan = $this->input->get('id');
        $this->db->delete('download_peraturan', ['id_peraturan' => $id_peraturan]);

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/downloadperaturan');
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

        $this->db->count_all('pimpinan');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan', 'PC');
        $this->db->from('pimpinan');
        $data['statistik_pc'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['statistik_ac_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->from('pimpinan_ac');
        $data['statistik_ac'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_ac');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->from('pimpinan_ac');
        $data['statistik_pkpt'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->from('pimpinan_rk');
        $data['ranting'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['ranting_aktif'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->from('pimpinan_rk');
        $data['komisariat'] = $this->db->count_all_results();

        $this->db->count_all('pimpinan_rk');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('status_aktif', 'aktif');
        $this->db->from('pimpinan_rk');
        $data['komisariat_aktif'] = $this->db->count_all_results();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/statistikorganisasi');
        $this->load->view('template/footerTemplate');
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

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'makesta');
        $this->db->from('anggota');
        $data['makesta'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakmud');
        $this->db->from('anggota');
        $data['lakmud'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('pelatihan_formal', 'lakut');
        $this->db->from('anggota');
        $data['lakut'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('kategori_data', $kat);
        $this->db->where('status_cbp', 'ya');
        $this->db->from('anggota');
        $data['cbp'] = $this->db->count_all_results();



        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/potensikader');
        $this->load->view('template/footerTemplate');
    }
    public function datapac()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('pimpinan_ac', 'PAC');
        $this->db->where('status_aktif', 'aktif');
        $this->db->where('pimpinan_ac.kategori_data', $this->session->userdata('kategori'));
        $this->db->order_by('id_pimpinan');
        $data['data_pac'] = $this->db->get('pimpinan_ac')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/datapac');
        $this->load->view('template/footerTemplate');
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

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->join('pimpinan_ac', 'id_pimpinan');
        $this->db->where('pimpinan_rk', 'PR');
        $this->db->where('pimpinan_rk.kategori_data', $this->session->userdata('kategori'));
        $this->db->where('pimpinan_rk.status_aktif', 'aktif');
        $this->db->order_by('id_pimpinan');
        $this->db->order_by('kd_pimpinan_ac');
        $this->db->group_by('id_pimpinan_rk');
        $data['data_pr'] = $this->db->get('pimpinan_rk')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/datapr');
        $this->load->view('template/footerTemplate');
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

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('pimpinan_ac', 'PKPT');
        $this->db->where('status_aktif', 'aktif');
        $this->db->where('pimpinan_ac.kategori_data', $this->session->userdata('kategori'));
        $this->db->order_by('id_pimpinan');
        $data['data_pkpt'] = $this->db->get('pimpinan_ac')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/datapkpt');
        $this->load->view('template/footerTemplate');
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

        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->join('pimpinan_ac', 'id_pimpinan');
        $this->db->where('pimpinan_rk', 'PK');
        $this->db->where('pimpinan_rk.kategori_data', $this->session->userdata('kategori'));
        $this->db->where('pimpinan_rk.status_aktif', 'aktif');
        $this->db->order_by('id_pimpinan');
        $this->db->order_by('kd_pimpinan_ac');
        $this->db->group_by('id_pimpinan_rk');
        $data['data_pk'] = $this->db->get('pimpinan_rk')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/datapk');
        $this->load->view('template/footerTemplate');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('status_cbp', 'ya');
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotacbp');
        $this->load->view('template/footerTemplate');
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

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('anggota.kategori_data', $kat);
        $this->db->where('pelatihan_formal', $kaderisasi);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/anggotaformal');
        $this->load->view('template/footerTemplate');
    }


    public function incoba()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('admin_users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->load->view('template/headerTemplate', $data);
        $this->load->view('home/incoba');
        $this->load->view('template/footerTemplate');
    }
    public function addcoba()
        {
          $config['upload_path'] = './upload/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = 2000;

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('foto'))
          {
              $error = array('error' => $this->upload->display_errors());


          }
          else
          {
              $data = array('image_metadata' => $this->upload->data());


          }
        }
  function imageupload()
  {
      $this->load->view('home/imageupload_form');
  }
  public function upload()
  {
      $config['upload_path'] = './upload/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 2000;


      $this->load->library('upload', $config);

      $this->upload->do_upload('foto');
      $name = $this->upload->data('file_name');

      $data = [
          'foto' => $name
      ];
      $this->db->insert('coba', $data);

    redirect('admin/dashboard');
  }
  function cobaemail()
  {
    $config = array(
      'protocol' =>'smtp',
      'smtp_host' =>'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' =>'ipnukarangtempel@gmail.com',
      'smtp_pass' =>'jukijuki',
      'mailtype' =>'html',
      'charset' =>'iso-8859-1'
    );
    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $this->email->from('ipnukarangtempel@gmail.com', 'Pimpinan Pusat IPNU');
    $this->email->to('nandcbp@gmail.com');
    $this->email->cc('ipnujawatengah@gmail.com');
    $this->email->subject('Pemberitahuan');
    $this->email->message('Kabar gembira diluncurkannya SIPADU App IPNU Jawa Tengah bagi seluruh kader-kader di Provinsi Jawa Tengah');
    $this->email->send();
  }


}
