<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Kasir_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['data'] = $this->Kasir_model->tampil_data()->result();
            $this->load->view('menu/kasir/kasir_list', $data);
        }
    }

    public function insert()
    {
        $username       = trim($this->input->post('username'));
        $password       = trim($this->input->post('password'));
        $nama_kasir     = trim($this->input->post('nama_kasir'));
        $telp_kasir     = trim($this->input->post('telp_kasir'));
        $alamat_kasir   = trim($this->input->post('alamat_kasir'));
        $jenis_kelamin  = trim($this->input->post('jenis_kelamin'));

        $data = array(
            'nama'      => $nama_kasir,
            'username'  => $username,
            'password'  => md5($password),
            'role'      => "K"
        );

        $this->Kasir_model->input_data('login', $data);

        $result = $this->User_model->getLogin($username, $password)->row();

        $data = array(
            'id_login'        => $result->id_login,
            'nama_kasir'      => $nama_kasir,
            'telp_kasir'      => $telp_kasir,
            'alamat_kasir'    => $alamat_kasir,
            'jenis_kelamin'   => $jenis_kelamin,
        );

        $this->Kasir_model->input_data('kasir', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Kasir');
    }

    public function update()
    {
        $id_kasir       = trim($this->input->post('id_kasir'));
        $id_login       = trim($this->input->post('id_login'));
        $username       = trim($this->input->post('username'));
        $nama_kasir     = trim($this->input->post('nama_kasir'));
        $telp_kasir     = trim($this->input->post('telp_kasir'));
        $alamat_kasir   = trim($this->input->post('alamat_kasir'));
        $jenis_kelamin  = trim($this->input->post('jenis_kelamin'));

        if ($this->input->post('password') != ""){
            $password       = md5(trim($this->input->post('password')));
            $data = array(
                'nama'      => $nama_kasir,
                'username'  => $username,
                'password'  => $password,
            );
        }
        else{
            $data = array(
                'nama'      => $nama_kasir,
                'username'  => $username,
            );
        }

        $this->User_model->update_data('id_login', 'login', $id_login, $data);

        $data = array(
            'nama_kasir'      => $nama_kasir,
            'telp_kasir'      => $telp_kasir,
            'alamat_kasir'    => $alamat_kasir,
            'jenis_kelamin'   => $jenis_kelamin,
        );

        $this->Kasir_model->update_data('kasir', $id_kasir, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Kasir');
    }

    public function delete($id, $id_login)
    {
        $this->User_model->delete_data('login', $id_login);
        $this->Kasir_model->delete_data('kasir', $id);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Kasir');
    }
}