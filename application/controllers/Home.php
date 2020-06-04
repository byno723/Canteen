<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
    }
   

    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['hari'] = $this->db->query("SELECT SUM(IF(DAY(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_hari, (DAY(tgl_pembayaran)) AS hari FROM tbl_pembayaran INNER JOIN tbl_menu WHERE tbl_pembayaran.id_menu=tbl_menu.id_menu AND tgl_pembayaran=CURDATE() GROUP BY YEAR(tgl_pembayaran),MONTH(tgl_pembayaran),DAY(tgl_pembayaran)")->result_array();

            // var_dump($hari);
            // die;
            $data['title'] = 'Canteent';
            $this->load->view('template/header', $data);
            $this->load->view('template/aside');
            $this->load->view("home/index", $data);
            $this->load->view('template/footer');
        }
    }
}
