<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Makanan_model');
        $this->load->model('Kode_m');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function pesan()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $banyak = $this->input->post('banyak');
            $banyak2 = $this->input->post('banyakk');


            if (isset($_POST['pilih2'])) {
                for ($i = 1; $i <= $banyak2; $i++) {
                    $id = date('dmYHis');
                    $id_menu = $this->input->post('id_menu' . $i);
                    $price = $this->input->post('price' . $i);
                    $name = $this->input->post('name' . $i);
                    $nama_pelanggan = $this->input->post('nama_pelanggan' . $i);
                    $npm = $this->input->post('npm' . $i);
                    $qty = $this->input->post('qty' . $i);
                    $status = 'Belum Diantar';
                    //echo $nama_pelanggan;

                    $data = array(
                        'id'      => $id,
                        'id_menu' => $id_menu,
                        'price'   => $price,
                        'name'    => $name,
                        'nama_pelanggan'    => $nama_pelanggan,
                        'npm'    => $npm,
                        'qty'    => $qty,
                        'status'    => $status,
                    );
                    $this->cart->insert($data);
                }
                redirect('pemesanan/');
            } else if (isset($_POST['pilih1'])) {
                // echo date('dmYHis');
                for ($i = 1; $i <= $banyak; $i++) {

                    $id = date('dmYHis');
                    $id_menu = $this->input->post('id_menu' . $i);
                    $price = $this->input->post('price' . $i);
                    $name = $this->input->post('name' . $i);
                    $nama_pelanggan = $this->input->post('nama_pelanggan' . $i);
                    $npm = $this->input->post('npm' . $i);
                    $qty = $this->input->post('qty' . $i);
                    $status = 'Belum Diantar';

                    // echo $nama_pelanggan;

                    $data = array(
                        'id'      => $id,
                        'id_menu' => $id_menu,
                        'price'   => $price,
                        'name'    => $name,
                        'nama_pelanggan'    => $nama_pelanggan,
                        'npm'    => $npm,
                        'qty'    => $qty,
                        'status'    => $status,
                    );
                    $this->cart->insert($data);
                }
                redirect('pemesanan');
            }

            // echo $banyak;
            // echo date('dmYHis');

        }
    }






    public function edit($rowid)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data = array(
                'rowid' => $rowid,
                'status'   => 'Sudah Diantar'
            );

            $this->cart->update($data);
            redirect('pemesanan/');
        }
    }


    public function hapus($rowid = '')
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            if ($rowid) {
                $this->cart->remove($rowid);
                $this->session->set_flashdata('Sukses', 'Data Keranjang Telah Dihapus');
                redirect('pemesanan/');
            } else {
                $this->cart->destroy();
                $this->session->set_flashdata('Sukses', 'Semua Data Keranjang Telah Dihapus');
                redirect('pemesanan/');
            }
        }
    }

    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['makanan'] = $this->db->query("SELECT * FROM tbl_menu WHERE kategori='Makanan'")->result_array();
            $data['minuman'] = $this->db->query("SELECT * FROM tbl_menu WHERE kategori ='Minuman'")->result_array();
            $data['title'] = 'Canteent';
            $this->load->view('template/header', $data);
            $this->load->view('template/aside');
            $this->load->view('pesan/menu');
            $this->load->view('template/footer');
        }
    }
}
