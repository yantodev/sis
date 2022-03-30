<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/index', $data);
        $this->load->view('wrapper/footer', $data);
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get_where('tbl_guru', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nbm', 'NBM', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('wrapper/header', $data);
            $this->load->view('ks/wrapper/sidebar', $data);
            $this->load->view('ks/wrapper/topbar', $data);
            $this->load->view('ks/profile', $data);
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
                    redirect('ks/profile');
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
            //update master
            $this->db->set('nbm', $nbm);
            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('tbl_ks');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your profile has ben updated!</div>');
            redirect('ks/profile');
        }
    }

    public function ttd()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get_where('tbl_ks', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('wrapper/header', $data);
        $this->load->view('ks/wrapper/sidebar', $data);
        $this->load->view('ks/wrapper/topbar', $data);
        $this->load->view('ks/ttd', $data);
        $this->load->view('wrapper/footer', $data);
    }

    public function insert_single_signature()
    {
        $nama = $_POST['nama'];
        $img = $_POST['image'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = './signature-image/' . uniqid() . '.png';
        $success = file_put_contents($file, $data);
        $image = str_replace('./', '', $file);

        $id = $_POST['id'];
        $data = array(
            'nama' => $nama,
            'ttd' => $image,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_ks', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil diupdate!</div>');
        redirect('ks/profile');
        // $this->welcome_model->insert_single_signature($image);
        echo '<img src="' . base_url() . $image . '">';
    }
}
