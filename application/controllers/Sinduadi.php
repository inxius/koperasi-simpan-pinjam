<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sinduadi extends CI_Controller{

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
    elseif ($this->session->userdata('level') == 'petugas') {
      redirect('Petugas/home_petugas');
    }
    else {
      $this->load->view('login_karyawan');
    }
  }

  function header($level){
    if ($level == 'pengurus') {
      $this->load->view('header-pengurus');
    }
    elseif ($level == 'petugas') {
      $this->load->view('header-petugas');
    }
  }

// -------------------------------- ZONA AKSI LAIN -------------------------------- //

function aksi_login()
{
  $username = $this->input->post('username');
  $pass = $this->input->post('password');
  $captcha = $this->input->post('captcha');
  $a = $this->input->post('a');
  $b = $this->input->post('b');
  $c = $a + $b;

  if ($captcha == $c) {
    $cek_login = $this->Sinduadi_model->aksi_login($username, $pass);

    if ($cek_login) {
      foreach ($cek_login as $row){
        $this->session->set_userdata('username', $row->username_karyawan);
        $this->session->set_userdata('nama', $row->nama);
        $this->session->set_userdata('level', $row->level);
      }

      if ($this->session->userdata('level') == 'pengurus') {
        redirect('Pengurus/index');
      }

      if ($this->session->userdata('level') == 'petugas') {
        redirect('Petugas/index');
      }
    }
    else {
      $data['pesan'] = "username atau password tidak sesuai";
      $this->load->view('login_karyawan', $data);
    }
  }
  else {
    $data['pesan'] = "Captcha Salah !";
    $this->load->view('login_karyawan', $data);
  }
}

function aksi_logout()
{
  $this->session->sess_destroy();
  $this->load->view('login_karyawan');
}

function updt_rekening($data, $nokta)
{
  $where = "nokta = '".$nokta."'";
  $this->Sinduadi_model->update_data($where, $data, 'tb_anggota');
}

function ubah_password()
{
  $this->header($this->session->userdata('level'));
  $this->load->view('ubh_pass');
}

function aksi_ubah_password()
{
  if ($this->session->userdata('level') != null) {
    $username = $this->session->userdata('username');
    $pass_lama = $this->input->post('pass_lama');
    $pass_baru = md5($this->input->post('pass_baru'));

    $cek_login = $this->Sinduadi_model->aksi_login($username, $pass_lama);
    if ($cek_login) {
      $data=array(
        'pass'=>$pass_baru
      );

      $where = array('username_karyawan'=>$username);
      $this->Sinduadi_model->update_data($where, $data, 'tb_karyawan');
      $this->session->set_userdata('message', "Password Berhasil diubah");
      redirect('Sinduadi/index');
    }
    else {
      $data['pesan'] = "Password Lama Tidak Sesuai!";
      $this->header($this->session->userdata('level'));
      $this->load->view('ubh_pass', $data);
    }
  }
}

// function search($target)
// {
//   $data_cr = $this->input->post('search');
//   $data_by = $this->input->post('search_by');
//
//   if ($this->session->userdata('level') == 'pengurus') {
//     $where = $data_by." Like '%".$data_cr."%' and username_karyawan != '".$this->session->userdata('username')."'";
//     $data['data_search'] = $this->Sinduadi_model->ambil_where($where, 'tb_karyawan')->result();
//     $this->header('pengurus');
//     if ($target == "petugas"){
//       $this->load->view('pengurus/petugas', $data);
//     }
//   }
//   elseif ($this->session->userdata('level') == 'petugas') {
//     $where = $data_by." Like '%".$data_cr."%'";
//     $data['data_search'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
//     $this->header('petugas');
//     if ($target == "anggota") {
//       $this->load->view('petugas/anggota', $data);
//     }
//     if ($target == "transaksi") {
//       $this->load->view('petugas/transaksi', $data);
//     }
//     if ($target == "pinjam") {
//       $this->load->view('petugas/pinjaman', $data);
//     }
//   }
// }

function search_transaksi()
{
  $data_cr = $this->input->post('search');
  $data_by = $this->input->post('search_by');

  $where = $data_by." Like '%".$data_cr."%'";
  $data['data_search'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
  $this->header('petugas');
  $this->load->view('petugas/transaksi', $data);
}

// function print_nota()
// {
//   $this->load->view('Print/print');
// }
//
// function print_Krt_Pinjam($data)
// {
//   $this->load->view('Print/printKrtPinjam', $data);
// }
//
// function print_Report($data)
// {
//   $this->load->view('Print/printReport', $data);
// }
// ---------------------------------------------------------------------------------------- //

}
