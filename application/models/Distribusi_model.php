<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_model extends CI_Model
{
    function BidangPekerjaan($jurusan)
    {
        $this->db->where('jurusan', $jurusan);
        $result = $this->db->get('tbl_bantu_kegiatan')->result();
        return $result;
    }
    function sub_1($bidang_pekerjaan, $jurusan)
    {
        // return $this->db->get_where('tbl_kegiatan', ['bidang_pekerjaan' => $bidang_pekerjaan, 'jurusan' => $jurusan])->result_array();
        $this->db->where('bidang_pekerjaan', $bidang_pekerjaan, 'jurusan', $jurusan);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }
    function sub_2($sub_1, $jurusan)
    {
        $this->db->where('sub_1', $sub_1, 'jurusan', $jurusan);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }
    function sub_3($sub_2, $jurusan)
    {
        $this->db->where('sub_2', $sub_2, 'jurusan', $jurusan);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }
    function sub_4($sub_3, $jurusan)
    {
        $this->db->where('sub_3', $sub_3, 'jurusan', $jurusan);
        $result = $this->db->get('tbl_kegiatan')->result();
        return $result;
    }
    function menu($menu)
    {
        $this->db->where('jurusan', $menu);
        $result = $this->db->get('helper')->result();
        return $result;
    }
}
