<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
{
    private $_batchImport;

    function getDataSekolah()
    {
        $this->db->where('id', 1);
        $result = $this->db->get('master_sekolah')->row_array();
        return $result;
    }

    function getMasterData($nisn)
    {
        $this->db->where('nisn', $nisn);
        $result = $this->db->get('master_sertifikat')->row_array();
        return $result;
    }

    function getDataAssessor($kelas)
    {
        $this->db->where('kelas', $kelas);
        $result = $this->db->get('master_asesor')->row_array();
        return $result;
    }

    function getJurusan($kelas)
    {
        switch ($kelas) {
            case 'TKRO':
                return 'Teknik Kendaraan Ringan Otomotif';
                break;
            case 'TBSM':
                return 'Teknik dan Bisnis Sepeda Motor';
                break;
            case 'AKL':
                return 'Akuntansi dan Keuangan Lembaga';
                break;
            case 'OTKP':
                return 'Otomatisasi Tata Kelola Perkantoran';
                break;
            case 'BDP':
                return 'Bisnis Daring dan Pemasaran';
                break;
            default:
                break;
        }
    }
    function getDataAsesor($kelas)
    {
        $this->db->where('kelas', $kelas);
        $result = $this->db->get('master_assessor')->row_array();
        return $result;
    }

    function getDataSertifikat($kelas)
    {
        $this->db->where('kelas', $kelas);
        $result = $this->db->get('master_sertifikat')->result_array();
        return $result;
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('master_sertifikat', $data);
        if ($insert) {
            return true;
        }
    }

    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('master_sertifikat', $data);
    }

    public function getNilai($kelas)
    {
        $this->db->where('kelas', $kelas);
        $result = $this->db->get('master_sertifikat')->result_array();
        return $result;
    }
}
