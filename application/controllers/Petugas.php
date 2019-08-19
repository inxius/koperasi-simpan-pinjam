<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
  public function __construct()
  {
    //Codeigniter : Write Less Do More
    parent::__construct();
    // $this->load->helper('url');
    // $this->load->helper('form');
    // $this->load->model('Sinduadi_model');
    $this->load->library('pdf');
  }

  function index(){
    if ($this->session->userdata('level') == 'petugas') {
      redirect('Petugas/home_petugas');
    }
    else {
      $this->load->view('login_karyawan');
    }
  }

  function header(){
    $this->load->view('header-petugas');
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

  function print_nota()
  {
    $this->load->view('Print/print');
  }

  function print_Krt_Pinjam($data)
  {
    $this->load->view('Print/printKrtPinjam', $data);
  }

  function download_pdf()
  {
        $pdf = new FPDF('l','mm','legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(320,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(320,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->Output();
  }

  function download_Report($data)
  {
    if ($data['bulan'] == 1) {
      $data['bulan'] = "Januari";
    }
    if ($data['bulan'] == 2) {
      $data['bulan'] = "February";
    }
    if ($data['bulan'] == 3) {
      $data['bulan'] = "Maret";
    }
    if ($data['bulan'] == 4) {
      $data['bulan'] = "April";
    }
    if ($data['bulan'] == 5) {
      $data['bulan'] = "Mei";
    }
    if ($data['bulan'] == 6) {
      $data['bulan'] = "Juni";
    }
    if ($data['bulan'] == 7) {
      $data['bulan'] = "Juli";
    }
    if ($data['bulan'] == 8) {
      $data['bulan'] = "Agustus";
    }
    if ($data['bulan'] == 9) {
      $data['bulan'] = "September";
    }
    if ($data['bulan'] == 10) {
      $data['bulan'] = "Oktober";
    }
    if ($data['bulan'] == 11) {
      $data['bulan'] = "November";
    }
    if ($data['bulan'] == 12) {
      $data['bulan'] = "Desember";
    }

    $pdf = new FPDF('l','mm','legal');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(320,7,'KOPERASI SIMPAN PINJAM BKM SINDUADI',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(320,7,'Laporan Bulan '.$data['bulan'].' Tahun '.$data['tahun'],0,1,'C');
    $pdf->Cell(10,7,'',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(8,27,'No',1,0,'C');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(25,13.5,'Nomor Anggota',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 25);
    $pdf->Cell(35,27,'Nama',1,0,'C');
    $pdf->Cell(8,27,'JK',1,0,'C');
    $pdf->Cell(40,27,'Alamat',1,0,'C');
    $pdf->Cell(93,9,'Simpanan',1,0,'C');
    $pdf->Cell(130,9,'Pinjaman',1,1,'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,6,'',0,0,'C');
    $pdf->Cell(25,6,'',0,0,'C');
    $pdf->Cell(35,6,'',0,0,'C');
    $pdf->Cell(8,6,'',0,0,'C');
    $pdf->Cell(40,6,'',0,0,'C');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(22,18,'Simp. Wajib',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 22);
    $x = $pdf->GetX();
    $pdf->MultiCell(23,18,'Simp. Sukarela',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 23);
    $x = $pdf->GetX();
    $pdf->MultiCell(23,9,'Total Simp. Wajib',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 23);
    $x = $pdf->GetX();
    $pdf->MultiCell(25,9,'Total Simp. Sukarela',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 25);
    $x = $pdf->GetX();
    $pdf->MultiCell(22,18,'Pinjaman',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 22);
    $x = $pdf->GetX();
    $pdf->MultiCell(22,9,'Tanggal Pinjam',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 22);
    $x = $pdf->GetX();
    $pdf->MultiCell(13,9,'Jml. Angsur',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 13);
    $x = $pdf->GetX();
    $pdf->MultiCell(22,9,'Sisa Tang. Pinjam',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 22);
    $x = $pdf->GetX();
    $pdf->MultiCell(13,9,'Angsuran Ke-',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 13);
    $x = $pdf->GetX();
    $pdf->MultiCell(20,18,'Angsuran',1,'C');
    $pdf->SetY($y);
    $pdf->SetX($x + 20);
    $x = $pdf->GetX();
    $pdf->MultiCell(18,18,'Jasa',1,'C');
    $iterasi = 1;
    foreach ($data['data_lapor'] as $report) {
      $pdf->Cell(8,6,$iterasi,1,0,'C');
      $pdf->Cell(25,6,$report->nokta,1,0,'L');
      $pdf->Cell(35,6,$report->nama,1,0,'L');
      $pdf->Cell(8,6,$report->jk,1,0,'C');
      $pdf->Cell(40,6,$report->alamat,1,0,'L');
      if (is_numeric($report->simp_wajib)) {
        $simp_wajib = number_format($report->simp_wajib, 0, ".", ".");
      }
      else {
        $simp_wajib = $report->simp_wajib;
      }
      $pdf->Cell(22,6,$simp_wajib,1,0,'L');

      if (is_numeric($report->simp_suka)) {
        $simp_suka = number_format($report->simp_suka, 0, ".", ".");
      }
      else {
        $simp_suka = $report->simp_suka;
      }
      $pdf->Cell(23,6,$simp_suka,1,0,'L');

      if (is_numeric($report->total_simp_wajib)) {
        $total_simp_wajib = number_format($report->total_simp_wajib, 0, ".", ".");
      }
      else {
        $total_simp_wajib = $report->total_simp_wajib;
      }
      $pdf->Cell(23,6,$total_simp_wajib,1,0,'L');

      if (is_numeric($report->total_simp_suka)) {
        $total_simp_suka = number_format($report->total_simp_suka, 0, ".", ".");
      }
      else {
        $total_simp_suka = $report->total_simp_suka;
      }
      $pdf->Cell(25,6,$total_simp_suka,1,0,'L');

      if (is_numeric($report->pinjaman)) {
        $pinjaman = number_format($report->pinjaman, 0, ".", ".");
      }
      else {
        $pinjaman = $report->pinjaman;
      }
      $pdf->Cell(22,6,$pinjaman,1,0,'L');
      $pdf->Cell(22,6,$report->tanggal_pinjam,1,0,'C');
      $pdf->Cell(13,6,$report->lama,1,0,'C');

      if (is_numeric($report->tang_pinjam)) {
        $tang_pinjam = number_format($report->tang_pinjam, 0, ".", ".");
      }
      else {
        $tang_pinjam = $report->tang_pinjam;
      }
      $pdf->Cell(22,6,$tang_pinjam,1,0,'L');
      $pdf->Cell(13,6,$report->angsuran_ke,1,0,'C');

      if (is_numeric($report->angsuran)) {
        $angsuran = number_format($report->angsuran, 0, ".", ".");
      }
      else {
        $angsuran = $report->angsuran;
      }
      $pdf->Cell(20,6,$angsuran,1,0,'L');

      if (is_numeric($report->jasa)) {
        $jasa = number_format($report->jasa, 0, ".", ".");
      }
      else {
        $jasa = $report->jasa;
      }
      $pdf->Cell(18,6,$jasa,1,1,'L');

      $iterasi++;
    }
    $name = "Laporan Bulan ".$data['bulan']." ".$data['tahun'].".pdf";
    $pdf->Output('I', $name);
  }

  function download_ReportAnggota($data)
  {
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'KOPERASI SIMPAN PINJAM BKM SINDUADI',0,1,'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(190,7,'Laporan Transaksi Anggota',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,7,'------------------------------------------------------------------------------------------------------------------------------------',0,1);
    $pdf->Cell(10,7,'',0,1);

    foreach ($data['data_anggota'] as $anggota) {
      $pdf->Cell(70,7,'Nomor Anggota',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->nokta,0,1);
      $nokta = $anggota->nokta;
      $pdf->Cell(70,7,'Nama',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->nama,0,1);
      $pdf->Cell(70,7,'Alamat',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->alamat,0,1);
      $pdf->Cell(70,7,'Jenis Kelamin',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->jk,0,1);
      $pdf->Cell(70,7,'Nomor Telp.',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->no_telp,0,1);
      $pdf->Cell(70,7,'Pekerjaan',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$anggota->pekerjaan,0,1);
      $pdf->Cell(10,7,'',0,1);
      $saldo_simp_wajib = "Rp. ".number_format($anggota->saldo_simp_wajib, 0, ".", ".");
      $pdf->Cell(70,7,'Saldo Simp. Wajib',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$saldo_simp_wajib,0,1);
      $saldo_simp_suka = "Rp. ".number_format($anggota->saldo_simp_sukarela, 0, ".", ".");
      $pdf->Cell(70,7,'Saldo Simp. Sukarela',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$saldo_simp_suka,0,1);

      foreach ($data['data_pinjam'] as $pinjam) {
        $pinjaman = "Rp. ".number_format($pinjam->nominal, 0, ".", ".");
        $pdf->Cell(70,7,'Pinjaman',0,0);
        $pdf->Cell(5,7,'=',0,0);
        $pdf->Cell(70,7,$pinjaman,0,1);
        $pdf->Cell(70,7,'Tanggal Pinjam',0,0);
        $pdf->Cell(5,7,'=',0,0);
        $pdf->Cell(70,7,$pinjam->tanggal,0,1);
        $bunga = $pinjam->bunga." %";
        $pdf->Cell(70,7,'Bunga',0,0);
        $pdf->Cell(5,7,'=',0,0);
        $pdf->Cell(70,7,$bunga,0,1);
      }

      $tang_pinjam = "Rp. ".number_format($anggota->tang_pinjam, 0, ".", ".");
      $pdf->Cell(70,7,'Sisa Tangg.Pinjam',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$tang_pinjam,0,1);
      $tang_jasa = "Rp. ".number_format($anggota->tang_jasa, 0, ".", ".");
      $pdf->Cell(70,7,'Sisa Tangg. Jasa',0,0);
      $pdf->Cell(5,7,'=',0,0);
      $pdf->Cell(70,7,$tang_jasa,0,1);
    }
    $pdf->Cell(10,7,'------------------------------------------------------------------------------------------------------------------------------------',0,1);
    $pdf->Cell(10,7,'',0,1);

    $pdf->Cell(8,6,'No',1,0,'C');
    $pdf->Cell(35,6,'Tanggal',1,0,'C');
    $pdf->Cell(45,6,'Nominal Transaksi',1,0,'C');
    $pdf->Cell(55,6,'Jenis Transaksi',1,0,'C');
    $pdf->Cell(45,6,'Petugas',1,1,'C');
    $iterasi = 1;
    $pdf->SetFont('Arial','',12);
    foreach ($data['data_lapor'] as $lapor) {
      $pdf->Cell(8,6,$iterasi,1,0,'C');
      $pdf->Cell(35,6,$lapor->tanggal,1,0,'L');
      $nominal = "Rp. ".number_format($lapor->nominal, 0, ".", ".");
      $pdf->Cell(45,6,$nominal,1,0,'L');
      $pdf->Cell(55,6,$lapor->transaksi,1,0,'L');
      $pdf->Cell(45,6,$lapor->petugas,1,1,'L');
      $iterasi++;
    }

    $name = "Laporan ".$nokta.".pdf";
    $pdf->Output('I', $name);

  }

  function print_Report($data)
  {
    $this->load->view('Print/printReport', $data);
  }

  function search($target)
  {
    $data_cr = $this->input->post('search');
    $data_by = $this->input->post('search_by');

    $where = $data_by." Like '%".$data_cr."%'";
    $data['data_search'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
    $this->header('petugas');
    if ($target == "anggota") {
      $this->load->view('petugas/anggota', $data);
    }
    if ($target == "transaksi") {
      $this->load->view('petugas/transaksi', $data);
    }
    if ($target == "pinjam") {
      $this->load->view('petugas/pinjaman', $data);
    }
  }

  function home_petugas()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $this->header();
      $this->load->view('petugas/home');
    }
  }

  function vw_anggota()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
        $config['base_url'] = site_url('Petugas/vw_anggota'); //site url
        $config['total_rows'] = $this->db->count_all('tb_anggota'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['data_anggota'] = $this->Sinduadi_model->get_anggota($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();

        $this->header();
        $this->load->view('petugas/anggota', $data);
    }
  }

  function vw_transaksi_umum()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $config['base_url'] = site_url('Petugas/vw_transaksi_umum'); //site url
      $config['total_rows'] = $this->db->count_all('tb_anggota'); //total row
      $config['per_page'] = 6;  //show record per halaman
      $config["uri_segment"] = 3;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data['data_anggota'] = $this->Sinduadi_model->get_anggota($config["per_page"], $data['page'])->result();
      $data['pagination'] = $this->pagination->create_links();

      $this->header();
      $this->load->view('petugas/transaksi', $data);
    }
  }

  function vw_transaksi_pinjam()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $config['base_url'] = site_url('Petugas/vw_transaksi_pinjam'); //site url
      $config['total_rows'] = $this->db->count_all('tb_anggota'); //total row
      $config['per_page'] = 6;  //show record per halaman
      $config["uri_segment"] = 3;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data['data_anggota'] = $this->Sinduadi_model->get_anggota($config["per_page"], $data['page'])->result();
      $data['pagination'] = $this->pagination->create_links();

      $this->header();
      $this->load->view('petugas/pinjaman', $data);
    }
  }

  function vw_transaksi_angsur()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $y = date('Y');
      $m = date('m');
      $query = "SELECT tb_anggota.nokta, tb_trans_pinjam.id_trans_pinjam, tb_anggota.nama, tb_anggota.jk, tb_anggota.alamat, tb_trans_pinjam.nominal, tb_trans_pinjam.lama, tb_anggota.tang_pinjam, tb_anggota.tang_jasa
                FROM tb_anggota INNER JOIN tb_trans_pinjam ON tb_anggota.nokta = tb_trans_pinjam.`nokta`
                WHERE tb_trans_pinjam.status = 'disetujui' AND tb_anggota.nokta NOT IN (SELECT tb_trans_angsur.nokta
                FROM tb_trans_angsur INNER JOIN tb_trans_pinjam ON tb_trans_angsur.id_trans_pinjam = tb_trans_pinjam.id_trans_pinjam
                WHERE tb_trans_pinjam.status = 'disetujui' AND MONTH(tb_trans_angsur.tanggal) = '".$m."' AND YEAR(tb_trans_angsur.tanggal) = '".$y."')";

      $data['data_anggota'] = $this->Sinduadi_model->sql_query_custom($query)->result();
      $this->header();
      $this->load->view('petugas/angsuran', $data);
    }
  }

  function tbh_anggota()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $anggota = $this->Sinduadi_model->ambil_data('tb_anggota');
      $jml = $anggota->num_rows() + 1;
      $y = date('Y');
      $m = date('m');
      $d = date('d');

      if ($jml < 10) {
        $nokta['nomor'] = $y.$m.$d.'000'.$jml;
      }
      elseif ($jml < 100) {
        $nokta['nomor'] = $y.$m.$d.'00'.$jml;
      }
      elseif ($jml < 1000) {
        $nokta['nomor'] = $y.$m.$d.'0'.$jml;
      }
      else {
        $nokta['nomor'] = $y.$m.$d.$jml;
      }

      $this->header();
      $this->load->view('petugas/tbh_anggota', $nokta);
    }
  }

  function edt_anggota($nokta)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = array('nokta' => $nokta);
      $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
      $this->header();
      $this->load->view('petugas/edt_anggota', $data);
    }
  }

  function reset_pass_anggota($nokta)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $pass = md5($nokta);
      $data=array(
        'pass'=> $pass
      );

      $where = array('nokta'=>$nokta);
      $this->Sinduadi_model->update_data($where, $data, 'tb_anggota');
      $this->session->set_userdata('message', "Reset Password Berhasil !");
      $this->vw_anggota();
    }
  }

  function rincianAnggota($nokta, $aksi)
  {
    $where = array('nokta' => $nokta);
    $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
    $where_pinjam = "nokta = '".$nokta."' AND status = 'disetujui'";
    $data['data_pinjam'] = $this->Sinduadi_model->ambil_where($where_pinjam, 'tb_trans_pinjam')->result();
    $data['data_lapor'] = $this->get_laporan_anggota($nokta);
    if ($aksi == '1') {
      $this->header();
      $this->load->view('petugas/rincianAnggota', $data);
    }
    if ($aksi == '2') {
      $this->load->view('Print/printReportAnggota', $data);
    }
    if ($aksi == '3') {
      $this->download_ReportAnggota($data);
    }
  }

  function vw_laporanAnggota()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
        $config['base_url'] = site_url('Petugas/vw_laporanAnggota'); //site url
        $config['total_rows'] = $this->db->count_all('tb_anggota'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['data_anggota'] = $this->Sinduadi_model->get_anggota($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();

        $this->header();
        $this->load->view('petugas/laporanTransaksi', $data);
    }
  }

  function trans_simpan($nokta)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = array('nokta' => $nokta);
      $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
      $this->header();
      $this->load->view('petugas/trans_simpan', $data);
    }
  }

  function trans_ambil($nokta)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = array('nokta' => $nokta);
      $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
      $this->header();
      $this->load->view('petugas/trans_ambil', $data);
    }
  }

  function trans_pinjam($nokta)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $where = array('nokta' => $nokta);
      $data['data_anggota'] = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
      $data['data_syarat'] = $this->Sinduadi_model->ambil_data('tb_dasar')->result();
      $this->header();
      $this->load->view('petugas/trans_pinjaman', $data);
    }
  }

  function trans_angsur($id)
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $query = "SELECT tb_anggota.nokta, tb_trans_pinjam.id_trans_pinjam, tb_anggota.nama, tb_anggota.jk, tb_anggota.alamat, tb_trans_pinjam.nominal AS pinjam, tb_trans_pinjam.lama, tb_anggota.tang_pinjam, tb_anggota.tang_jasa,
                tb_anggota.tang_angsur AS angsur, COUNT(tb_trans_angsur.id_trans_angsur) AS jml_angsur
                FROM tb_anggota INNER JOIN tb_trans_pinjam ON tb_anggota.nokta = tb_trans_pinjam.nokta INNER JOIN tb_trans_angsur ON tb_trans_pinjam.id_trans_pinjam = tb_trans_angsur.id_trans_pinjam
                WHERE tb_trans_pinjam.status = 'disetujui' AND tb_trans_pinjam.id_trans_pinjam = '".$id."'";

      $data['data_anggota'] = $this->Sinduadi_model->sql_query_custom($query)->result();
      $this->header();
      $this->load->view('petugas/trans_angsur', $data);
    }
  }

  function aksi_tambah_anggota()
  {
    $nokta = $this->input->post('nokta');
    $nama = $this->input->post('nama');
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $pekerjaan = $this->input->post('pekerjaan');
    $pass = md5($this->input->post('nokta'));
    $tanggal = date('Y-m-d');

    $data=array(
      'nokta'=>$nokta,
      'nama'=>$nama,
      'jk'=>$jk,
      'alamat'=>$alamat,
      'no_telp'=>$no_telp,
      'pekerjaan'=>$pekerjaan,
      'pass'=>$pass,
      'saldo_simp_wajib'=>0,
      'saldo_simp_sukarela'=>0,
      'tang_pinjam'=>0,
      'tang_angsur'=>0
    );

    $this->Sinduadi_model->tambah_data($data, 'tb_anggota');

    $dasar = $this->Sinduadi_model->ambil_data('tb_dasar')->result();
    foreach ($dasar as $dt_dasar) {
      $nil_simp_pokok = $dt_dasar->nilai_simp_pokok;
    }

    $data_simp_wajib=array(
      'nokta'=>$nokta,
      'username_karyawan'=>$this->session->userdata('username'),
      'nominal'=>$nil_simp_pokok,
      'jenis_simpan'=>"wajib",
      'tanggal'=>$tanggal
    );
    $this->Sinduadi_model->tambah_data($data_simp_wajib, 'tb_trans_simpan');

    $updt_saldo=array(
      'saldo_simp_wajib'=>$nil_simp_pokok
    );
    $this->updt_rekening($updt_saldo, $nokta);

    $this->session->set_userdata('message', "Penambahan Berhasil");
    $this->vw_anggota();
  }

  function aksi_edit_anggota()
  {
    $nokta = $this->input->post('nokta');
    $nama = $this->input->post('nama');
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $pekerjaan = $this->input->post('pekerjaan');

    $data=array(
      'nama'=>$nama,
      'jk'=>$jk,
      'alamat'=>$alamat,
      'no_telp'=>$no_telp,
      'pekerjaan'=>$pekerjaan
    );

    $where = array('nokta'=>$nokta);
    $this->Sinduadi_model->update_data($where, $data, 'tb_anggota');
    $this->session->set_userdata('message', "Perubahan Berhasil ");
    $this->vw_anggota();
  }

  function aksi_simpan()
  {
    $simp_wajib = $this->input->post('simp_wajib');
    $simp_suka = $this->input->post('simp_suka');
    $nokta = $this->input->post('nokta');
    $username_pet = $this->session->userdata('username');
    $tanggal = date('Y-m-d');

    $dasar = $this->Sinduadi_model->ambil_data('tb_dasar')->result();
    foreach ($dasar as $dt_dasar) {
      $nil_simp_wajib = $dt_dasar->nilai_simp_wajib;
    }

    $where_saldo = "nokta = '".$nokta."'";
    $saldo = $this->Sinduadi_model->ambil_where($where_saldo, 'tb_anggota')->result();
    foreach ($saldo as $dt_saldo) {
      $jml_simp_wajib = $dt_saldo->saldo_simp_wajib;
      $jml_simp_sukarela = $dt_saldo->saldo_simp_sukarela;
      $nama_anggota = $dt_saldo->nama;
    }


    if ($simp_wajib == 1)
    {
      $jml_simp_wajib = $nil_simp_wajib + $jml_simp_wajib;
      $data_simp_wajib=array(
        'nokta'=>$nokta,
        'username_karyawan'=>$username_pet,
        'nominal'=>$nil_simp_wajib,
        'jenis_simpan'=>"wajib",
        'tanggal'=>$tanggal
      );

      $this->Sinduadi_model->tambah_data($data_simp_wajib, 'tb_trans_simpan');
    }

    if ($simp_suka != 0) {
      $nil_simp_suka = $simp_suka + $jml_simp_sukarela;
      $data_simp_suka=array(
        'nokta'=>$nokta,
        'username_karyawan'=>$username_pet,
        'nominal'=>$simp_suka,
        'jenis_simpan'=>"sukarela",
        'tanggal'=>$tanggal
      );
      $this->Sinduadi_model->tambah_data($data_simp_suka, 'tb_trans_simpan');
    }
    else {
      $nil_simp_suka = $jml_simp_sukarela;
    }
    $updt_saldo=array(
      'saldo_simp_wajib'=>$jml_simp_wajib,
      'saldo_simp_sukarela'=>$nil_simp_suka
    );
    $this->updt_rekening($updt_saldo, $nokta);

    if ($simp_suka != 0 && $simp_wajib == 1) {
      $data_cetak = array(
        'nokta_cetak' => $nokta,
        'nama_anggota' =>$nama_anggota,
        'nama_petugas' =>$this->session->userdata('nama'),
        'transaksi1' => 'Simpanan Wajib',
        'nominal1' => $nil_simp_wajib,
        'transaksi2' => 'Simpanan Sukarela',
        'nominal2' => $simp_suka
      );
    }
    elseif ($simp_suka != 0) {
      $data_cetak = array(
        'nokta_cetak' => $nokta,
        'nama_anggota' =>$nama_anggota,
        'nama_petugas' =>$this->session->userdata('nama'),
        'transaksi1' => 'Simpanan Sukarela',
        'nominal1' => $simp_suka
      );
    }
    elseif ($simp_wajib == 1) {
      $data_cetak = array(
        'nokta_cetak' => $nokta,
        'nama_anggota' =>$nama_anggota,
        'nama_petugas' =>$this->session->userdata('nama'),
        'transaksi1' => 'Simpanan Wajib',
        'nominal1' => $nil_simp_wajib
      );
    }
    $this->session->set_flashdata($data_cetak);
    $this->session->set_userdata('message', "Transaksi Simpan Berhasil ".anchor('Petugas/print_nota','Cetak Bukti Transaksi', array('target' => '_blank')));
    $this->vw_transaksi_umum();
  }

  function aksi_ambil()
  {
    $nokta = $this->input->post('nokta');
    $ambil = $this->input->post('ambil');
    $saldo = $this->input->post('saldo');
    $tanggal = date('Y-m-d');

    if ($ambil > $saldo) {
      $this->session->set_userdata('message', "Proses Ambil GAGAL, Saldo Tidak Mencukupi !");
      $this->trans_ambil($nokta);
    }
    else {
      $saldo_akhir = $saldo - $ambil;
      $where = "nokta = '".$nokta."'";
      $data_anggota = $this->Sinduadi_model->ambil_where($where, 'tb_anggota')->result();
      foreach ($data_anggota as $dt_anggota) {
        $nama_anggota = $dt_anggota->nama;
      }

      $data_ambil=array(
        'nokta'=>$nokta,
        'username_karyawan'=>$this->session->userdata('username'),
        'nominal'=>$ambil,
        'tanggal'=>$tanggal
      );
      $this->Sinduadi_model->tambah_data($data_ambil, 'tb_trans_ambil');

      $data_saldo=array(
        'saldo_simp_sukarela'=>$saldo_akhir
      );
      $this->updt_rekening($data_saldo, $nokta);
      $data_cetak = array(
        'nokta_cetak' => $nokta,
        'nama_anggota' =>$nama_anggota,
        'nama_petugas' =>$this->session->userdata('nama'),
        'transaksi1' => 'Ambil',
        'nominal1' => $ambil
      );
      $this->session->set_flashdata($data_cetak);
      $this->session->set_userdata('message', "Transaksi Ambil Berhasil ! ".anchor('Petugas/print_nota','Cetak Bukti Transaksi', array('target' => '_blank')));
      $this->vw_transaksi_umum();
    }
  }

  function aksi_pinjam()
  {
    $nokta = $this->input->post('nokta');
    $username_pet = $this->session->userdata('username');
    $nominal = $this->input->post('nominal_pengajuan');
    $lama = $this->input->post('lama_pinjam');
    $tanggal = date('Y-m-d');

    $dasar = $this->Sinduadi_model->ambil_data('tb_dasar')->result();
    foreach ($dasar as $dt_dasar) {
      $batas_bunga = $dt_dasar->batas_bunga;
      $bunga1 = $dt_dasar->bunga1;
      $bunga2 = $dt_dasar->bunga2;
    }

    if ($nominal > $batas_bunga) {
      $bunga = $bunga2;
    }
    else {
      $bunga = $bunga1;
    }

    $data_pinjam=array(
      'nokta'=>$nokta,
      'username_karyawan'=>$username_pet,
      'nominal'=>$nominal,
      'bunga'=>$bunga,
      'lama'=>$lama,
      'tanggal'=>$tanggal,
      'status'=>"diajukan"
    );
    $this->Sinduadi_model->tambah_data($data_pinjam, 'tb_trans_pinjam');
    $this->session->set_userdata('message', "Pengajuan Pinjaman Berhasil !");
    $this->vw_transaksi_pinjam();
  }

  function aksi_angsur()
  {
    $id = $this->input->post('id');
    $nokta = $this->input->post('nokta');
    $tang_angsur = $this->input->post('tang_angsur');
    $nominal_angsuran = $this->input->post('nominal_angsuran');
    $tanggal = date('Y-m-d');

    if ($nominal_angsuran >= $tang_angsur) {
      $where_hitung = "tb_anggota.nokta = '".$nokta."' and tb_trans_pinjam.id_trans_pinjam = '".$id."'";
      $hitung = $this->Sinduadi_model->ambil_pengaju_pinjaman($where_hitung)->result();
      foreach ($hitung as $dt_hitung) {
        $pinjaman = $dt_hitung->nominal;
        $lama = $dt_hitung->lama;
        $jml_simp_sukarela = $dt_hitung->saldo_simp_sukarela;
        $tang_pinjam = $dt_hitung->tang_pinjam;
        $tang_jasa = $dt_hitung->tang_jasa;
        $nama_anggota = $dt_hitung->nama;
      }

      $pokok = ceil($pinjaman / $lama);
      $jasa = $tang_angsur - $pokok;

      $data_angsur=array(
        'id_trans_pinjam'=>$id,
        'nokta'=>$nokta,
        'username_karyawan'=>$this->session->userdata('username'),
        'angsuran_pokok'=>$pokok,
        'jasa'=>$jasa,
        'tanggal'=>$tanggal
      );
      $this->Sinduadi_model->tambah_data($data_angsur, 'tb_trans_angsur');

      $sisa = $nominal_angsuran - $tang_angsur;
      if ($sisa > 0) {
        $nilai_simp_suka = $jml_simp_sukarela + $sisa;
        $data_simp_suka=array(
          'nokta'=>$nokta,
          'username_karyawan'=>$this->session->userdata('username'),
          'nominal'=>$sisa,
          'jenis_simpan'=>"sukarela",
          'tanggal'=>$tanggal
        );
        $this->Sinduadi_model->tambah_data($data_simp_suka, 'tb_trans_simpan');
      }
      else {
        $nilai_simp_suka = $jml_simp_sukarela;
      }

      $tang_pinjam = $tang_pinjam - $pokok;
      $tang_jasa = $tang_jasa - $jasa;
      if ($tang_pinjam < 0) {
        $tang_pinjam = 0;
        if ($tang_jasa < 0) {
          $tang_jasa = 0;
        }
        $where_lunas = "id_trans_pinjam = '".$id."'";
        $updt_lunas=array(
          'status'=>'lunas'
        );
        $this->Sinduadi_model->update_data($where_lunas, $updt_lunas, 'tb_trans_pinjam');
        $updt_saldo=array(
        'saldo_simp_sukarela'=>$nilai_simp_suka,
        'tang_pinjam'=>$tang_pinjam,
        'tang_jasa'=>$tang_jasa,
        'tang_angsur'=>0
        );
      }
      else {
        $updt_saldo=array(
        'saldo_simp_sukarela'=>$nilai_simp_suka,
        'tang_pinjam'=>$tang_pinjam,
        'tang_jasa'=>$tang_jasa
        );
      }
      $this->updt_rekening($updt_saldo, $nokta);

      if ($sisa > 0) {
        $data_cetak = array(
          'nokta_cetak' => $nokta,
          'nama_anggota' =>$nama_anggota,
          'nama_petugas' =>$this->session->userdata('nama'),
          'transaksi1' => 'Simpanan Sukarela',
          'nominal1' => $sisa,
          'transaksi2' => 'Angsuran Pokok',
          'nominal2' => $pokok,
          'transaksi3' => 'Jasa Pinjaman',
          'nominal3' => $jasa
        );
      }
      else {
        $data_cetak = array(
          'nokta_cetak' => $nokta,
          'nama_anggota' =>$nama_anggota,
          'nama_petugas' =>$this->session->userdata('nama'),
          'transaksi1' => 'Angsuran Pokok',
          'nominal1' => $pokok,
          'transaksi2' => 'Jasa Pinjaman',
          'nominal2' => $jasa
        );
      }

      $this->session->set_flashdata($data_cetak);
      $this->session->set_userdata('message', "Transaksi Angsuran Berhasil ".anchor('Petugas/print_nota','Cetak Bukti Transaksi', array('target' => '_blank')));
      $this->vw_transaksi_angsur();

    }
    else {
      $this->session->set_userdata('message', "Nominal Angsuran Harus Lebih Besar/Sama Dengan Tanggungan Angsuran");
      $this->trans_angsur($id);
    }
  }

  function laporan_bulanan()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $this->header();
      $this->load->view('petugas/laporan');
    }
  }

  function get_laporan_bulanan()
  {
    if($this->session->userdata('level') != 'petugas'){
      $data['pesan'] = "Anda Belum Login";
      $this->load->view('login_karyawan', $data);
    }
    else {
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $this->download_laporan_bulanan($bulan, $tahun, '1');
    }
  }

  function download_laporan_bulanan($bulan, $tahun, $aksi)
  {
    $data_up = array();
    $data_anggota = $this->Sinduadi_model->ambil_data('tb_anggota')->result();

    $select = "tb_anggota.nokta, SUM(tb_trans_simpan.nominal) as nominal";
    $from = "tb_anggota, tb_trans_simpan";
    $where = "tb_anggota.nokta = tb_trans_simpan.nokta AND tb_trans_simpan.jenis_simpan = 'wajib' AND MONTH(tanggal) = '".$bulan."' AND YEAR(tanggal) = '".$tahun."'";
    $where2 = "tb_anggota.nokta = tb_trans_simpan.nokta AND tb_trans_simpan.jenis_simpan = 'sukarela' AND MONTH(tanggal) = '".$bulan."' AND YEAR(tanggal) = '".$tahun."'";
    $GroupBy = "tb_anggota.nokta, tb_trans_simpan.jenis_simpan";
    $data_swajib = $this->Sinduadi_model->sql_group_by($select, $from, $GroupBy, $where)->result();
    $data_ssuka = $this->Sinduadi_model->sql_group_by($select, $from, $GroupBy, $where2)->result();

    $select2 = "tb_anggota.nokta, tb_trans_pinjam.id_trans_pinjam, SUM(tb_trans_angsur.angsuran_pokok) as angsuran_pokok, SUM(tb_trans_angsur.jasa) as jasa";
    $from2 = "tb_anggota, tb_trans_pinjam, tb_trans_angsur";
    $where3 = "tb_anggota.nokta = tb_trans_pinjam.nokta AND tb_trans_pinjam.id_trans_pinjam = tb_trans_angsur.id_trans_pinjam AND tb_trans_pinjam.status = 'disetujui' AND MONTH(tb_trans_angsur.tanggal) <= '".$bulan."' AND YEAR(tb_trans_angsur.tanggal) = '".$tahun."'";
    $GroupBy2 = "tb_anggota.nokta";
    $data_angsur1 = $this->Sinduadi_model->sql_group_by($select2, $from2, $GroupBy2, $where3)->result();

    $select3 = "tb_anggota.nokta, tb_trans_pinjam.nominal, tb_trans_pinjam.tanggal, tb_trans_pinjam.lama, COUNT(tb_trans_angsur.angsuran_pokok) AS jml_angsur";
    $from3 = "tb_anggota, tb_trans_pinjam, tb_trans_angsur";
    $where4 = "tb_anggota.nokta = tb_trans_pinjam.nokta AND tb_trans_pinjam.id_trans_pinjam = tb_trans_angsur.id_trans_pinjam AND tb_trans_pinjam.status = 'disetujui' AND MONTH(tb_trans_angsur.tanggal) <= '".$bulan."' AND YEAR(tb_trans_angsur.tanggal) = '".$tahun."'";
    $data_angsur2 = $this->Sinduadi_model->sql_group_by($select3, $from3, $GroupBy2, $where4)->result();

    $where_wajib = "tb_anggota.nokta = tb_trans_simpan.nokta AND tb_trans_simpan.jenis_simpan = 'wajib'
                    AND MONTH(tb_trans_simpan.tanggal) <= '".$bulan."' AND YEAR(tb_trans_simpan.tanggal) = '".$tahun."'";
    $where_suka = "tb_anggota.nokta = tb_trans_simpan.nokta AND tb_trans_simpan.jenis_simpan = 'sukarela'
                    AND MONTH(tb_trans_simpan.tanggal) <= '".$bulan."' AND YEAR(tb_trans_simpan.tanggal) = '".$tahun."'";
    $data_total_wajib = $this->Sinduadi_model->sql_group_by($select, $from, $GroupBy2, $where_wajib)->result();
    $data_total_suka = $this->Sinduadi_model->sql_group_by($select, $from, $GroupBy2, $where_suka)->result();

    $select_ambil = "tb_anggota.nokta, SUM(tb_trans_ambil.nominal) AS ambil";
    $from_ambil = "tb_anggota, tb_trans_ambil";
    $where_ambil = "tb_anggota.nokta = tb_trans_ambil.nokta AND MONTH(tb_trans_ambil.tanggal) <= '".$bulan."' AND YEAR(tb_trans_ambil.tanggal) = '".$tahun."'";
    $data_ambil = $this->Sinduadi_model->sql_group_by($select_ambil, $from_ambil, $GroupBy2, $where_ambil)->result();



    foreach ($data_anggota as $anggota) {
      $temp = array();
      $temp = array(
        'nokta'=>$anggota->nokta,
        'nama'=>$anggota->nama,
        'alamat'=>$anggota->alamat,
        'jk'=>$anggota->jk,
        'simp_wajib'=>'-',
        'simp_suka'=>'-',
        'total_simp_wajib'=>'-',
        'total_simp_suka'=>'-',
        'pinjaman'=>'0',
        'tanggal_pinjam'=>'-',
        'lama'=>'-',
        'tang_pinjam'=>$anggota->tang_pinjam,
        'angsuran_ke'=>'-',
        'angsuran'=>'-',
        'jasa'=>'-'
      );

      foreach ($data_total_wajib as $wajib) {
        if ($wajib->nokta == $temp['nokta']) {
          $temp['total_simp_wajib'] = $wajib->nominal;
        }
      }

      foreach ($data_total_suka as $suka) {
        if ($suka->nokta == $temp['nokta']) {
          $temp['total_simp_suka'] = $suka->nominal;
        }
      }

      foreach ($data_ambil as $ambil) {
        if ($ambil->nokta == $temp['nokta']) {
          $temp['total_simp_suka'] = $temp['total_simp_suka'] - $ambil->ambil;
        }
      }

      foreach ($data_swajib as $wajib) {
        if ($wajib->nokta == $temp['nokta']) {
          $temp['simp_wajib'] = $wajib->nominal;
        }
      }

      foreach ($data_ssuka as $suka) {
        if ($suka->nokta == $temp['nokta']) {
          $temp['simp_suka'] = $suka->nominal;
        }
      }

      foreach ($data_angsur1 as $angsur) {
        if ($angsur->nokta == $temp['nokta']) {
          $temp['angsuran'] = $angsur->angsuran_pokok;
          $temp['jasa'] = $angsur->jasa;
        }
      }

      foreach ($data_angsur2 as $angsur) {
        if ($angsur->nokta == $temp['nokta']) {
          $temp['angsuran_ke'] = $angsur->jml_angsur;
          $temp['pinjaman'] = $angsur->nominal;
          $temp['tanggal_pinjam'] = $angsur->tanggal;
          $temp['lama'] = $angsur->lama;
        }
      }
      array_push($data_up, $temp);
    }
    $data_send['data_lapor'] = $this->arrayToObject($data_up);
    $data_send['bulan'] = $bulan;
    $data_send['tahun'] = $tahun;
    if ($aksi == 1) {
      $this->header();
      $this->load->view('petugas/laporan', $data_send);
    }
    if ($aksi == 2) {
      $this->download_Report($data_send);
    }
    if ($aksi == 3) {
      $this->print_Report($data_send);
    }
  }

  function get_laporan_anggota($nokta)
  {
    $data_temp = array();

    $select_simpan = "tb_trans_simpan.nominal, tb_trans_simpan.jenis_simpan, tb_trans_simpan.tanggal, tb_karyawan.nama";
    $where_simpan = "tb_trans_simpan.nokta = '".$nokta."'";
    $join_simpan = "tb_trans_simpan.username_karyawan = tb_karyawan.username_karyawan";
    $data_simpan = $this->Sinduadi_model->sql_inner_join($select_simpan, $where_simpan, 'tb_trans_simpan', 'tb_karyawan', $join_simpan)->result();

    $select_ambil = "tb_trans_ambil.nominal, tb_trans_ambil.tanggal, tb_karyawan.nama";
    $where_ambil = "tb_trans_ambil.nokta = '".$nokta."'";
    $join_ambil = "tb_trans_ambil.username_karyawan = tb_karyawan.username_karyawan";
    $data_ambil = $this->Sinduadi_model->sql_inner_join($select_ambil, $where_ambil, 'tb_trans_ambil', 'tb_karyawan', $join_ambil)->result();

    $select_pinjam = "tb_trans_pinjam.nominal, tb_trans_pinjam.tanggal, tb_karyawan.nama";
    $where_pinjam = "tb_trans_pinjam.nokta = '".$nokta."' AND tb_trans_pinjam.status = 'disetujui' OR tb_trans_pinjam.status = 'lunas'";
    $join_pinjam = "tb_trans_pinjam.username_karyawan = tb_karyawan.username_karyawan";
    $data_pinjam = $this->Sinduadi_model->sql_inner_join($select_pinjam, $where_pinjam, 'tb_trans_pinjam', 'tb_karyawan', $join_pinjam)->result();

    $select_angsur = "tb_trans_angsur.angsuran_pokok, tb_trans_angsur.jasa, tb_trans_angsur.tanggal, tb_karyawan.nama";
    $where_angsur = "tb_trans_angsur.nokta = '".$nokta."'";
    $join_angsur = "tb_trans_angsur.username_karyawan = tb_karyawan.username_karyawan";
    $data_angsur = $this->Sinduadi_model->sql_inner_join($select_angsur, $where_angsur, 'tb_trans_angsur', 'tb_karyawan', $join_angsur)->result();

    foreach ($data_simpan as $simpan) {
      if ($simpan->jenis_simpan == "wajib") {
        $jenis = "Simpanan Wajib";
      }
      else {
        $jenis = "Simpanan Sukarela";
      }
      $temp = array(
        'tanggal'=>$simpan->tanggal,
        'nominal'=>$simpan->nominal,
        'transaksi'=>$jenis,
        'petugas'=>$simpan->nama
      );
      array_push($data_temp, $temp);
    }

    foreach ($data_ambil as $ambil) {
      $temp = array(
        'tanggal'=>$ambil->tanggal,
        'nominal'=>$ambil->nominal,
        'transaksi'=>'Ambil',
        'petugas'=>$ambil->nama
      );
      array_push($data_temp, $temp);
    }

    foreach ($data_pinjam as $pinjam) {
      $temp = array(
        'tanggal'=>$pinjam->tanggal,
        'nominal'=>$pinjam->nominal,
        'transaksi'=>'Pinjam',
        'petugas'=>$pinjam->nama
      );
      array_push($data_temp, $temp);
    }

    foreach ($data_angsur as $angsur) {
      $temp = array(
        'tanggal'=>$angsur->tanggal,
        'nominal'=>$angsur->angsuran_pokok + $angsur->jasa,
        'transaksi'=>'Angsur',
        'petugas'=>$angsur->nama
      );
      array_push($data_temp, $temp);
    }

    $key = array_column($data_temp, 'tanggal');
    $data_sort = array_multisort($key, SORT_ASC, $data_temp);
    $data = $this->arrayToObject($data_temp);
    return $data;
  }

  function getKrtPinjam($nokta)
  {
    $select = "tb_anggota.nokta, tb_anggota.nama, tb_anggota.jk, tb_anggota.alamat, tb_anggota.no_telp,
              tb_trans_pinjam.tanggal, tb_trans_pinjam.nominal, tb_trans_pinjam.bunga, tb_trans_pinjam.lama, tb_anggota.tang_angsur";
    $where = "tb_trans_pinjam.status = 'disetujui' AND tb_anggota.nokta = '".$nokta."'";
    $join = "tb_anggota.nokta = tb_trans_pinjam.nokta";
    $data['data_send'] = $this->Sinduadi_model->sql_inner_join($select, $where, 'tb_anggota', 'tb_trans_pinjam', $join)->result();

    $this->print_Krt_Pinjam($data);
  }

  function arrayToObject($data)
  {
    if (is_array($data)) {
      return (object) array_map(__METHOD__, $data);
    }
    else {
      return $data;
    }
  }

}
?>
