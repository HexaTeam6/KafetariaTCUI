<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('pages/homepage');
    }

    public function masuk()
    {
//        echo !isset($_SESSION['username']);
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $this->load->view('pages/masuk');
        }
    }

    public function login()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
        }else{
            $username = $this->input->post("username");
            $password = $this->input->post("password");
        }

        if($username == "admin"){
            $this->session->set_userdata("username", "admin");
            $this->session->set_userdata("password", $password);
            $this->session->set_userdata("hak_akses", "admin");
            $this->session->set_userdata("name", "Administrator");
        }
        else if($username == "user"){
            $this->session->set_userdata("username", "user");
            $this->session->set_userdata("password", $password);
            $this->session->set_userdata("hak_akses", "user");
            $this->session->set_userdata("name", "Anggun");
        }
        else if($username == "penjual"){
            $this->session->set_userdata("username", "penjual");
            $this->session->set_userdata("password", $password);
            $this->session->set_userdata("hak_akses", "penjual");
            $this->session->set_userdata("name", "Musdhalifah");
        }
        else if($username == "kasir"){
            $this->session->set_userdata("username", "kasir");
            $this->session->set_userdata("password", $password);
            $this->session->set_userdata("hak_akses", "kasir");
            $this->session->set_userdata("name", "Wahyuni");
        }
        else{
            redirect(site_url().'/Auth/masuk');
        }

        redirect(site_url().'/Home');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'/Auth/masuk');
    }
}
