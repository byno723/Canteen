<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Makanan_model');
        $this->load->model('Kode_m');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }



    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $data['makanan'] = $this->db->query("SELECT * FROM tbl_menu")->result_array();
            $this->form_validation->set_rules('id_menu', 'id_menu', 'required');
            $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
            $this->form_validation->set_rules('harga', 'harga', 'required|numeric');

            if ($this->form_validation->run() ==  false) {
                $data['title'] = 'Canteent';
                $this->load->view('template/header', $data);
                $this->load->view('template/aside');
                $this->load->view("daftarmenu/makanan", $data);
                $this->load->view('template/footer');
            } else {

                $data = [
                    'id_menu' => htmlspecialchars($this->input->post('id_menu')),
                    'nama_menu' => htmlspecialchars($this->input->post('nama_menu')),
                    'harga' => htmlspecialchars($this->input->post('harga')),
                    'kategori' => htmlspecialchars($this->input->post('kategori'))

                ];

                // cek jika ada gambar yang akan diupload
                $upload_image = $_FILES['berkas']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|png|';
                    $config['max_size']      = '2048';
                    $config['upload_path'] = './assets/img/makanan/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('berkas')) {
                        $old_image = $data['makanan']['gambar'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/img/makanan/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->insert('tbl_menu', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Makanan Telah Berhasil DiTambahkan</div>');
                redirect('menu/');
            }
        }
    }

    public function detailmakanan($id_menu = '')
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            if ($id_menu) {

                $data['title'] = 'Canteent';
                $data['makanan'] = $this->Makanan_model->getMakananById($id_menu);
                $this->load->view('template/header', $data);
                $this->load->view('template/aside');
                $this->load->view("daftarmenu/editmakanan", $data);
                $this->load->view('template/footer');
            } else {
                $this->load->view('error/error');
            }
        }
    }


    public function editmakanan()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $id_menu = htmlspecialchars($this->input->post('id_menu'));
            $nama_menu = htmlspecialchars($this->input->post('nama_menu'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $kategori = htmlspecialchars($this->input->post('kategori'));

            $gambar = $this->input->post('berkas');

            $data = array(
                'id_menu' => $id_menu,
                'nama_menu' => $nama_menu,
                'harga' => $harga,
                'kategori' => $kategori,


            );
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['berkas']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/makanan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('berkas')) {
                    $old_image = $data['makanan']['gambar'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/makanan/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $where = array(
                'id_menu' => $id_menu
            );
            $this->Makanan_model->ubahDataMakanan($where, $data, 'tbl_menu');
            $this->session->set_flashdata('success', 'Berhasil diubah...!');
            redirect('menu');
        }
    }

    public function hapusmakanan($id_menu)
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {
            $data = $this->Makanan_model->ambil_id_gambar($id_menu);
            // lokasi gambar berada
            $path = './assets/img/makanan/';
            @unlink($path . $data->gambar); // hapus data di folder dimana data tersimpan
            if ($this->Makanan_model->delete_users($id_menu) == TRUE) {
                // TAMPILKAN PESAN JIKA BERHASIL
                $this->session->set_flashdata('flash', 'Makanan Dihapus');
            }
            redirect('menu/');

            // $this->session->set_flashdata('flash', 'Makanan Dihapus');
            // $this->db->delete('tbl_menu', ['id_menu' => $id_menu]);

            // redirect('menu/');
        }
    }

    public function promo()
    {
        if ($this->session->userdata('status') != "login") {
            redirect("auth");
        } else {

            $data['promo'] = $this->db->query("SELECT * FROM promo")->result_array();
            $data['title'] = 'Canteent';
            $this->load->view('template/header', $data);
            $this->load->view('template/aside');
            $this->load->view("pesan/promo", $data);
            $this->load->view('template/footer');
        }
    }
}
