<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sinduadi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function ambil_data($table){
    return $this->db->get($table);
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function ambil_where($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  function tambah_data($data, $tabel)
  {
    $this->db->insert($tabel, $data);
  }

  function ambil_pengaju_pinjaman($where)
  {
    $this->db->select('*');
    $this->db->from('tb_anggota');
    $this->db->join('tb_trans_pinjam', 'tb_anggota.nokta = tb_trans_pinjam.nokta');
    $this->db->where($where);
    return $this->db->get();
  }

  function cari_transaksi($where)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->join('tb_saldo', 'tb_user.nokta = tb_saldo.nokta');
    $this->db->where($where);
    return $this->db->get();
  }

  function aksi_login($username, $pass)
  {
    $pass1 = md5($pass);

    $this->db->select('*');
    $this->db->from('tb_karyawan');
    $this->db->where('username_karyawan', $username);
    $this->db->where('pass', $pass1);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }
    else {
      return false;
    }
  }

  function aksi_login_anggota($nokta, $pass)
  {
    $pass1 = md5($pass);

    $this->db->select('*');
    $this->db->from('tb_anggota');
    $this->db->where('nokta', $nokta);
    $this->db->where('pass', $pass1);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }
    else {
      return false;
    }
  }

  function sql_inner_join_limit($select, $where, $tb1, $tb2, $join)
  {
    $this->db->select($select);
    $this->db->from($tb1);
    $this->db->join($tb2, $join);
    $this->db->where($where);
    $this->db->limit(10);
    return $this->db->get();
  }

  function sql_inner_join($select, $where, $tb1, $tb2, $join)
  {
    $this->db->select($select);
    $this->db->from($tb1);
    $this->db->join($tb2, $join);
    $this->db->where($where);
    return $this->db->get();
  }

  function sql_group_by($select, $from, $GroupBy, $where){
    $this->db->select($select);
    $this->db->from($from);
    $this->db->where($where);
    $this->db->group_by($GroupBy);
    return $this->db->get();
  }

  function sql_where_khusus($select, $from, $where)
  {
    $this->db->select($select);
    $this->db->from($from);
    $this->db->where($where);
    return $this->db->get();
  }

  function sql_query_custom($query)
  {
    return $this->db->query($query);
    // return $this->db->get();
  }

  function get_anggota($limit, $start)
  {
    $query = $this->db->get('tb_anggota', $limit, $start);
    return $query;
  }

  function get_where_khusus($where, $table, $limit, $start)
  {
    return $this->db->get_where($table, $where, $limit, $start);
  }

}
