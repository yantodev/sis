<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->order_by("id", "ASC");
        return $this->db->get();
    }

    public function getJurusan()
    {
        $this->db->select("*");
        $this->db->from("tbl_jurusan");
        $this->db->order_by("id", "ASC");
        return $this->db->get();
    }
}
