<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $data['bayar'] =  $this->db->query("select *from tbl_pembayaran,tbl_menu where tbl_pembayaran.id_menu=tbl_menu.id_menu")->result_array();

            //         $data['bayar'] = $this->db->query("SELECT nama_customer,qty,npm_pelanggan,(tbl_menu.nama_menu) AS nama_pesanan,SUM((tbl_menu.harga*qty)) AS total_harga,tgl_pembayaran,status FROM tbl_pembayaran INNER JOIN tbl_menu WHERE tbl_pembayaran.id_menu=tbl_menu.id_menu GROUP BY nama_pesanan
            // ")->result_array();

            $data['title'] = 'Canteent';

            $this->load->view('template/header', $data);
            $this->load->view('template/aside', $data);
            $this->load->view('pembayaran/bayar', $data);
            $this->load->view('template/footer');
            $banyak = $this->input->post('banyak');

            for ($i = 0; $i <= $banyak; $i++) {

                $rowid = $this->input->post('rowid' . $i);
                $nama_customer = $this->input->post('nama_customer' . $i);
                $npm_pelanggan = $this->input->post('npm_pelanggan' . $i);
                $qty = $this->input->post('qty' . $i);
                $id_menu = $this->input->post('id_menu' . $i);

                if (isset($_POST['pilih' . $i])) {
                    $data = [
                        'tgl_pembayaran' => date('Y-m-d'),
                        'status' => 'lunas',
                        'nama_customer' => $nama_customer,
                        'npm_pelanggan' => $npm_pelanggan,
                        'qty' => $qty,
                        'id_menu' => $id_menu,
                    ];
                    $this->db->insert('tbl_pembayaran', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Masuk</div>');
                    $this->cart->remove($rowid);
                }
            }
            //redirect('pembayaran/');
        }
    }
}
