<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengurus extends CI_Controller{
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
    if ($this->session->userdata('level') == 'pengurus') {
      redirect('Pengurus/home_pengurus');
    }
    else {
      $this->load->view('login_karyawan');
    }
  }

  function header(){
    $this->load->view('header-pengurus');
  }

  function aksi_logout()
  {
    $this->session->sess_destroy();
    $this->load->view('login_karyawan');
  }

  function home_pengurus()
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $this->header();
      $this->load->view('pengurus/home');
    }
  }


  function vw_petugas()
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = "username_karyawan != '".$this->session->userdata('username')."'";
      $data['data_petugas'] = $this->Sinduadi_model->ambil_where($where, 'tb_karyawan')->result();
      $this->header('pengurus');
      $this->load->view('pengurus/petugas', $data);
    }
  }

  function vw_pengaju_pinjam()
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = "status = 'diajukan'";
      $data['data_anggota'] = $this->Sinduadi_model->ambil_pengaju_pinjaman($where)->result();
      $this->header('pengurus');
      $this->load->view('pengurus/pinjaman', $data);
    }
  }

  function trans_verifikasi_pinjam($nokta)
  {
    {
      if($this->session->userdata('level') != 'pengurus'){
        $data['pesan'] = "Anda Belum Login";
        $this->load->view('login_karyawan', $data);
      }
      else {
        $where = "tb_anggota.nokta = '".$nokta."' and tb_trans_pinjam.status = 'diajukan'";
        $data['data_anggota'] = $this->Sinduadi_model->ambil_pengaju_pinjaman($where)->result();
        $where1 = "nokta = '".$nokta."' and status = 'disetujui'";
        $data_pjm = $this->Sinduadi_model->ambil_where($where1, 'tb_trans_pinjam');
        if ($data_pjm->num_rows() > 0) {
          $data['data_pinjam'] = $data_pjm->result();

          foreach ($data['data_pinjam'] as $pinjam) {
            $id = $pinjam->id_trans_pinjam;
          }
          $where = "id_trans_pinjam = '".$id."'";
          $data['data_angsur'] = $this->Sinduadi_model->ambil_where($where, 'tb_trans_angsur')->result();
        }
        $this->header('pengurus');
        $this->load->view('pengurus/trans_pinjaman', $data);
      }
    }
  }

  function tbh_petugas()
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $this->header('pengurus');
      $this->load->view('pengurus/tbh_petugas');
    }
  }

  function edt_petugas($username)
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = array('username_karyawan' => $username);
      $data['data_petugas'] = $this->Sinduadi_model->ambil_where($where, 'tb_karyawan')->result();
      $this->header('pengurus');
      $this->load->view('pengurus/edt_petugas', $data);
    }
  }

  function reset_pass_petugas($username)
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $pass = md5($username);
      $data=array(
        'pass'=> $pass
      );

      $where = array('username_karyawan'=>$username);
      $this->Sinduadi_model->update_data($where, $data, 'tb_karyawan');
      $this->session->set_userdata('message', "Reset Password Berhasil !");
      $this->vw_petugas();
    }
  }

  function edt_dasar()
  {
    if($this->session->userdata('level') != 'pengurus'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = "id_dasar = 1";
      $data['data_dasar'] = $this->Sinduadi_model->ambil_where($where, 'tb_dasar')->result();
      $this->header('pengurus');
      $this->load->view('pengurus/syarat_dasar', $data);
    }
  }

  function aksi_tambah_petugas()
  {
    $username= $this->input->post('username');
    $nama = $this->input->post('nama');
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $pekerjaan = $this->input->post('pekerjaan');
    $level = $this->input->post('level');
    $pass = md5($this->input->post('username'));

    $where = "username_karyawan = '".$username."'";
    $data_karyawan = $this->Sinduadi_model->ambil_where($where, 'tb_karyawan');
    if ($data_karyawan->num_rows() < 1) {
      $data=array(
        'username_karyawan'=>$username,
        'nama'=>$nama,
        'jk'=>$jk,
        'alamat'=>$alamat,
        'no_telp'=>$no_telp,
        'level'=>$level,
        'pass'=>$pass
      );

      $this->Sinduadi_model->tambah_data($data, 'tb_karyawan');
      $this->session->set_userdata('message', "Penambahan Karyawan Berhasil !");
      $this->vw_petugas();
    }
    else {
      $this->session->set_userdata('message', "Username Sudah Digunakan !");
      $this->tbh_petugas();
    }
  }

  function aksi_edit_petugas()
  {
    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $level = $level = $this->input->post('level');

    $data=array(
      'nama'=>$nama,
      'jk'=>$jk,
      'alamat'=>$alamat,
      'no_telp'=>$no_telp,
      'level'=>$level
    );

    $where = array('username_karyawan'=>$username);
    $this->Sinduadi_model->update_data($where, $data, 'tb_karyawan');
    $this->vw_petugas();
  }

  function aksi_edit_dasar()
  {
    $id_dasar = $this->input->post('id_dasar');
    $nilai_simp_wajib = $this->input->post('nilai_simp_wajib');
    $nilai_simp_pokok = $this->input->post('nilai_simp_pokok');
    $batas_bunga = $this->input->post('batas_bunga');
    $bunga1 = $this->input->post('bunga1');
    $bunga2 = $level = $this->input->post('bunga2');
    $max_bln = $level = $this->input->post('max_bln');

    $data=array(
      'id_dasar'=>$id_dasar,
      'nilai_simp_wajib'=>$nilai_simp_wajib,
      'nilai_simp_pokok'=>$nilai_simp_pokok,
      'batas_bunga'=>$batas_bunga,
      'bunga1'=>$bunga1,
      'bunga2'=>$bunga2,
      'max_bln'=>$max_bln
    );

    $where = array('id_dasar'=>$id_dasar);
    $this->Sinduadi_model->update_data($where, $data, 'tb_dasar');
    $this->session->set_userdata('message', "Perubahan Berhasil !");
    $this->edt_dasar();
  }

  function aksi_setujui_pinjaman()
  {
    $nokta = $this->input->post('nokta');
    $nominal = $this->input->post('nominal_realisasi');
    $bunga = $this->input->post('bunga');
    $lama = $this->input->post('lama');
    $id = $this->input->post('id');

    $jasa = ($nominal * $bunga * $lama)/100;
    $angsur = ceil(($nominal + $jasa)/$lama);

    $data=array(
      'status'=>'disetujui',
      'nominal'=>$nominal
    );
    $where = array('id_trans_pinjam'=>$id);
    $this->Sinduadi_model->update_data($where, $data, 'tb_trans_pinjam');

    $data_rekening = array(
      'tang_pinjam'=>$nominal,
      'tang_jasa'=>$jasa,
      'tang_angsur'=>$angsur
    );
    $where = array('nokta'=>$nokta);
    $this->Sinduadi_model->update_data($where, $data_rekening, 'tb_anggota');
    $this->session->set_userdata('message', "Persetujuan Pinjaman Berhasil ! ".anchor('Sinduadi/getKrtPinjam/'.$nokta,'Cetak Kartu Pinjaman', array('target' => '_blank')));
    $this->vw_pengaju_pinjam();
  }

  function aksi_tolak_pinjaman()
  {
    $id = $this->input->post('id');
    $data=array(
      'status'=>'ditolak'
    );
    $where = array('id_trans_pinjam'=>$id);
    $this->Sinduadi_model->update_data($where, $data, 'tb_trans_pinjam');
    $this->session->set_userdata('message', "Pinjaman Telak Ditolak !");
    $this->vw_pengaju_pinjam();
  }

}
 ?>
