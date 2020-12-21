<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
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

        $query = $this->User_model->getLogin($username, $password);

        if (count($query->result())>0){
            foreach ($query->result() as $row)
            {
                $this->session->set_userdata("id_login",$row->id_login);
                $this->session->set_userdata("nama",$row->nama);
                $this->session->set_userdata("username",$row->username);
                $this->session->set_userdata("role",$row->role);
                if ($row->role == "U"){
                    $data = $this->User_model->getUserData("pembeli", $row->id_login)->row();
                    $this->session->set_userdata("id_pembeli",$data->id_pembeli);
                    $this->session->set_userdata("email_pembeli",$data->email_pembeli);
                    $this->session->set_userdata("telp_pembeli",$data->telp_pembeli);
                }
                else if ($row->role == "P"){
                    $data = $this->User_model->getUserData("penjual", $row->id_login)->row();
                    $this->session->set_userdata("id_penjual",$data->id_penjual);
                    $this->session->set_userdata("alamat_penjual",$data->alamat_penjual);
                    $this->session->set_userdata("telp_penjual",$data->telp_penjual);
                    $this->session->set_userdata("jenis_kelamin",$data->jenis_kelamin);
                }
                else if ($row->role == "K"){
                    $data = $this->User_model->getUserData("kasir", $row->id_login)->row();
                    $this->session->set_userdata("id_kasir",$data->id_kasir);
                    $this->session->set_userdata("alamat_kasir",$data->alamat_kasir);
                    $this->session->set_userdata("telp_kasir",$data->telp_kasir);
                    $this->session->set_userdata("jenis_kelamin",$data->jenis_kelamin);
                }
            }
        }else{
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
