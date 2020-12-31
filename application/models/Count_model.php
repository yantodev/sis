<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Count_model extends CI_Model
{
    public function CountP($jurusan, $tp)
    {
        $sql = "SELECT  count(if(jurusan='$jurusan' and tp='$tp' and pernyataan='', jurusan, NULL)) as belum_buat,
                        count(if(jurusan='$jurusan' and tp='$tp' and pernyataan='Setuju', jurusan, NULL)) as setuju,
                        count(if(jurusan='$jurusan' and tp='$tp' and pernyataan='Tidak Setuju', jurusan, NULL)) as tidak_setuju
                FROM master";
        $result = $this->db->query($sql);
        return $result->row();
    }
}
