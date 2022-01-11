<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nia')) {
            # code...
            redirect('/');
        }
        $this->load->library('form_validation');
        $this->load->library('pdf');

    }

    public function logout()
    {
        $this->session->unset_userdata('nia');
        $this->session->unset_userdata('level');
        redirect('/');
    }

    public function index()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();


        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/dashboard');
        $this->load->view('template/footerAnggota');
    }
    public function about()
    {

        //data default parameter
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];
        $data['pimpinan_defaultpac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->session->userdata('id_pimpinan')])->row_array();

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/about');
        $this->load->view('template/footerAnggota');
    }
    public function downloadperaturan()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
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

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/downloadperaturan');
        $this->load->view('template/footerAnggota');
    }
    public function viewanggota()
    {
        //data default parameter
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];


        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/viewanggota');
        $this->load->view('template/footerAnggota');
    }
    public function editpassword()
    {
        $id_anggota = $this->input->get('id');
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/editpassword');
        $this->load->view('template/footerAnggota');
    }
    public function updatepassword()
    {
      $id_anggota = $this->input->post('id');
      $state =
          [
            'nia' => $this->input->post('nia'),
            'password' => $this->input->post('password')
          ];
      $this->db->where('id_anggota', $id_anggota);
      $this->db->update('anggota', $state);
      $this->session->set_flashdata('flash', 'Diedit');
      redirect('anggota/editpassword?id=' .$id_anggota);
    }


    public function kodedaerah()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        //coba pake elemen get dari menu
        $id_pimpinan_ac = $this->input->get('id');
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $data['pimpinan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Kodedaerah');
        $this->load->view('template/footerUser');
    }
    public function editpac()
    {
        $id_pimpinan_ac = $this->input->get('id');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Editpac');
        $this->load->view('template/footerUser');
    }
    public function updatepac()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $state =
            [
                'nama_pimpinan_ac' => $this->input->post('nama_pimpinan_ac'),
                'kd_pimpinan_ac' => $this->input->post('kd_pimpinan_ac')
            ];
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->update('pimpinan_ac', $state);

        redirect('admin/kodedaerah');
    }
    public function koderanting()
    {
        $id_pimpinan_ac = $this->input->get('id');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->order_by('kd_pimpinan_rk');
        $data['pimpinan'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Koderanting');
        $this->load->view('template/footerUser');
    }
    public function inranting()
    {
        $id_pimpinan_ac = $this->input->get('id');
        $id_pimpinan = $this->input->get('id2');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Inranting');
        $this->load->view('template/footerUser');
    }
    public function addranting()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan = $this->input->post('id_pimpinan');
        $data = [
            'id_pimpinan_ac' => $this->input->post('id_pimpinan_ac'),
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'pimpinan_rk' => 'PR',
            'kd_pimpinan_rk' => $this->input->post('kd_pimpinan_rk'),
            'nama_pimpinan_rk' => $this->input->post('nama_pimpinan_rk')
        ];
        $this->db->insert('pimpinan_rk', $data);
        redirect('user/koderanting?id2=PM615052&id='.$id_pimpinan_ac);
    }
    public function editranting()
    {
        $id_pimpinan_rk = $this->input->get('id');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['koderanting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Editranting');
        $this->load->view('template/footerUser');
    }
    public function updateranting()
    {
        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $id_pimpinan_rk = $this->input->post('id_pimpinan_rk');
        $state =
            [
                'nama_pimpinan_rk' => $this->input->post('nama_pimpinan_rk'),
                'kd_pimpinan_rk' => $this->input->post('kd_pimpinan_rk')
            ];
        $this->db->where('id_pimpinan_rk', $id_pimpinan_rk);
        $this->db->update('pimpinan_rk', $state);

        redirect('user/koderanting?id2=PM615052&id='.$id_pimpinan_ac);
    }
    public function manajemenuser()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();

        $id_user = $this->input->get('id');
        $this->db->select('*');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('username');
        $data['manajemenuser'] = $this->db->get('rb_users')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/user');
        $this->load->view('template/footerUser');
    }
    public function edituser()
    {
        $id_user = $this->input->get('id');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get_where('rb_users', ['id_user' => $id_user])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Edituser');
        $this->load->view('template/footerUser');
    }
    public function updateuser()
    {
        $id_user = $this->input->post('id_user');
        $state =
            [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'website' => $this->input->post('website'),
                'no_telpon' => $this->input->post('no_telpon'),
                'sekretariat' => $this->input->post('sekretariat')
            ];
        $this->db->where('id_user', $id_user);
        $this->db->update('rb_users', $state);

        redirect('user');
    }
    public function deleteuser()
    {
        $id_user = $this->input->get('id');
        $this->db->delete('rb_users', ['id_user' => $id_user]);
        redirect('admin/manajemenuser');
    }
    public function inusercabang()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Inusercabang');
        $this->load->view('template/footerUser');
    }
    public function inuserpac()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('nama_pimpinan_ac');
        $data['anakcabang'] = $this->db->get('pimpinan_ac')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Inuserpac');
        $this->load->view('template/footerUser');
    }
    public function inuserpilihranting()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
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
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->order_by('nama_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Inuserranting');
        $this->load->view('template/footerUser');
    }
    public function adduser()
    {
        $data = [
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'tingkatan' => $this->input->post('tingkatan'),
            'sekretariat' => $this->input->post('sekretariat'),
            'email' => $this->input->post('email'),
            'no_telpon' => $this->input->post('no_telpon'),
            'website' => $this->input->post('website'),
            'level' => $this->input->post('level'),
            'aktif' => 'Y'
        ];
        $this->db->insert('rb_users', $data);
        redirect('admin/manajemenuser');
    }
    public function anggotapc()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $id_pimpinan_ac = $this->input->get('id');
        $data['pac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $id_pimpinan_ac])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan', 'id_pimpinan');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Anggotapc');
        $this->load->view('template/footerUser');
    }
    public function anggotapcranting()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $id_pimpinan_rk = $this->input->get('id');
        $data['ranting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();

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
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();
        $pac = $this->input->get('id');
        $data['ac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id')])->row_array();
        $this->db->select('*');
        $this->db->join('pimpinan_ac', 'id_pimpinan_ac');
        $this->db->where('anggota.id_pimpinan', 'PM615052');
        $this->db->where('id_pimpinan_ac', $pac);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Anggotapac');
        $this->load->view('template/footerUser');
    }
    public function anggotapr()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('kd_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();

        $pac = $this->input->get('id');
        $pr = $this->input->get('id2');
        $data['ac'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan_ac' => $this->input->get('id')])->row_array();
        $data['rk'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $this->input->get('id2')])->row_array();

        $this->db->select('*');
        $this->db->join('pimpinan_rk', 'id_pimpinan_rk');
        $this->db->where('anggota.id_pimpinan', 'PM615052');
        $this->db->where('anggota.id_pimpinan_ac', $pac);
        $this->db->where('id_pimpinan_rk', $pr);
        $this->db->order_by('id_anggota');
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Anggotapr');
        $this->load->view('template/footerUser');
    }
    public function inanggota()
    {

        $id_pimpinan_ac = $this->input->post('id_pimpinan_ac');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $data['pc'] = $this->db->get_where('pimpinan', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('kd_pimpinan_ac');
        $data['kecamatan'] = $this->db->get('pimpinan_ac')->result_array();

        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('kd_pimpinan_rk');
        $data['ranting'] = $this->db->get('pimpinan_rk')->result_array();

        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->from('anggota');
        $data['jumlah'] = $this->db->count_all_results();

        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/Inanggota');
        $this->load->view('template/footerUser');
    }
    public function addanggota()
    {
        $nia = $this->input->post('urut');
        $nia_urut = str_pad($nia,5,"0",STR_PAD_LEFT) ;
        $rc = $this->input->post('kab');

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

        $tgl_masuk = $this->input->post('tanggal_masuk');
        $th=substr($tgl_masuk,2,2);
        $nia_jadi = $rc . '.' . $idP2. '.' .$idP1. '.' .$th. '' .$nia_urut;

        $config['upload_path'] = './upload/anggota/';
        $config['allowed_types'] = 'jpeg|jpg|png';


        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $name = $this->upload->data('file_name');

        $data = [
            'nia' => $nia_jadi,
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'id_pimpinan' => $this->input->post('id_pimpinan'),
            'id_pimpinan_ac' => $this->input->post('id_pimpinan_ac'),
            'id_pimpinan_rk' => $this->input->post('id_pimpinan_rk'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kode_pos' => $this->input->post('kode_pos'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'pesantren' => $this->input->post('pesantren'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'penghasilan' => $this->input->post('penghasilan'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
            'anak' => $this->input->post('anak'),
            'pelatihan' => $this->input->post('pelatihan'),
            'pelatihan_banser' => $this->input->post('pelatihan_banser'),
            'pelatihan_mdsra' => $this->input->post('pelatihan_mdsra'),
            'nonformal_ansor' => $this->input->post('nonformal_ansor'),
            'nonformal_banser' => $this->input->post('nonformal_banser'),
            'pelatihan_lain' => $this->input->post('pelatihan_lain'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'fb' => $this->input->post('fb'),
            'ig' => $this->input->post('ig'),
            'tempat_input_kta' => $this->input->post('tempat_input_kta'),
            'tanggal_input_kta' => $this->input->post('tanggal_input_kta'),
            'foto' => $name

        ];
        $this->db->insert('anggota', $data);
        redirect('user/inanggota');
    }
    public function deleteanggota()
    {
        $id_anggota = $this->input->get('id');
        $this->db->delete('anggota', ['id_anggota' => $id_anggota]);
        redirect('user');
    }
  //  public function viewanggota()
    //{
    //    $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
    //    $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->input->get('id')])->row_array();

      //  $this->load->view('template/headerUser', $data);
      //  $this->load->view('operator/viewanggota');
      //  $this->load->view('template/footerUser');
  //  }
    public function editanggota()
    {
        $id_anggota = $this->input->get('id');
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/editanggota');
        $this->load->view('template/footerAnggota');
    }
    public function updateanggota()
    {
      $id_anggota = $this->input->post('id');
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
            'pelatihan_nonformal' => $this->input->post('pelatihan_nonformal'),
            'status_cbp' => $this->input->post('status_cbp'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'pendidikan_sd' => $this->input->post('pendidikan_sd'),
            'pendidikan_smp' => $this->input->post('pendidikan_smp'),
            'pendidikan_sma' => $this->input->post('pendidikan_sma'),
            'pendidikan_pt' => $this->input->post('pendidikan_pt'),
            'pendidikan_nonformal' => $this->input->post('pendidikan_nonformal'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ayah' => $this->input->post('penghasilan_ayah'),
            'penghasilan_ibu' => $this->input->post('penghasilan_ibu'),
            'pekerjaan_usaha' => $this->input->post('pekerjaan_usaha'),
            'penghasilan_pribadi' => $this->input->post('penghasilan_pribadi'),
            'program_studi_s1' => $this->input->post('program_studi_s1'),
            'program_studi_s2' => $this->input->post('program_studi_s2'),
            'pascasarjana' => $this->input->post('pascasarjana'),
            'pengalaman_organisasi' => $this->input->post('pengalaman_organisasi'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'fb' => $this->input->post('fb'),
            'ig' => $this->input->post('ig'),
            'twitter' => $this->input->post('twitter')
          ];
      $this->db->where('id_anggota', $id_anggota);
      $this->db->update('anggota', $state);

      $this->session->set_flashdata('flash', 'Diedit');
      redirect('anggota/viewanggota?id=' .$id_anggota);
    }
    public function editfotoanggota()
    {
        $id_anggota = $this->input->get('id');
        $data['admin'] = $this->db->get_where('anggota', ['nia' => $this->session->userdata('nia')])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
        $data['pimpinan_default'] = $this->db->get_where('pimpinan', ['id_pimpinan' => $this->session->userdata('id_pimpinan')])->row_array();
        $data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
        $pimp = $data['id_pimpinan'];
        $data['kategori_data'] = $this->session->userdata('kategori');
        $kat = $data['kategori_data'];

        $this->load->view('template/headerAnggota', $data);
        $this->load->view('anggota/editfotoanggota');
        $this->load->view('template/footerAnggota');
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

        redirect('anggota/viewanggota?id=' .$id_anggota);
    }

    public function potensikader()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $id_pimpinan_ac = $this->input->get('id');
        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->from('anggota');
        $data['anggota'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pelatihan', 'PKD');
        $this->db->from('anggota');
        $data['pkd'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pelatihan', 'PKL');
        $this->db->from('anggota');
        $data['pkl'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pelatihan', 'PKN');
        $this->db->from('anggota');
        $data['pkn'] = $this->db->count_all_results();

        $this->db->count_all('anggota');
        $this->db->where('id_pimpinan_ac', $id_pimpinan_ac);
        $this->db->where('pelatihan', 'Belum Pengkaderan');
        $this->db->from('anggota');
        $data['belum'] = $this->db->count_all_results();



        $this->load->view('template/headerUser', $data);
        $this->load->view('operator/potensikader');
        $this->load->view('template/footerUser');
    }
    public function potensikaderranting()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $id_pimpinan_rk = $this->input->get('id');
        $data['ranting'] = $this->db->get_where('pimpinan_rk', ['id_pimpinan_rk' => $id_pimpinan_rk])->row_array();
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
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal_surat');
        $data['suratkeluar'] = $this->db->get('surat_keluar')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/suratkeluar');
        $this->load->view('template/footerUser');
    }
    public function insuratkeluar()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Insuratkeluar');
        $this->load->view('template/footerUser');
    }
    public function editsuratkeluar()
    {
        $id_sk = $this->input->get('id');
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['suratkeluar'] = $this->db->get_where('surat_keluar', ['id_sk' => $id_sk])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Editsuratkeluar');
        $this->load->view('template/footerUser');
    }
    public function updatesuratkeluar()
    {
        $id_sk = $this->input->post('id_sk');
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
        $this->db->delete('surat_keluar', ['id_sk' => $id_sk]);
        redirect('admin/suratkeluar');
    }
    public function suratmasuk()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
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
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
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
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
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
    public function rencanakegiatan()
    {
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
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
        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();
        $this->db->select('*');
        $this->db->where('id_pimpinan', 'PM615052');
        $this->db->order_by('tanggal');
        $data['daftarkegiatan'] = $this->db->get('daftar_kegiatan')->result_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/daftarkegiatan');
        $this->load->view('template/footerUser');
    }


    public function incoba()
    {

        $data['admin'] = $this->db->get_where('rb_users', ['username' => $this->session->userdata('username')])->row_array();
        //$data['kodedaerah'] = $this->db->get_where('pimpinan_ac', ['id_pimpinan' => 'PM615052'])->row_array();

        $this->load->view('template/headerUser', $data);
        $this->load->view('home/Incoba');
        $this->load->view('template/footerUser');
    }
    public function addcoba()
    {

        $data = [
            'id_coba' => $this->input->post('id_pimpinan'),
            'foto' => $this->input->post('id_pimpinan')
        ];
        $this->db->insert('coba', $data);
        redirect('admin/incoba');
    }


}
