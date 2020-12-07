<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bdp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bdp/index', $data);
        $this->load->view('wrapper/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bdp/edit-profile', $data);
            $this->load->view('wrapper/footer');
        } else {
            $nis = $this->input->post('nis');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');
            $jurusan = 'Bisnis Daring dan Pemasaran';

            //cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('bdp');
                }
            }
            //update user
            $this->db->set('nis', $nis);
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            //update master
            $this->db->set('nis', $nis);
            $this->db->set('name', $name);
            $this->db->set('jk', $jk);
            $this->db->set('jurusan', $jurusan);
            $this->db->where('email', $email);
            $this->db->update('master');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has ben updated!</div>');
            redirect('bdp');
        }
    }

    public function data()
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bdp/data', $data);
        $this->load->view('wrapper/footer');
    }

    public function IDCard($nis)
    {
        $data['title'] = 'ID CARD';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->get_where('master', ['nis' => $nis])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/sidebar', $data);
        $this->load->view('wrapper/topbar', $data);
        $this->load->view('bdp/id-card', $data);
        $this->load->view('wrapper/footer');

        $mpdf = new \Mpdf\Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'setAutoTopMargin' => false
            ]
        );

        $html = $this->load->view('bdp/id-card', [], true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('ID-CARD.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function editdata($nis)
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->get_where('master', ['nis' => $nis])->row_array();
        $data['data'] = $this->db->get_where('tbl_iduka', ['jurusan' => 'BDP'])->result_array();
        $data['tp'] = $this->Admin_model->getTP();
        $data['kelas'] = $this->Admin_model->getKelas();

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('wrapper/sidebar', $data);
            $this->load->view('wrapper/topbar', $data);
            $this->load->view('bdp/edit-data', $data);
            $this->load->view('wrapper/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'jk' => $this->input->post('jk'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => 'Bisnis Daring dan Pemasaran',
                'nama_instansi' => $this->input->post('nama_instansi'),
                'alamat_instansi' => $this->input->post('alamat_instansi'),
                'email_website_instansi' => $this->input->post('email_website_instansi'),
                'telp_instansi' => $this->input->post('telp_instansi'),
                'nama_pejabat' => $this->input->post('nama_pejabat'),
                'no_pejabat' => $this->input->post('no_pejabat'),
                'jabatan' => $this->input->post('jabatan'),
                'telp_pejabat' => $this->input->post('telp_pejabat'),
                'email_pejabat' => $this->input->post('email_pejabat'),
                'no_sertifikat' => $this->input->post('no_sertifikat'),
                'verifikasi' => 'Telah Verifikasi'
            ];
            $this->db->where('nis', $this->input->post('nis'));
            $this->db->update('master', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diverifikasi!!!</div>');
            redirect('bdp');
        }
    }
}
