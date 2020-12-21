<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['data'] = $this->Kategori_model->tampil_data()->result();
            $this->load->view('menu/kategori/kategori_list', $data);
        }
    }

    public function insert()
    {
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $nama_kategori
        );

        $this->Kategori_model->input_data('kategori', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Kategori');
    }

    public function update()
    {
        $id_kategori   = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $nama_kategori
        );

        $this->Kategori_model->update_data('kategori', $id_kategori, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Kategori');
    }

    public function delete($id)
    {
        $this->Kategori_model->delete_data('kategori', $id);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Kategori');
    }
}