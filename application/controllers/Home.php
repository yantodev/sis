<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
        // }
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('home/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/footer', $data);
    }

    public function data()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Admin_model->getJurusan();
        $jurusan = $this->input->get('jurusan');
        $data['iduka'] = $this->Admin_model->getIduka($jurusan);
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/data', $data);
        $this->load->view('home/footer', $data);
    }
    public function view()
    {
        $data['title'] = 'Home';
        $data['data2'] =  $this->Admin_model->getJurusan();
        $iduka = $this->input->get('iduka');
        $data['data'] = $this->Admin_model->getIdukaBy($iduka);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/header', $data);
        $this->load->view('home/view', $data);
        $this->load->view('home/footer', $data);
    }

    public function Permohonan()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['iduka'] = $this->db->get_where('tbl_iduka')->result_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/permohonan', $data);
        $this->load->view('home/footer', $data);
    }
    public function surat_tugas()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['guru'] = $this->db->get_where('tbl_guru')->result_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/surat-tugas', $data);
        $this->load->view('home/footer', $data);
    }

    public function listIduka()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $jurusan = $this->input->get('jurusan');

        $iduka = $this->Home_model->Iduka($jurusan);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih Iduka/Instansi</option>";

        foreach ($iduka as $data) {
            $lists .= "<option value='" . $data->iduka . "'>" . $data->iduka . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_iduka' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function Cetak()
    {
        $data['title'] = 'Cetak Surat Permohonan';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['instansi'] = $this->input->get('instansi');
        $data['iduka'] = $this->input->get('iduka');
        $iduka = $this->input->get('iduka');
        $data['data'] = $this->Admin_model->getIdukaByIduka($iduka);
        $data['alamat'] = $this->Admin_model->getAlamatIduka($iduka);
        $kajur = $this->input->get('jurusan');
        $data['kajur'] = $this->Admin_model->getKajur($kajur);
        $data['pernyataan'] = $this->Home_model->getSurat();
        $data['nomor'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Permohonan'])->row_array();

        $this->load->view('home/cetak', $data);
        $this->load->view('home/cetak2', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );
        $mpdf->SetFooter('<p align="left">
                            <font color="blue">
                                <i>Narahubung : 087839839710 (Humas IDUKA)</i>
                            </font>
                        </p>');

        $html = $this->load->view('home/cetak', [], true);
        $mpdf->WriteHTML($html);

        $mpdf->AddPage(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );
        $mpdf->SetFooter('<p align="left">
                            1 lembar dikirim ke SMK Muh. Karangmojo<br />
                            1 lembar untuk arsip Kepala Kompetensi Keahlian<br />
                            1 lembar untuk arsip IDUKA (Instansi)<br />
                            *) Coret salah satu
                        </p>');
        $html2 = $this->load->view('home/cetak2', [], true);
        $mpdf->WriteHTML($html2);
        $mpdf->Output('Surat Permohonan PI.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function cetak_tugas()
    {
        $data['title'] = 'Cetak Surat Permohonan';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['pernyataan'] = $this->Home_model->getSurat();
        $guru = $this->input->get('guru');
        $tp = $this->input->get('tp');
        $data['guru'] = $this->Home_model->getTugas($guru);
        $data['data'] = $this->db->get_where('master', ['guru_pendamping' => $guru, 'tp' => $tp])->result_array();
        $data['nomor'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Tugas'])->row_array();

        $this->load->view('home/cetak-tugas', $data);

        $filename = 'Surat Tugas ' . $guru;
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('home/cetak-tugas', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename . '.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function detailsiswa($id)
    {
        $data['title'] = 'Profile Siswa';
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('home/detail-siswa', $data);
        // $mpdf = new \Mpdf\Mpdf(
        //     [
        //         'mode' => 'utf-8',
        //         'format' => 'A4',
        //         'orientation' => 'P',
        //         'setAutoTopMargin' => false
        //     ]
        // );

        // $html = $this->load->view('home/detail-siswa', [], true);
        // $mpdf->WriteHTML($html);
        // $mpdf->Output('Detail Siswa.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function surat_pengantar()
    {
        $data['title'] = 'Home';
        $data['tp'] =  $this->Admin_model->getTP();
        $data['data'] =  $this->Home_model->Jurusan();
        $data['guru'] = $this->db->get_where('tbl_guru')->result_array();
        $this->load->view('home/header', $data);
        $this->load->view('home/navbar', $data);
        $this->load->view('home/surat-pengantar', $data);
        $this->load->view('home/footer', $data);
    }

    public function cetak_pengantar()
    {
        $data['title'] = 'Cetak Surat Pengantar';
        $data['instansi'] = $this->input->get('instansi');
        $data['iduka'] = $this->input->get('iduka');
        $iduka = $this->input->get('iduka');
        $data['data'] = $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->row_array();
        $data['nomor'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Pengantar'])->row_array();

        $this->load->view('home/cetak-pengantar', $data);

        $filename = 'Surat Pengantar ' . $iduka;
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => 'stretch'
            ]
        );
        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/kop.png" width="100%" height="20%" />
        </div>');

        $html = $this->load->view('home/cetak-pengantar', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
}
