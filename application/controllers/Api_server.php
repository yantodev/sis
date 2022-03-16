<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_server extends CI_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('Api_model');
    }
     /**
    * Get All Data
    */
    public function getUser()
    {
        $siswa = $this->Api_model->get_all();
        $response = array();
        
        foreach($siswa->result() as $hasil) {
            $response[] = array(
                'id' => $hasil->id,
                'name' => $hasil->name,
                'email'     => $hasil->email,        
                'password'     => $hasil->password,    
                'role_id' => $hasil->role_id,    
            );
        }
        
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data Siswa',
                'data'    => $response  
            )
        );
    }

    public function getJurusan()
    {
        $data = $this->Api_model->getJurusan();
        $response = array();

        foreach ($data->result() as $hasil) {
            $response[] = array(
                'id' => $hasil->id,
                'jurusan' => $hasil->jurusan,
            );
        }
        
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data Siswa',
                'data'    => $response  
            )
        );
    }
}