<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengeluaran_model');
    }

    public function index()
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            $data['data'] = $this->Pengeluaran_model->tampil_data()->result();
            $this->load->view('menu/pengeluaran/pengeluaran_list', $data);
        }
    }

    public function laporan($type)
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            redirect(site_url().'/Auth/login');
        }else{
            if ($type == "minggu"){
                $data['data'] = $this->Pengeluaran_model->tampil_perminggu()->result();
            }
            elseif ($type == "bulan"){
                $data['data'] = $this->Pengeluaran_model->tampil_perbulan()->result();
            }
            else{
                $data['data'] = $this->Pengeluaran_model->tampil_perhari()->result();
            }

            foreach ($data['data'] as $row) {
                $data['labels'][] = $row->waktu;
                $data['datas'][] = $row->total;
            }

            $this->load->view('menu/pengeluaran/pengeluaran_laporan', $data);
        }
    }

    public function insert()
    {
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $jumlah             = $this->input->post('jumlah');
        $tanggal_pembelian  = $this->input->post('tanggal_pembelian');

        $data = array(
            'nama_pengeluaran'  => $nama_pengeluaran,
            'jumlah'            => $jumlah,
            'tanggal_pembelian' => $tanggal_pembelian
        );

        $this->Pengeluaran_model->input_data('pengeluaran', $data);
        $this->session->set_flashdata('msg', 'Berhasil disimpan!');

        redirect(site_url().'/Pengeluaran');
    }

    public function update()
    {
        $id_pengeluaran     = $this->input->post('id_pengeluaran');
        $nama_pengeluaran   = $this->input->post('nama_pengeluaran');
        $jumlah             = $this->input->post('jumlah');
        $tanggal_pembelian  = $this->input->post('tanggal_pembelian');

        $data = array(
            'id_pengeluaran'    => $id_pengeluaran,
            'nama_pengeluaran'  => $nama_pengeluaran,
            'jumlah'            => $jumlah,
            'tanggal_pembelian' => $tanggal_pembelian
        );
        $this->Pengeluaran_model->update_data('pengeluaran', $id_pengeluaran, $data);
        $this->session->set_flashdata('msg', 'Berhasil diupdate!');

        redirect(site_url().'/Pengeluaran');
    }

    public function delete($id)
    {
        $this->Pengeluaran_model->delete_data('pengeluaran', $id);
        $this->session->set_flashdata('msg', 'Berhasil dihapus!');

        echo site_url('/Pengeluaran');
    }
}