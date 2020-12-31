<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendamping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->library('session', 'file');
        // is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Home_model');
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function Profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nbm', 'NBM', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('pendamping/wrapper/sidebar', $data);
            $this->load->view('pendamping/wrapper/topbar', $data);
            $this->load->view('pendamping/profile', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nbm = $this->input->post('nbm');
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/foto';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/foto' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pendamping');
                }
            }
            //update user
            $this->db->set('nis', $nbm);
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            //update master
            $this->db->set('nbm', $nbm);
            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('tbl_guru');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your profile has ben updated!</div>');
            redirect('pendamping');
        }
    }
    public function laporan()
    {
        $data['title'] = 'Laporan Kegiatan Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();
        $nama = $this->input->get('nama');
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $instansi = $this->input->get('nama_instansi');
        $data['data'] = $this->db->get_where('master', ['jurusan' => $jurusan, 'guru_pendamping' => $nama, 'tp' => $tp, 'nama_instansi' => $instansi])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/laporan', $data);
        $this->load->view('wrapper/footer');
    }

    public function detail($nis)
    {
        $data['title'] = 'Detail Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->get_where('master', ['nis' => $nis])->row_array();
        $data['laporan'] = $this->db->get_where('tbl_laporan', ['nis' => $nis])->result_array();

        $this->form_validation->set_rules('id[]', 'ID', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('pendamping/wrapper/sidebar', $data);
            $this->load->view('pendamping/wrapper/topbar', $data);
            $this->load->view('pendamping/detail', $data);
            $this->load->view('wrapper/footer');
        } else {
            $id = $this->input->post('id[]');
            $status = $this->input->post('status[]');
            $result = array();
            foreach ($id as $key => $val) {
                $result[] = array(
                    'id'     => $id[$key],
                    'status'    => $status[$key],
                );
            }
            $this->db->update_batch('tbl_laporan', $result, 'id');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendamping berhasil di update!!!</div>');
            redirect('pendamping/cetakdetail/' . $nis);
        }
    }
    public function cetakdetail($nis)
    {
        $data['title'] = 'Detail Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->get_where('master', ['nis' => $nis])->row_array();
        $data['laporan'] = $this->db->get_where('tbl_laporan', ['nis' => $nis, 'status' => 1])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/cetak-detail', $data);
        $this->load->view('wrapper/footer');

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

        $html = $this->load->view('pendamping/cetak-detail', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Detail Laporan Siswa.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function surattugas()
    {
        $data['title'] = 'Detail Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('master', ['email_pendamping' => $this->session->userdata('email')])->result_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['nomor'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Tugas'])->row_array();

        $this->load->view('pendamping/surat-tugas', $data);

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

        $html = $this->load->view('pendamping/surat-tugas', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Surat Tugas.pdf', \Mpdf\Output\Destination::INLINE);
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
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/surat-jalan', $data);
        $this->load->view('wrapper/footer');
    }
    public function cetaksuratjalan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['data'] = $this->db->get_where('master', ['email_pendamping' => $this->session->userdata('email')])->result_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['nomor'] = $this->db->get_where('tbl_nomor_surat', ['jenis' => 'Surat Tugas'])->row_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $iduka = $this->input->get('nama_instansi');
        $data['data'] = $this->db->get_where('master', ['tp' => $tp, 'jurusan' => $jurusan, 'nama_instansi' => $iduka])->result_array();
        $data['data2'] = $this->db->get_where('tbl_iduka', ['iduka' => $iduka])->row_array();
        $data['data3'] = $this->db->get_where('tbl_surat', ['id' => 1])->row_array();
        $data['tp'] = $this->db->get_where('tp', ['tp' => $tp])->row_array();

        $this->load->view('pendamping/cetak-surat-jalan', $data);

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

        $html = $this->load->view('pendamping/cetak-surat-jalan', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Surat Jalan.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function monitoring()
    {
        $data['title'] = 'Lembar Monitoring';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_monitoring', ['email' => $this->session->userdata('email')])->result_array();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
        // $this->form_validation->set_rules('foto', 'File', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('pendamping/wrapper/sidebar', $data);
            $this->load->view('pendamping/wrapper/topbar', $data);
            $this->load->view('pendamping/monitoring', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nama = $this->input->post('nama');
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']     = '5120';
            $config['upload_path']  = './assets/img/monitoring';
            $config['file_name']  = 'laporan-' . date('Y-m-d');

            $this->load->library('upload', $config);
            if ($_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $lokasi = $this->input->post('lokasi');
                    $jurusan = $this->input->post('jurusan');
                    $foto = $this->upload->data('file_name');
                    $data = array(
                        'nama' => $nama,
                        'email' => $email,
                        'lokasi' => $lokasi,
                        'jurusan' => $jurusan,
                        'file' => $foto
                    );
                    $this->db->insert('tbl_monitoring', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil diupdate!</div>');
                    redirect('pendamping/monitoring');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('wrapper/header', $data);
                    $this->load->view('pendamping/wrapper/sidebar', $data);
                    $this->load->view('pendamping/wrapper/topbar', $data);
                    $this->load->view('pendamping/monitoring', $error);
                    $this->load->view('wrapper/footer');
                }
            }
        }
    }
    function file($name = NULL)
    {
        $this->load->helper('download');
        // $name = $this->uri->segment(4);
        $data = file_get_contents(base_url('/assets/img/monitoring/' . $name));
        force_download($name, $data);
    }

    public function cetakmonitoring()
    {
        $data['title'] = 'Lembar Monitoring';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('master', ['email_pendamping' => $this->session->userdata('email')])->row_array();
        $jurusan = $this->input->post('jurusan');
        $instansi = $this->input->post('nama_instansi');
        $data['data2'] = $this->db->get_where('tbl_iduka', ['iduka' => $instansi])->row_array();
        $data['siswa'] = $this->db->get_where('master', ['email_pendamping' => $this->session->userdata('email'), 'jurusan' => $jurusan, 'nama_instansi' => $instansi])->result_array();
        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/cetak-monitoring', $data);
        $this->load->view('wrapper/footer');

        $filename = 'Lembar Monotoring ' . $instansi;
        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'setAutoTopMargin' => false
            ]
        );
        // $mpdf->SetHTMLHeader('
        // <div style="text-align: center; font-weight: bold;">
        //   <img src="assets/img/kop.png" width="100%" height="100%" />
        // </div>');

        $html = $this->load->view('pendamping/cetak-monitoring', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }
    public function ibadah()
    {
        $data['title'] = 'Laporan Ibadah Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tp'] = $this->db->get_where('tp')->result_array();
        $data['jurusan'] = $this->db->get_where('tbl_jurusan')->result_array();
        $tp = $this->input->get('tp');
        $jurusan = $this->input->get('jurusan');
        $data['data'] = $this->db->get_where('master', ['jurusan' => $jurusan, 'tp' => $tp])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/laporan-ibadah', $data);
        $this->load->view('wrapper/footer');
    }
    public function detail_ibadah($nis)
    {
        $data['title'] = 'Detail Ibadah Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('master', ['nis' => $nis])->row_array();
        $data['data2'] = $this->db->get_where('tbl_ibadah', ['nis' => $nis])->result_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('pendamping/wrapper/sidebar', $data);
        $this->load->view('pendamping/wrapper/topbar', $data);
        $this->load->view('pendamping/detail-ibadah', $data);
        $this->load->view('wrapper/footer');
    }
}
