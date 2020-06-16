<?php if(!defined("BASEPATH")) exit("Tidak dapat mengakses langsung");
Class Treeview_m extends CI_Model {
  function __construct(){
    parent::__construct();
  }
  function kotaGetAll()
  {
      $query="SELECT * FROM kota";
      return $this->db->query($query)->result_array();
  }
  function kecamatanGetBykota_id($params)
  {
      $query="SELECT * FROM kecamatan where kota_id=?";
      return $this->db->query($query, $params)->result_array();
  }
  function desaGetBykecamatan_id($params)
  {
      $query="SELECT * FROM desa where kecamatan_id=?";
      return $this->db->query($query, $params)->result_array();
  }
}