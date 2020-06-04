<?php

class Makanan_model extends CI_model
{

    public function getMakananById($id_menu)
    {
        return $this->db->get_where('tbl_menu', ['id_menu' => $id_menu])->row_array();
    }

    public function ubahDataMakanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function ambil_id_gambar($id_menu)
    {
        $this->db->from('tbl_menu');
        $this->db->where('id_menu', $id_menu);
        $result = $this->db->get('');
        // periksa ada datanya atau tidak
        if ($result->num_rows() > 0) {
            return $result->row(); //ambil datanya berdasrka row id
        }
    }
    public function delete_users($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('tbl_menu');
        return TRUE;
    }
}
