<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function Jurusan()
    {
        return $this->db->get_where('tbl_jurusan')->result_array();
    }

    function Iduka($singkatan_jurusan)
    {
        $this->db->where('jurusan', $singkatan_jurusan);
        $result = $this->db->get('tbl_iduka')->result();
        return $result;
    }
    function alamatIduka($nama_instansi)
    {
        $this->db->where('iduka', $nama_instansi);
        $result = $this->db->get('tbl_iduka')->result();
        return $result;
    }

    // function Tipe_Kendaraan($id_merk)
    // {
    //     $this->db->where('id_merk_kendaraan', $id_merk);
    //     $this->db->order_by('id_tipe_kendaraan', 'ASC');
    //     return $this->db->from('tipe_kendaraan')
    //         ->get()
    //         ->result();
    // }
}
