<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
            SELECT m.*, k.* FROM menu m, kategori k
            WHERE m.id_kategori = k.id_kategori
		    ORDER BY m.nama_menu DESC");
    }

    function listMenu(){
        return $this->db->query("SELECT id_menu, nama_menu
                                 FROM menu");
    }

    function updateStock($id_menu, $jumlah){
        return $this->db->query("UPDATE menu SET stok = stok - ? WHERE id_menu = ?", array($jumlah, $id_menu));
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_menu',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_menu', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_menu',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>