<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data['laporan'] = $this->db->query("SELECT tbl_pembayaran.id_pembayaran,SUM(IF(YEAR(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_tahun,(YEAR(tgl_pembayaran)) AS tahun, SUM(IF(MONTH(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_bulan,(MONTH(tgl_pembayaran)) AS bulan, SUM(IF(DAY(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_hari,(DAY(tgl_pembayaran)) AS tanggal FROM tbl_pembayaran INNER JOIN tbl_menu WHERE tbl_pembayaran.id_menu=tbl_menu.id_menu GROUP BY YEAR(tgl_pembayaran)")->result_array();


            $data['title'] = 'Canteent';
            $this->load->view('template/header', $data);
            $this->load->view('template/aside');
            $this->load->view("laporan/lapor");
            $this->load->view('template/footer');
        }
    }

    public function cetak($tahun)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $pdf = new FPDF('l', 'mm', 'A5');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 16);
            // mencetak string 
            $pdf->Cell(190, 7, 'Laporan Pendapatan ', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(190, 7, $tahun, 0, 1, 'C');
            $pdf->Cell(190, 7, '', 0, 1, 'C');
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 6, 'Bulan', 1,);
            $pdf->Cell(85, 6, 'Total Pendapatan', 1, 1);
            $pdf->SetFont('Arial', '', 10);
            $mahasiswa = $this->db->query("SELECT tbl_pembayaran.id_pembayaran,SUM(IF(YEAR(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_tahun,(YEAR(tgl_pembayaran)) AS tahun, SUM(IF(MONTH(tgl_pembayaran),(tbl_menu.harga*qty),0)) AS pendapatan_bulan,(MONTH(tgl_pembayaran)) AS bulan FROM tbl_pembayaran INNER JOIN tbl_menu WHERE tbl_pembayaran.id_menu=tbl_menu.id_menu AND Year(tgl_pembayaran) = $tahun GROUP BY YEAR(tgl_pembayaran) ")->result();
            foreach ($mahasiswa as $row) {
                $pdf->Cell(20, 6,  $row->bulan, 1, 0);
                $pdf->Cell(85, 6, 'Rp.' . number_format($row->pendapatan_bulan), 1, 1);
            }
            $pdf->Output();
        }
    }
}
