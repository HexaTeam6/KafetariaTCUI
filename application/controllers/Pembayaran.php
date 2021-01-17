<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $this->load->view('menu/pembayaran/pembayaran_list');
        }
    }

    public function hapus(){
        unset($_SESSION['cart']);
        echo site_url().'/Home';
    }
}