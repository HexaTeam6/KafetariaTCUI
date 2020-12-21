<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function tampil_data(){
        return $this->db->query("
            SELECT p.*, l.username, l.id_login FROM penjual p, login l
            WHERE p.id_login = l.id_login
		    ORDER BY nama_penjual DESC");
    }

    function listPenjual(){
        return $this->db->query("SELECT id_penjual, nama_penjual
                                 FROM penjual");
    }

    function input_data($table,$data){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($table,$where,$data){
        $this->db->where('id_penjual',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table, $where)
    {
        $this->db->where('id_penjual', $where);
        $this->db->delete($table);
    }
    function inactive_data($table,$where,$data){
        $this->db->where('id_penjual',$where);
        $this->db->update($table,$data);
        return true;
    }

}
?>