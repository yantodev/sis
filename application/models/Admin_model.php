<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getExport($jurusan, $tp)
    {
        $this->db->order_by('nama_instansi', 'ASC');
        return $this->db->get_where('master', ['jurusan' => $jurusan, 'tp' => $tp])->result_array();
    }

    public function getNilai($kelas, $tp)
    {
        $this->db->order_by('nis', 'ASC');
        return $this->db->get_where('master', ['kelas' => $kelas, 'tp' => $tp])->result_array();
    }

    public function getDataNilai($jurusan)
    {
        return $this->db->get_where('tbl_nilai', ['jurusan' => $jurusan])->result_array();
    }
    public function Rekap($tp)
    {
        $this->db->order_by('jurusan', 'ASC');
        return $this->db->get_where('master', ['tp' => $tp])->result_array();
    }

    public function CountSiswa()
    {
        $sql = "SELECT  count(if(tp='2021/2022', tp, NULL)) as tp,
                        sum(if(tp='2021/2022', tp, NULL)) as jumlah,
                        count(if(jurusan=1 and tp='2021/2022' , jurusan, NULL)) as tkro, 
                        count(if(jurusan=2 and tp='2021/2022' , jurusan, NULL)) as tbsm,
                        count(if(jurusan=3 and tp='2021/2022' , jurusan, NULL)) as akl ,
                        count(if(jurusan=4 and tp='2021/2022' , jurusan, NULL)) as otkp, 
                        count(if(jurusan=5 and tp='2021/2022' , jurusan, NULL)) as bdp,

                        count(if(jurusan=1 and tp='2021/2022' and status='Diterima' , jurusan, NULL)) as bls_tkro, 
                        count(if(jurusan=2 and tp='2021/2022' and status='Diterima' , jurusan, NULL)) as bls_tbsm, 
                        count(if(jurusan=3 and tp='2021/2022' and status='Diterima' , jurusan, NULL)) as bls_akl, 
                        count(if(jurusan=4 and tp='2021/2022' and status='Diterima' , jurusan, NULL)) as bls_otkp, 
                        count(if(jurusan=5 and tp='2021/2022' and status='Diterima' , jurusan, NULL)) as bls_bdp
                FROM master";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function countUser()
    {
        $sql = "SELECT count(if(is_active =0, is_active, null)) as is_active
                FROM user";

        $result = $this->db->query($sql);
        return $result->row();
    }
    public function CountDH()
    {
        $sql = "SELECT  count(if(kegiatan='Koordinasi Tim PKL', kegiatan, NULL)) as kegiatan,
                        count(if(kegiatan='Pembekalan Guru Pembimbing', kegiatan, NULL)) as kegiatan2
                FROM tbl_daftar_hadir";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function getSiswa($jurusan, $tp)
    {
        $this->db->order_by('nama_instansi', 'ASC');
        return $this->db->get_where('master', ['jurusan' => $jurusan, 'tp' => $tp])->result_array();
    }

    public function siswa($nis)
    {
        return $this->db->get_where('master', ['nis' => $nis])->result_array();
    }

    public function idcard($tp, $jurusan)
    {
        return $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan])->result_array();
    }

    public function getJurusan()
    {
        return $this->db->get_where('tbl_jurusan')->result_array();
    }
    public function Guru()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_guru')->result_array();
    }
    public function getGuruby($id)
    {
        return $this->db->get_where('tbl_guru', ['id' => $id])->row_array();
    }
    public function Jurusan()
    {
        $query = "SELECT `master`.*,`tbl_jurusan`.`jurusan`
                    FROM `master` JOIN `tbl_jurusan`
                    ON `master`.`jurusan` = `tbl_jurusan`.`id_jurusan` 
        ";
        return $this->db->query($query)->result_array();
    }
    //tahun pelajaran
    public function getTP()
    {
        return $this->db->get_where('tp')->result_array();
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('master', ['id' => $id])->row_array();
    }

    public function getIduka($jurusan)
    {
        $this->db->order_by('iduka', 'ASC');
        return $this->db->get_where('tbl_iduka', ['jurusan' => $jurusan,])->result_array();
    }

    public function getKajur($kajur)
    {
        return $this->db->get_where('tbl_kajur', ['jurusan' => $kajur])->result_array();
    }

    //IDUKA
    public function addIduka()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'iduka' => htmlspecialchars($this->input->post('iduka', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true))
        ];
        $this->db->insert('tbl_iduka', $data);
    }
    public function getIdukaById($id)
    {
        return $this->db->get_where('tbl_iduka', ['id' => $id])->row_array();
    }

    public function getKelas()
    {
        return $this->db->get_where('tbl_kelas')->result_array();
    }

    public function getKelasByID($id)
    {
        return $this->db->get_where('tbl_kelas', ['id' => $id])->row_array();
    }

    public function getJR($jurusan)
    {
        return $this->db->get_where('tbl_jurusan', ['singkatan_jurusan' => $jurusan])->row_array();
    }
    public function getIdukaByIduka($iduka)
    {
        return $this->db->get_where('master', ['nama_instansi' => $iduka, 'tp' => '2020/2021'])->result_array();
    }
    public function getAlamatIduka($iduka)
    {
        return $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->result_array();
    }
    // public function AlamatIduka($iduka)
    // {
    //     return $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->result_array();
    // }
    public function getIdukaBy($iduka)
    {
        return $this->db->get_where('master', ['nama_instansi' => $iduka])->result_array();
    }
    public function editIduka()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'iduka' => htmlspecialchars($this->input->post('iduka', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'email_website' => htmlspecialchars($this->input->post('email_website', true)),
            'telp_instansi' => htmlspecialchars($this->input->post('telp_instansi', true)),
            'nama_pembimbing_instansi' => htmlspecialchars($this->input->post('nama_pembimbing_instansi', true)),
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'hp_pembimbing' => htmlspecialchars($this->input->post('hp_pembimbing', true)),
            'email_pembimbing' => htmlspecialchars($this->input->post('email_pembimbing', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_iduka', $data);
    }


    public function editSiswa()
    {
        $data = [
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'tp' => htmlspecialchars($this->input->post('tp', true)),
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'name' => htmlspecialchars($this->input->post('name', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'kelas' => $this->input->post('kelas'),
            'guru_pendamping' => $this->input->post('guru_pendamping'),
            'hp_pendamping' => $this->input->post('hp_pendamping'),
            'email_pendamping' => $this->input->post('email_pendamping'),
            'nama_instansi' => htmlspecialchars($this->input->post('nama_instansi', true)),
            'alamat_instansi' => htmlspecialchars($this->input->post('alamat_instansi', true)),
            'email_website_instansi' => htmlspecialchars($this->input->post('email_website_instansi', true)),
            'telp_instansi' => htmlspecialchars($this->input->post('telp_instansi', true)),
            'nama_pejabat' => htmlspecialchars($this->input->post('nama_pejabat', true)),
            'no_pejabat' => htmlspecialchars($this->input->post('no_pejabat', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'telp_pejabat' => htmlspecialchars($this->input->post('telp_pejabat', true)),
            'email_pejabat' => htmlspecialchars($this->input->post('email_pejabat', true)),
            'no_sertifikat' => htmlspecialchars($this->input->post('no_sertifikat', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('master');
    }
    public function hapusIduka($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_iduka');
    }

    //TKRO
    public function Siswatkro()
    {
        return $this->db->get_where('master', ['jurusan' => '4'])->result_array();
    }

    public function editSiswaTKRO()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //TBSM
    public function Siswatbsm()
    {
        return $this->db->get_where('master', ['jurusan' => '5'])->result_array();
    }
    public function editSiswaTBSM()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //AKL
    public function Siswaakl()
    {
        return $this->db->get_where('master', ['jurusan' => '6'])->result_array();
    }
    public function editSiswaAKL()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //OTKP
    public function Siswaotkp()
    {
        return $this->db->get_where('master', ['jurusan' => '7'])->result_array();
    }
    public function editSiswaOTKP()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true)),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    //BDP
    public function Siswabdp()
    {
        return $this->db->get_where('master', ['jurusan' => '8'])->result_array();
    }
    public function editSiswaBDP()
    {
        $data = [
            'nilai_1' => htmlspecialchars($this->input->post('nilai_1', true)),
            'nilai_2' => htmlspecialchars($this->input->post('nilai_2', true)),
            'nilai_3' => htmlspecialchars($this->input->post('nilai_3', true)),
            'nilai_4' => htmlspecialchars($this->input->post('nilai_4', true)),
            'nilai_5' => htmlspecialchars($this->input->post('nilai_5', true)),
            'nilai_6' => htmlspecialchars($this->input->post('nilai_6', true)),
            'nilai_7' => htmlspecialchars($this->input->post('nilai_7', true)),
            'nilai_8' => htmlspecialchars($this->input->post('nilai_8', true)),
            'nilai_9' => htmlspecialchars($this->input->post('nilai_9', true)),
            'nilai_10' => htmlspecialchars($this->input->post('nilai_10', true)),
            'nilai_11' => htmlspecialchars($this->input->post('nilai_11', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $data);
    }

    public function Pengumuman()
    {
        $this->db->order_by('pengumuman', 'ASC');
        return $this->db->get_where('tbl_pengumuman')->result_array();
    }
    public function getGuru()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_guru')->result_array();
    }

    public function surat($id)
    {
        return $this->db->get_where('tbl_surat', ['id' => $id])->row_array();
    }
}