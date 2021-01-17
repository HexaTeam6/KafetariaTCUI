<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_perhari(){
        return $this->db->query("
            SELECT p.*, SUM(p.total_bayar) AS total, u.`nama_pembeli`, DATE(waktu_pesan) as waktu
            FROM pesanan p, pembeli u
            WHERE p.id_pembeli = u.`id_pembeli`
            GROUP BY DATE(waktu_pesan)");
    }

    function tampil_perminggu(){
        return $this->db->query("
            SELECT p.*, SUM(p.total_bayar) AS total , u.`nama_pembeli`, WEEK(waktu_pesan) as waktu
            FROM pesanan p, pembeli u
            WHERE p.id_pembeli = u.`id_pembeli`
            GROUP BY  WEEK(waktu_pesan)");
    }

    function tampil_perbulan(){
        return $this->db->query("
            select p.*, sum(p.total_bayar) AS total , u.`nama_pembeli`, DATE_FORMAT(waktu_pesan, '%m-%Y') as waktu
            from pesanan p, pembeli u
            where p.id_pembeli = u.`id_pembeli`
            group by  DATE_FORMAT(waktu_pesan, '%m-%Y')");
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