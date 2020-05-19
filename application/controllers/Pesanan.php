<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
            $this->load->view('menu/pesanan/pesanan_list');
        }
    }
}