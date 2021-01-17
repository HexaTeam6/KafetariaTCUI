<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendapatan_model');
    }

    public function index($type)
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            if ($type == "minggu"){
                $data['data'] = $this->Pendapatan_model->tampil_perminggu()->result();
            }
            elseif ($type == "bulan"){
                $data['data'] = $this->Pendapatan_model->tampil_perbulan()->result();
            }
            else{
                $data['data'] = $this->Pendapatan_model->tampil_perhari()->result();
            }

            foreach ($data['data'] as $row) {
                $data['labels'][] = $row->waktu;
                $data['datas'][] = $row->total;
            }

            $this->load->view('menu/pendapatan/pendapatan_list', $data);
        }
    }
}