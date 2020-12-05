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

    public function listIduka()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $singkatan_jurusan = $this->input->get('jurusan');

        $iduka = $this->Home_model->Iduka($singkatan_jurusan);

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

        $this->load->view('home/cetak', $data);

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

    public function detailsiswa($id)
    {
        $data['title'] = 'Profile Siswa';
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('home/detail-siswa', $data);
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('home/detail-siswa', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Siswa.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
