<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
            SELECT * FROM pesanan
		    ORDER BY waktu_pesan DESC");
    }

    function tampil_data_count(){
        return $this->db->query("
            SELECT 
            SUM(case when status_pesanan = 1 then 1 else 0 end) as menunggu,
            SUM(case when status_pesanan = 2 then 1 else 0 end) as diproses,
            SUM(case when status_pesanan = 3 then 1 else 0 end) as selesai,
            SUM(case when status_pesanan = 4 then 1 else 0 end) as diambil
            FROM pesanan
		    ORDER BY waktu_pesan DESC");
    }

    function pesananByIdPembeli($id_pembeli){
        return $this->db->query("
            SELECT * FROM pesanan
            WHERE id_pembeli = ?
		    ORDER BY waktu_pesan DESC", array($id_pembeli));
    }

    function pesananByIdPembeli_count($id_pembeli){
        return $this->db->query("
            SELECT 
            SUM(case when status_pesanan = 1 then 1 else 0 end) as menunggu,
            SUM(case when status_pesanan = 2 then 1 else 0 end) as diproses,
            SUM(case when status_pesanan = 3 then 1 else 0 end) as selesai,
            SUM(case when status_pesanan = 4 then 1 else 0 end) as diambil
            FROM pesanan
            WHERE id_pembeli = ?
		    ORDER BY waktu_pesan DESC", array($id_pembeli));
    }

//    function pesanan_penjual(){
//        return $this->db->query("
//            SELECT * FROM pesanan
//            WHERE id_penjual = ?
//		    ORDER BY waktu_pesan DESC", array($_SESSION['id_penjual']));
//    }
//
//    function pesanan_penjual_count($id_pembeli){
//        return $this->db->query("
//            SELECT
//            SUM(case when status_pesanan = 1 then 1 else 0 end) as menunggu,
//            SUM(case when status_pesanan = 2 then 1 else 0 end) as diproses,
//            SUM(case when status_pesanan = 3 then 1 else 0 end) as selesai,
//            SUM(case when status_pesanan = 4 then 1 else 0 end) as diambil
//            FROM pesanan
//            WHERE id_pembeli = ?
//		    ORDER BY waktu_pesan DESC", array($id_pembeli));
//    }

    function listPesanan(){
        return $this->db->query("SELECT id_pesanan, nama_pesanan
                                 FROM pesanan");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_pesanan',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_pesanan', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_pesanan',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>