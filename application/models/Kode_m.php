
<?php
class Kode_m extends CI_Model
{


    public function kode()
    {
        $this->db->select('RIGHT(tbl_menu.id_menu,2) as id_menu', FALSE);
        $this->db->order_by('id_menu', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_menu');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_menu) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "1M" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }
    public function kodekeranjang()
    {

        $query =  $this->cart->contents();  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->count($this->cart->contents()) <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "1M" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }
}
