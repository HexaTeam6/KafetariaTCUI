<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            if ($_SESSION['role'] == 'U'){
                $data['data'] = $this->Pesanan_model->pesananByIdPembeli($_SESSION['id_pembeli'])->result();
            }
            elseif ($_SESSION['role'] == 'K'){
                $data['data'] = $this->Pesanan_model->tampil_data()->result();
            }
            elseif ($_SESSION['role'] == 'P'){
                $data['data'] = $this->Pesanan_model->pesanan_menuggu()->result();
            }
            $this->load->view('menu/pesanan/pesanan_list', $data);
        }
    }

    public function insert(){
        $id_pesan       = $this->input->post('id_pesan');
        $jenis_bayar    = $this->input->post('jenis_bayar');
        $total_bayar    = $this->input->post('total_bayar');

        $data = array(
            'id_pesanan'        => $id_pesan,
            'id_pembeli'        => $_SESSION['id_pembeli'],
            'status_pesanan'    => 1,
            'total_bayar'       => $total_bayar,
            'jenis_bayar'       => $jenis_bayar
        );

        $detail_data = array();

        foreach ($_SESSION['cart'] as $row){
            $tmp['id_pesanan']  = $id_pesan;
            $tmp['id_menu']     = $row['id_menu'];
            $tmp['jumlah_beli'] = $row['jumlah_beli'];
            $tmp['total_bayar'] = $row['jumlah_beli'] * $row['harga_menu'];

            array_push($detail_data, $tmp);
        }

        $this->Pesanan_model->input_data('pesanan', $data);
        $this->db->insert_batch('pesanan_detail', $detail_data);
        $this->session->set_flashdata('msg', 'Pembelian Berhasil!');

        unset($_SESSION['cart']);

        redirect(site_url().'/Pesanan');
    }

    public function updateStatus(){
        $id_pesan   = $this->input->post('id_pesanan');
        $status     = $this->input->post('status');

        $data = array(
            'id_pesanan'        => $id_pesan,
            'status_pesanan'    => $status
        );

        $this->Pesanan_model->update_data('pesanan', $id_pesan, $data);
        $this->session->set_flashdata('msg', 'Status berhasil diubah!');

        redirect(site_url().'/Pesanan');
    }
}