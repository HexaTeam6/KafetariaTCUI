<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Penjual_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['data'] = $this->Penjual_model->tampil_data()->result();
            $this->load->view('menu/penjual/penjual_list', $data);
        }
    }

    public function insert()
    {
        $username       = trim($this->input->post('username'));
        $password       = trim($this->input->post('password'));
        $nama_penjual   = trim($this->input->post('nama_penjual'));
        $telp_penjual   = trim($this->input->post('telp_penjual'));
        $alamat_penjual = trim($this->input->post('alamat_penjual'));
        $jenis_kelamin  = trim($this->input->post('jenis_kelamin'));

        $data = array(
            'nama'      => $nama_penjual,
            'username'  => $username,
            'password'  => md5($password),
            'role'      => "P"
        );

        $this->Penjual_model->input_data('login', $data);

        $result = $this->User_model->getLogin($username, $password)->row();

        $data = array(
            'id_login'          => $result->id_login,
            'nama_penjual'      => $nama_penjual,
            'telp_penjual'      => $telp_penjual,
            'alamat_penjual'    => $alamat_penjual,
            'jenis_kelamin'     => $jenis_kelamin,
        );

        $this->Penjual_model->input_data('penjual', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Penjual');
    }

    public function update()
    {
        $id_penjual     = trim($this->input->post('id_penjual'));
        $id_login       = trim($this->input->post('id_login'));
        $username       = trim($this->input->post('username'));
        $nama_penjual   = trim($this->input->post('nama_penjual'));
        $telp_penjual   = trim($this->input->post('telp_penjual'));
        $alamat_penjual = trim($this->input->post('alamat_penjual'));
        $jenis_kelamin  = trim($this->input->post('jenis_kelamin'));

        if ($this->input->post('password') != ""){
            $password       = md5(trim($this->input->post('password')));
            $data = array(
                'nama'      => $nama_penjual,
                'username'  => $username,
                'password'  => $password,
            );
        }
        else{
            $data = array(
                'nama'      => $nama_penjual,
                'username'  => $username,
            );
        }

        $this->User_model->update_data('id_login', 'login', $id_login, $data);

        $data = array(
            'nama_penjual'      => $nama_penjual,
            'telp_penjual'      => $telp_penjual,
            'alamat_penjual'    => $alamat_penjual,
            'jenis_kelamin'     => $jenis_kelamin,
        );

        $this->Penjual_model->update_data('penjual', $id_penjual, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Penjual');
    }

    public function delete($id, $id_login)
    {
        $this->User_model->delete_data('login', $id_login);
        $this->Penjual_model->delete_data('penjual', $id);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Penjual');
    }
}