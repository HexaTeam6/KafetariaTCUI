<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['kategori'] = $this->Kategori_model->listKategori()->result();
            $data['data'] = $this->Menu_model->tampil_data()->result();
            $this->load->view('menu/menu/menu_list', $data);
        }
    }

    public function insert()
    {
        $id_kategori    = $this->input->post('id_kategori');
        $id_penjual     = $_SESSION['id_penjual'];
        $nama_menu      = $this->input->post('nama_menu');
        $harga_menu     = $this->input->post('harga_menu');
        $stok           = $this->input->post('stok');

        $data = array(
            'id_kategori'   => $id_kategori,
            'id_penjual'    => $id_penjual,
            'nama_menu'     => $nama_menu,
            'harga_menu'    => $harga_menu,
            'stok'          => $stok
        );

        $this->Menu_model->input_data('menu', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Menu');
    }

    public function update()
    {
        $id_menu        = $this->input->post('id_menu');
        $id_kategori    = $this->input->post('id_kategori');
        $id_penjual     = $_SESSION['id_penjual'];
        $nama_menu      = $this->input->post('nama_menu');
        $harga_menu     = $this->input->post('harga_menu');
        $stok           = $this->input->post('stok');

        $data = array(
            'id_kategori'   => $id_kategori,
            'id_penjual'    => $id_penjual,
            'nama_menu'     => $nama_menu,
            'harga_menu'    => $harga_menu,
            'stok'          => $stok
        );

        $this->Menu_model->update_data('menu', $id_menu, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Menu');
    }

    public function delete($id)
    {
        $this->Menu_model->delete_data('menu', $id);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Menu');
    }
}