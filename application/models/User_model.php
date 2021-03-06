<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    function getLogin($username, $password){
        $sql = "SELECT * FROM login
                WHERE username=? 
                AND password=MD5(?)";
        $result = $this->db->query($sql, array($username, $password));
        return $result;
    }

    function getUserData($table, $id_login){
        $this->db->where("id_login",$id_login);
        $result = $this->db->get($table);
        return $result;
    }

    public function input_data($table, $data){
        return $this->db->insert($table, $data);
    }

    function update_data($id,$table,$where,$data){
        $this->db->where($id,$where);
        $this->db->update($table,$data);
        return true;
    }

    function delete_data($table, $where)
    {
        $this->db->where('id_login', $where);
        $this->db->delete($table);
    }
}
?>