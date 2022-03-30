<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Distribusi_model');
    }
    public function listBidangPekerjaan()
    {
        $jurusan = $this->input->get('jurusan');
        $data = $this->Distribusi_model->BidangPekerjaan($jurusan);
        $lists = "<option value=''>Pilih Bidang Pekerjaan</option>";
        foreach ($data as $data) {
            $lists .= "<option value='" . $data->nama . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('list_iduka' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function sub_1()
    {
        $jurusan = $this->input->get('jurusan');
        $bidang_pekerjaan = $this->input->get('bidang_pekerjaan');
        $data = $this->Distribusi_model->sub_1($bidang_pekerjaan, $jurusan);
        $lists = "<option value=''>Pilih Sub Menu</option>";
        foreach ($data as $data) {
            $lists .= "<option value='" . $data->sub_1 . "'>" . $data->sub_1 . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('sub_1' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function sub_2()
    {
        $jurusan = $this->input->get('jurusan');
        $sub_1 = $this->input->get('sub_1');
        $data = $this->Distribusi_model->sub_2($sub_1, $jurusan);
        $lists = "<option value=''>Pilih Sub</option>";
        foreach ($data as $data) {
            $lists .= "<option value='" . $data->sub_2 . "'>" . $data->sub_2 . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('sub_2' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function sub_3()
    {
        $jurusan = $this->input->get('jurusan');
        $sub_2 = $this->input->get('sub_2');
        $data = $this->Distribusi_model->sub_3($sub_2, $jurusan);
        // $lists = "<option value=''>Pilih</option>";
        foreach ($data as $data) {
            $lists = "<option value='" . $data->sub_3 . "'>" . $data->sub_3 . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('sub_3' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function sub_4()
    {
        $jurusan = $this->input->get('jurusan');
        $sub_3 = $this->input->get('sub_3');
        $data = $this->Distribusi_model->sub_4($sub_3, $jurusan);
        // $lists = "<option value=''>Pilih</option>";
        foreach ($data as $data) {
            $lists = "<option value='" . $data->sub_4 . "'>" . $data->sub_4 . "</option>";
        }
        $callback = array('sub_4' => $lists);
        echo json_encode($callback);
    }
    public function Menu()
    {
        $menu = $this->input->get('jurusan');
        $data = $this->Distribusi_model->menu($menu);
        // $lists = "<textarea name='laporan2' id='laporan2'></textarea>";
        foreach ($data as $data) {
            $lists = "<textarea name='" . $data->nama . "' id='" . $data->id . "'></textarea>";
        }
        $callback = array('textarea' => $lists);
        echo json_encode($callback);
    }
}
