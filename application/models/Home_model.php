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

    function hpPendamping($guru_pendamping)
    {
        $this->db->where('nama', $guru_pendamping);
        $result = $this->db->get('tbl_guru')->result();
        return $result;
    }
}
