<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller{
  public function __construct()
  {
    //Codeigniter : Write Less Do More
    parent::__construct();
    // $this->load->helper('url');
    // $this->load->helper('form');
    // $this->load->model('Sinduadi_model');
    // $this->load->library('Session/Session');
  }

  function index()
  {
    if ($this->session->userdata('nokta') == null) {
      $this->login();
    }
    else {
      $this->home();
    }
  }

  function login(){
    $this->load->view('anggota/login_anggota');
  }

  function home()
  {
    if($this->session->userdata('nokta') == null){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('anggota/login_anggota', $data);
    }
    else {
      $nokta = $this->session->userdata('nokta');
      $select = "tb_karyawan.nama, tb_trans_simpan.nominal, tb_trans_simpan.tanggal";
      $select_ambil = "tb_karyawan.nama, tb_trans_ambil.nominal, tb_trans_ambil.tanggal";
      $select_pinjam = "tb_anggota.nokta, tb_anggota.nama, tb_trans_pinjam.tanggal, tb_trans_pinjam.nominal, tb_trans_pinjam.bunga, tb_trans_pinjam.lama, tb_anggota.tang_angsur";
      $where_wajib = "tb_trans_simpan.nokta = '".$nokta."' AND tb_trans_simpan.jenis_simpan = 'wajib' ORDER BY tb_trans_simpan.tanggal ASC";
      $where_suka = "tb_trans_simpan.nokta = '".$nokta."' AND tb_trans_simpan.jenis_simpan = 'sukarela' ORDER BY tb_trans_simpan.tanggal ASC";
      $where_ambil = "tb_trans_ambil.nokta = '".$nokta."' ORDER BY tb_trans_ambil.tanggal ASC";
      $where_pinjam = "tb_trans_pinjam.status = 'disetujui' AND tb_anggota.nokta = '".$nokta."'";
      $where_anggota = "nokta= '".$nokta."'";
      $join = "tb_trans_simpan.username_karyawan = tb_karyawan.username_karyawan";
      $join_ambil = "tb_trans_ambil.username_karyawan = tb_karyawan.username_karyawan";
      $join_pinjam = "tb_anggota.nokta = tb_trans_pinjam.nokta";
      $data['data_wajib'] = $this->Sinduadi_model->sql_inner_join_limit($select, $where_wajib, 'tb_trans_simpan', 'tb_karyawan', $join)->result();
      $data['data_suka'] = $this->Sinduadi_model->sql_inner_join_limit($select, $where_suka, 'tb_trans_simpan', 'tb_karyawan', $join)->result();
      $data['data_ambil'] = $this->Sinduadi_model->sql_inner_join_limit($select_ambil, $where_ambil, 'tb_trans_ambil', 'tb_karyawan', $join_ambil)->result();
      $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where_anggota,'tb_anggota')->result();
      $data['data_pinjam'] = $this->Sinduadi_model->sql_inner_join($select_pinjam, $where_pinjam, 'tb_anggota', 'tb_trans_pinjam', $join_pinjam)->result();

      $query = "SELECT tb_karyawan.nama, tb_trans_angsur.angsuran_pokok, tb_trans_angsur.tanggal, tb_trans_angsur.jasa
                FROM tb_trans_angsur  INNER JOIN tb_karyawan ON tb_trans_angsur.username_karyawan = tb_karyawan.username_karyawan INNER JOIN tb_trans_pinjam ON tb_trans_angsur.id_trans_pinjam = tb_trans_pinjam.id_trans_pinjam
                WHERE tb_trans_angsur.nokta = '".$nokta."' AND tb_trans_pinjam.status = 'disetujui' ORDER BY tb_trans_angsur.tanggal ASC";
      $data['data_angsur'] = $this->Sinduadi_model->sql_query_custom($query)->result();
      $this->load->view('anggota/home', $data);
    }
  }

  function aksi_login()
  {
    $nokta = $this->input->post('nokta');
    $pass = $this->input->post('password');
    $captcha = $this->input->post('captcha');
    $a = $this->input->post('a');
    $b = $this->input->post('b');
    $c = $a + $b;

    if ($captcha == $c){
      $cek_login = $this->Sinduadi_model->aksi_login_anggota($nokta, $pass);

      if ($cek_login) {
        foreach ($cek_login as $row){
          $this->session->set_userdata('nokta', $row->nokta);
          $this->session->set_userdata('nama', $row->nama);
        }
        $this->index();
      }
      else {
        $data['pesan'] = "username atau password tidak sesuai";
        $this->load->view('anggota/login_anggota', $data);
      }
    }
    else {
      $data['pesan'] = "Captcha Salah !";
      $this->load->view('anggota/login_anggota', $data);
    }
  }

  function aksi_logout()
  {
    $this->session->sess_destroy();
    $this->load->view('anggota/login_anggota');
  }

  function aksi_ubah_password()
  {
      $nokta = $this->session->userdata('nokta');
      $pass_lama = $this->input->post('pass_lama');
      $pass_baru = md5($this->input->post('pass_baru'));

      $cek_login = $this->Sinduadi_model->aksi_login_anggota($nokta, $pass_lama);
      if ($cek_login) {
        $data=array(
          'pass'=>$pass_baru
        );

        $where = array('nokta'=>$nokta);
        $this->Sinduadi_model->update_data($where, $data, 'tb_anggota');
        $this->session->set_userdata('message', "Password Berhasil Diubah!");
        $this->index();
      }
      else {
        $data['pesan'] = "Password Lama Tidak Sesuai!";
        $this->session->set_userdata('message', "GAGAL ! Password Lama Tidak Sesuai!");
        $this->index();
      }
  }

}
?>
