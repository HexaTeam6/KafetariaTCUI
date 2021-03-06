<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
            SELECT * FROM pengeluaran
		    ORDER BY created_at DESC");
    }

    function tampil_perhari(){
        return $this->db->query("
            SELECT p.*, SUM(p.jumlah) AS total, DATE(tanggal_pembelian) as waktu
            FROM pengeluaran p
            GROUP BY DATE(tanggal_pembelian)");
    }

    function tampil_perminggu(){
        return $this->db->query("
            SELECT p.*, SUM(p.jumlah) AS total , WEEK(tanggal_pembelian) as waktu
            FROM pengeluaran p
            GROUP BY  WEEK(tanggal_pembelian)");
    }

    function tampil_perbulan(){
        return $this->db->query("
            select p.*, sum(p.jumlah) AS total , DATE_FORMAT(tanggal_pembelian, '%m-%Y') as waktu
            from pengeluaran p
            group by  DATE_FORMAT(tanggal_pembelian, '%m-%Y')");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_pengeluaran',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_pengeluaran', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_pengeluaran',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>