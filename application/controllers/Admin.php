<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library phpspreadsheet
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datatkro'] = $this->db->get_where('tbl_jumlah_siswa', ['jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->row_array();
        $data['datatbsm'] = $this->db->get_where('tbl_jumlah_siswa', ['jurusan' => 'Teknik Bisnis Sepeda Motor'])->row_array();
        $data['dataakl'] = $this->db->get_where('tbl_jumlah_siswa', ['jurusan' => 'Akuntansi dan Keuangan Lembaga'])->row_array();
        $data['dataotkp'] = $this->db->get_where('tbl_jumlah_siswa', ['jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran'])->row_array();
        $data['databdp'] = $this->db->get_where('tbl_jumlah_siswa', ['jurusan' => 'Bisnis Daring dan Pemasaran'])->row_array();
        $data['siswa'] = $this->Admin_model->countSiswa();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function Siswa()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Daftar Siswa';
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('wrapper/footer');
    }
    public function CetakSiswa()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rekap Siswa';
        $jurusan = $this->input->get('jurusan');
        $tp = $this->input->get('tp');
        $data['siswa'] = $this->Admin_model->getSiswa($jurusan, $tp);
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/cetak-siswa', $data);
        $this->load->view('wrapper/footer');

        $filename = 'Rekap Siswa ' . $jurusan;
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'Folio',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/cetak-siswa', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('wrapper/footer');
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password baru', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/change-password', $data);
            $this->load->view('wrapper/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!!!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('admin/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password baru sama dengan yang lama!!!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }

    public function data()
    {
        $data['title'] = 'Data siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['siswa'] = $jurusan;
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/data-siswa', $data);
        $this->load->view('wrapper/footer');
    }

    // Export ke excel
    public function export()
    {
        $tp = $this->input->post('tp');
        $jurusan = $this->input->post('jurusan');

        $data = $this->Admin_model->getExport($jurusan, $tp);
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Eko Cahyanto - IT Development SMK Muh Karangmojo')
            ->setLastModifiedBy('Eko Cahyanto - IT Development SMK Muh Karangmojo')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Rekap Siswa ' . $jurusan)
            ->setCellValue('A2', 'Tahun Pelajaran ' . $tp)
            ->setCellValue('A3', 'Tanggal Rekap ' . format_indo(date('Y-m-d')))
            ->setCellValue('A5', 'NO')
            ->setCellValue('B5', 'NIS')
            ->setCellValue('C5', 'NAMA')
            ->setCellValue('D5', 'KELAS')
            ->setCellValue('E5', 'JURUSAN')
            ->setCellValue('F5', 'LOKASI PKL')
            ->setCellValue('G5', 'ALAMAT PKL')
            ->setCellValue('H5', 'PENDAMPING');

        // Miscellaneous glyphs, UTF-8
        $i = 6;
        $n = 1;
        foreach ($data as $d) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $n)
                ->setCellValue('B' . $i, $d['nis'])
                ->setCellValue('C' . $i, $d['name'])
                ->setCellValue('D' . $i, $d['kelas'])
                ->setCellValue('E' . $i, $d['jurusan'])
                ->setCellValue('F' . $i, $d['nama_instansi'])
                ->setCellValue('G' . $i, $d['alamat_instansi'])
                ->setCellValue('H' . $i, $d['guru_pendamping']);
            $i++;
            $n++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Rekap Siswa Excel ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Rekap Siswa Excel.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    public function dataALL()
    {
        $data['title'] = 'Data siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->Admin_model->getTP();
        $tp = $this->input->get('tp');
        $data['data'] = $this->db->get_where('master', ['tp' => $tp])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/data-siswa-all', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailData($id)
    {
        $data['title'] = 'Detail Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/detail-siswa', $data);
        $this->load->view('wrapper/footer');
    }

    public function editData($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['tp'] = $this->Admin_model->getTP();
        $data['iduka'] = $this->db->get_where('tbl_jurusan')->result_array();

        $tp = $this->input->post('tp');
        $jurusan = $this->input->post('jurusan');
        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/data?tp=' . $tp . '&jurusan=' . $jurusan);
        }
    }
    public function suratbalasan($nis)
    {
        $data['title'] = 'Surat Balasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->Admin_model->Pengumuman();
        $data['siswa'] = $this->db->get_where('master', ['nis' => $nis])->row_array();

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        // $this->form_validation->set_rules('file', 'Foto', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('admin/surat-balasan', $data);
            $this->load->view('wrapper/footer');
        } else {
            $upload_image = $_FILES['file']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PNG|JPG|JPEG';
                $config['max_size']     = '10024';
                $config['upload_path']  = './assets/img/surat balasan';

                $this->load->library('upload', $config);
                if ($_FILES['file']['name'] != null) {
                    if ($this->upload->do_upload('file')) {
                        $nis = $this->input->post('nis');
                        $status = $this->input->post('status');
                        $foto = $this->upload->data('file_name');
                        $data = array(
                            'status' => $status,
                            'file' => $foto
                        );
                        //update
                        $this->db->where('nis', $nis);
                        $this->db->update('master', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat balasan berhasil ditambahkan!</div>');
                        redirect('admin/suratbalasan/' . $nis);
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('wrapper/header', $data);
                        $this->load->view('admin/wrapper/sidebar', $data);
                        $this->load->view('wrapper/topbar', $data);
                        $this->load->view('admin/surat-balasan', $error);
                        $this->load->view('wrapper/footer');
                    }
                }
            }
        }
    }

    public function hapus($id)
    {
        $this->Admin_model->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus!!!</div>');
        redirect('admin/data');
    }

    public function nilai()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $iduka = $this->input->get('nama_instansi');
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan,])->result_array();
        $data['tabel'] = $this->db->get_where('tbl_nilai', ['jurusan' => $jurusan])->result_array();
        $data['siswa'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->result_array();

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $id = $this->input->post('id[]');
            $nilai_1 = $this->input->post('nilai_1[]');
            $nilai_2 = $this->input->post('nilai_2[]');
            $nilai_3 = $this->input->post('nilai_3[]');
            $nilai_4 = $this->input->post('nilai_4[]');
            $nilai_5 = $this->input->post('nilai_5[]');
            $nilai_6 = $this->input->post('nilai_6[]');
            $nilai_7 = $this->input->post('nilai_7[]');
            $nilai_8 = $this->input->post('nilai_8[]');
            $nilai_9 = $this->input->post('nilai_9[]');
            $nilai_10 = $this->input->post('nilai_10[]');
            $nilai_11 = $this->input->post('nilai_11[]');
            $result = array();
            foreach ($id as $key => $val) {
                $result[] = array(
                    'id'    => $id[$key],
                    'nilai_1'    => $nilai_1[$key],
                    'nilai_2'    => $nilai_2[$key],
                    'nilai_3'    => $nilai_3[$key],
                    'nilai_4'    => $nilai_4[$key],
                    'nilai_5'    => $nilai_5[$key],
                    'nilai_6'    => $nilai_6[$key],
                    'nilai_7'    => $nilai_7[$key],
                    'nilai_8'    => $nilai_8[$key],
                    'nilai_9'    => $nilai_9[$key],
                    'nilai_10'    => $nilai_10[$key],
                    'nilai_11'    => $nilai_11[$key],
                );
            }
            $this->db->update_batch('master', $result, 'id');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil di update!!!</div>');
            redirect('admin/nilai');
        }
    }


    //TKRO
    public function nilaitkro()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['data'] =  $this->Admin_model->Siswatkro();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tkro/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailtkro($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tkro/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function edittkro($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/tkro/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaTKRO();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaitkro');
        }
    }

    //TBSM
    public function nilaitbsm()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Bisnis Sepeda Motor'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tbsm/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailtbsm($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tbsm/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function edittbsm($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/tbsm/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaTBSM();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaitbsm');
        }
    }

    //AKL
    public function nilaiakl()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Akuntansi dan Keuangan Lembaga'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/akl/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailakl($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/akl/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editakl($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/akl/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaAKL();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaiakl');
        }
    }

    //OTKP
    public function nilaiotkp()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/otkp/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailotkp($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/otkp/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editotkp($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/otkp/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaOTKP();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaiotkp');
        }
    }

    //BDP
    public function nilaibdp()
    {
        $data['title'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Bisnis Daring dan Pemasaran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/bdp/nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailbdp($id)
    {
        $data['title'] = 'Detail Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/bdp/detail-nilai', $data);
        $this->load->view('wrapper/footer');
    }

    public function editbdp($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->form_validation->set_rules('nilai_1', 'Nilai Disiplin', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/bdp/edit-nilai', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editSiswaBDP();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nilaibdp');
        }
    }

    public function sertifikat()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan])->result_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/sertifikat');
        $this->load->view('wrapper/footer');
    }
    public function CetakDepan()
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $id = $this->input->get('id');
        $data['tp'] = $this->db->get_where('tp', ['tp' => $tp])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        </div>');

        $html = $this->load->view('admin/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakang()
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->input->get('id');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['tabel'] = $this->db->get_where('tbl_nilai', ['jurusan' => $jurusan, 'id_kode' => 1])->result_array();
        $data['tabel2'] = $this->db->get_where('tbl_nilai', ['jurusan' => $jurusan,  'id_kode' => 2])->result_array();
        $data['tp'] = $this->db->get_where('tp', ['tp' => $tp])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');

        $html = $this->load->view('admin/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //SERTIFIKAT TKRO
    public function sertifikatTKRO()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Kendaraan Ringan Otomotif'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepantkro($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        </div>');

        $html = $this->load->view('admin/tkro/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangtkro($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tkro/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        // </div>');

        $html = $this->load->view('admin/tkro/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat TBSM
    public function sertifikatTBSM()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Teknik Bisnis Sepeda Motor'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepantbsm($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold;">
          <img src="assets/img/pi-2020.png" width="100%" height="100%" />
        </div>');

        $html = $this->load->view('admin/tbsm/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangtbsm($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/tbsm/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/tbsm/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat AKL
    public function sertifikatAKL()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Akuntansi dan Keuangan Lembaga'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanakl($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/akl/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangakl($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/akl/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/akl/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat OTKP
    public function sertifikatOTKP()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Otomatisasi dan Tata Kelola Perkantoran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanotkp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/otkp/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangotkp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/otkp/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/otkp/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    //Sertifikat BDP
    public function sertifikatBDP()
    {
        $data['title'] = 'Cetak Sertifikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $data['tp'] = $this->Admin_model->getTP();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => 'Bisnis Daring dan Pemasaran'])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat', $data);
        $this->load->view('wrapper/footer');
    }

    public function CetakDepanbdp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat-depan', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/bdp/sertifikat-depan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function CetakBelakangbdp($id)
    {
        $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Admin_model->getSiswaById($id);
        $data['jurusan'] = $this->Admin_model->Jurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/bdp/sertifikat-belakang', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/bdp/sertifikat-belakang', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('SERTIFIKAT PI.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function masterdata()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/master-data', $data);
        $this->load->view('wrapper/footer');
    }

    //IDUKA
    public  function iduka()
    {
        $data['title'] = 'IDUKA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] =  $this->Admin_model->getJurusan();
        $jurusan = $this->input->get('jurusan');
        $data['iduka'] = $this->Admin_model->getIduka($jurusan);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('iduka', 'Iduka/Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Iduka', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/iduka', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->addIduka();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambah!!!</div>');
            redirect('admin/iduka');
        }
    }
    public function editIduka($id)
    {
        $data['title'] = 'Edit Data IDUKA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->getIdukaById($id);
        $data['data2'] =  $this->Admin_model->getJurusan();

        $jurusan = $this->input->post('jurusan');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_rules('iduka', 'Iduka/Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Iduka/Instansi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-iduka', $data);
            $this->load->view('wrapper/footer');
        } else {
            $this->Admin_model->editIduka();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/iduka?jurusan=' . $jurusan);
        }
    }

    public function Pengumuman()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->Admin_model->Pengumuman();

        $this->form_validation->set_rules('pengumuman', 'pengumuman', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/pengumuman', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'judul'  => htmlspecialchars($this->input->post('judul', true)),
                'pengumuman'  => htmlspecialchars($this->input->post('pengumuman', true))
            ];
            $this->db->insert('tbl_pengumuman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Berhasil ditambah!!!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function AlamatIduka()
    {
        $nama_instansi = $this->input->get('nama_instansi');
        $iduka = $this->Home_model->alamatIduka($nama_instansi);

        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->alamat . "'>" . $data->alamat . "</option>";
        }
        $callback = array('list_alamat' => $lists);
        echo json_encode($callback);
    }
    public function listIduka()
    {
        $singkatan_jurusan = $this->input->get('jurusan');
        $iduka = $this->Home_model->Iduka($singkatan_jurusan);
        $lists = "<option value=''>Pilih Iduka/Instansi</option>";
        foreach ($iduka as $data) {
            $lists .= "<option value='" . $data->iduka . "'>" . $data->iduka . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('list_iduka' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function listIduka2()
    {
        $singkatan_jurusan = $this->input->get('jurusan2');
        $iduka = $this->Home_model->Iduka($singkatan_jurusan);
        $lists = "<option value=''>Pilih Iduka/Instansi</option>";
        foreach ($iduka as $data) {
            $lists .= "<option value='" . $data->iduka . "'>" . $data->iduka . "</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('list_iduka2' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    public function hpGuru()
    {
        $guru_pendamping = $this->input->get('guru_pendamping');
        $iduka = $this->Home_model->hpPendamping($guru_pendamping);

        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->hp . "'>" . $data->hp . "</option>";
        }
        $callback = array('list_hp' => $lists);
        echo json_encode($callback);
    }
    public function emailGuru()
    {
        $guru_pendamping = $this->input->get('guru_pendamping');
        $iduka = $this->Home_model->hpPendamping($guru_pendamping);

        foreach ($iduka as $data) {
            $lists = "<option value='" . $data->email . "'>" . $data->email . "</option>";
        }
        $callback = array('list_email' => $lists);
        echo json_encode($callback);
    }

    public function suratPKL($id)
    {
        $data['title'] = 'Surat PKL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Admin_model->surat($id);

        $this->form_validation->set_rules('nomor', 'nomor', 'required');
        $this->form_validation->set_rules('lampiran', 'lampiran', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/surat-pkl', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'tgl_surat'  => htmlspecialchars($this->input->post('tgl_surat', true)),
                'nomor'  => htmlspecialchars($this->input->post('nomor', true)),
                'lampiran'  => htmlspecialchars($this->input->post('lampiran', true)),
                'hal'  => htmlspecialchars($this->input->post('hal', true)),
                'tgl_pkl'  => htmlspecialchars($this->input->post('tgl_pkl', true)),
                'p1'  => htmlspecialchars($this->input->post('p1', true)),
                'p2'  => htmlspecialchars($this->input->post('p2', true)),
                'p3'  => htmlspecialchars($this->input->post('p3', true)),
                'p4'  => htmlspecialchars($this->input->post('p4', true)),
                'p5'  => htmlspecialchars($this->input->post('p5', true)),
                'p6'  => htmlspecialchars($this->input->post('p6', true)),
                'kepala_sekolah'  => htmlspecialchars($this->input->post('kepala_sekolah', true)),
                'nbm'  => htmlspecialchars($this->input->post('nbm', true)),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_surat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>');
            redirect('admin/suratpkl/1');
        }
    }

    public function Guru()
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->Admin_model->Guru();
        $data['data'] =  $this->Admin_model->getJurusan();
        // $data['guru2'] =  $this->Admin_model->getGuruby();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('wrapper/footer');
    }
    public function editGuru($id)
    {
        $data['title'] = 'Edit Data Pendamping';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] =  $this->Admin_model->getJurusan();
        $data['guru'] =  $this->Admin_model->getGuruby($id);

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('nbm', 'nbm', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/edit-guru', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'nama'  => htmlspecialchars($this->input->post('nama', true)),
                'nbm'  => htmlspecialchars($this->input->post('nbm', true)),
                'email'  => htmlspecialchars($this->input->post('email', true)),
                'hp'  => htmlspecialchars($this->input->post('hp', true)),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_guru', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!!!</div>');
            redirect('admin/guru');
        }
    }

    public function tambahsiswa()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $iduka = $this->input->get('nama_instansi');
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->result_array();
        $data['guru'] = $this->Admin_model->Guru();

        $this->form_validation->set_rules('nis[]', 'NIS', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/tambah-siswa', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nis = $this->input->post('nis[]');
            $guru = $this->input->post('guru_pendamping[]');
            $email = $this->input->post('email_pendamping[]');
            $lokasi = $this->input->post('nama_instansi[]');
            $alamat = $this->input->post('alamat_instansi[]');
            $nis = $this->input->post('nis[]');
            $siswa = $this->input->post('name[]');
            $result = array();
            foreach ($nis as $key => $val) {
                $result[] = array(
                    'nis' => $nis[$key],
                    'email'  => $guru[$key],
                    'lokasi'  => $lokasi[$key],
                    'alamat'  => $alamat[$key],
                    'nama_siswa'  => $siswa[$key],
                );
            }
            $this->db->insert_batch('tbl_pendamping', $result);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendamping berhasil di update!!!</div>');
            redirect('admin/guru');
        }
    }

    public function resetpassword()
    {
        $data['title'] = 'Reset Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/reset-password', $data);
        $this->load->view('wrapper/footer');
    }

    public function idcard()
    {
        $data['title'] = 'ID CARD';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->Admin_model->getTP();
        $data['jurusan'] = $this->Admin_model->getJurusan();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/idcard', $data);
        $this->load->view('wrapper/footer');
    }

    public function cetakIDCard()
    {
        $data['title'] = 'ID CARD';
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['data'] = $this->Admin_model->idcard($tp, $jurusan);
        $data['tanggal'] = $this->db->get_where('tbl_surat', ['id' => 1])->row_array();
        $this->load->view('admin/cetak-idcard', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/cetak-idcard', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('CETAK ID CARD.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->Admin_model->getGuru();
        $guru = $this->input->get('guru');
        $data['data'] = $this->db->get_where('tbl_monitoring', ['nama' => $guru])->result_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/monitoring', $data);
        $this->load->view('wrapper/footer');
    }

    public function surattugas()
    {
        $data['title'] = 'Daftar Surat Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['guru'] = $this->Admin_model->Guru();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();
        $guru = $this->input->get('guru');
        $data['data'] = $this->db->get_where('tbl_iduka', ['active' => 1])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/surat-tugas', $data);
        $this->load->view('wrapper/footer');
    }
    public function tambahsurattugas()
    {
        $data['title'] = 'Tambah Surat Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();
        $data['guru'] = $this->Admin_model->Guru();
        // $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['data'] = $this->Admin_model->getIduka($jurusan);

        $this->form_validation->set_rules('tp[]', 'TP', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/tambah-surat-tugas', $data);
            $this->load->view('wrapper/footer');
        } else {
            $email = $this->input->post('guru[]');
            $lokasi = $this->input->post('lokasi[]');
            $alamat = $this->input->post('alamat[]');
            $tp = $this->input->post('tp[]');
            $active = $this->input->post('active[]');
            $result = array();
            foreach ($lokasi as $key => $val) {
                $result[] = array(
                    'guru'     => $email[$key],
                    'iduka'    => $lokasi[$key],
                    'alamat'    => $alamat[$key],
                    'tp'        => $tp[$key],
                    'active'    => $active[$key],
                );
            }
            $this->db->update_batch('tbl_iduka', $result, 'iduka');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendamping berhasil di update!!!</div>');
            redirect('admin/surattugas');
        }
    }

    public function daftarpeserta()
    {
        $data['title'] = 'Daftar Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] =  $this->Admin_model->getTP();
        $data['jurusan'] =  $this->Home_model->Jurusan();
        $data['guru'] = $this->Admin_model->getGuru();
        $guru = $this->input->get('guru');
        $data['data'] = $this->db->get_where('tbl_monitoring', ['nama' => $guru])->result_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/daftar-peserta', $data);
        $this->load->view('wrapper/footer');
    }

    public function cetakdaftarpeserta()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $iduka = $this->input->get('nama_instansi');
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->result_array();
        $data['data2'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->row_array();
        $data['data3'] = $this->db->get_where('tbl_surat', ['id' => 1])->row_array();
        $data['data4'] = $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->row_array();
        $this->load->view('admin/cetak-daftar-peserta', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/cetak-daftar-peserta', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar Peserta PKL.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function suratjalan()
    {
        $data['title'] = 'Surat Jalan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->Admin_model->getGuru();
        $data['tp'] =  $this->Admin_model->getTP();
        $data['jurusan'] =  $this->Home_model->Jurusan();
        $guru = $this->input->get('guru');
        $data['data'] = $this->db->get_where('tbl_monitoring', ['nama' => $guru])->result_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('admin/wrapper/sidebar', $data);
        $this->load->view('admin/wrapper/topbar', $data);
        $this->load->view('admin/surat-jalan', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetaksuratjalan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $iduka = $this->input->get('nama_instansi');
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->result_array();
        $data['data2'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->row_array();
        $data['data3'] = $this->db->get_where('tbl_surat', ['id' => 1])->row_array();
        $data['data4'] = $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->row_array();
        $data['data5'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Jalan'])->row_array();
        $this->load->view('admin/cetak-surat-jalan', $data);

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('admin/cetak-surat-jalan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Daftar Peserta PKL.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function nomorsurat()
    {
        $data['title'] = 'Daftar Nomor Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_nomor_surat')->result_array();

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('admin/wrapper/sidebar', $data);
            $this->load->view('admin/wrapper/topbar', $data);
            $this->load->view('admin/nomor-surat', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nomor = $this->input->post('nomor[]');
            $tgl_surat = $this->input->post('tgl_surat[]');
            $id = $this->input->post('id[]');
            $result = array();
            foreach ($id as $key => $val) {
                $result[] = array(
                    'id' => $id[$key],
                    'nomor'    => $nomor[$key],
                    'tgl_surat' => $tgl_surat[$key],
                );
            }
            $this->db->update_batch('tbl_nomor_surat', $result, 'id');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!!</div>');
            redirect('admin/nomorsurat');
        }
    }
}
