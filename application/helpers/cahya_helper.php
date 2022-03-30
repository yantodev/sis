<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

if (!function_exists('akun')) {
    function akun($akun)
    {
        switch ($akun) {
            case 1:
                $akun = "Administrator";
                break;
            case 2:
                $akun = "Februari";
                break;
            case 3:
                $akun = "Admin PKL";
                break;
            case 4:
                $akun = "Siswa";
                break;
            case 5:
                $akun = "Guru Pembimbing PKL";
                break;
            case 6:
                $akun = "Kepala Sekolah";
                break;
            case 7:
                $akun = "Ketua Komptensi Keahlian";
                break;
            case 11:
                $akun = "Bendahara";
                break;
            case 12:
                $akun = "Admin Lab Komputer";
                break;
        }
        return $akun;
    }
}
if (!function_exists('aktif')) {
    function aktif($aktif)
    {
        switch ($aktif) {
            case 0:
                $aktif = "Non Aktif";
                break;
            case 1:
                $aktif = "Aktif";
                break;
        }
        return $aktif;
    }
}
