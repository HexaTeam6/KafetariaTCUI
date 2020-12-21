<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Menu_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['data'] = $this->Menu_model->tampil_data()->result();
            $this->load->view('home', $data);
        }
    }

    public function addToCart(){
        $id_menu        = $this->input->post('id_menu');
        $nama_menu      = $this->input->post('nama_menu');
        $harga_menu     = $this->input->post('harga_menu');
        $kategori       = $this->input->post('kategori');
        $jumlah_beli    = $this->input->post('jumlah_beli');

        $data = array(
            'id_menu'       => $id_menu,
            'nama_menu'     => $nama_menu,
            'harga_menu'    => $harga_menu,
            'kategori'      => $kategori,
            'jumlah_beli'   => $jumlah_beli,
        );

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        array_push($cart, $data);
        $this->session->set_userdata('cart', $cart);

        redirect(site_url().'/Home');
    }
}