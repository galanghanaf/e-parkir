<?php
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [

            'required' => "<script>Swal.fire(
                'Gagal',
                'Username Wajib Diisi!',
                'error'
              )</script>",
            'trim' => "<script>Swal.fire(
                'Gagal',
                'Username Tidak Boleh Ada Spasi!',
                'error'
              )</script>",
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [

            'required' => "<script>Swal.fire(
                'Gagal',
                'Password Wajib Diisi!',
                'error'
              )</script>",
            'trim' => "<script>Swal.fire(
                'Gagal',
                'Password Tidak Boleh Ada Spasi!',
                'error'
              )</script>",
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        if ($login) {
            if ($login['is_active'] == 1) {
                if ($password == $login['password']) {
                    $data = [
                        'username' => $login['username'],
                        'role_id' => $login['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($login['role_id'] == 'ADMIN') {
                        $this->session->set_flashdata('message', "<script>Swal.fire({
                            icon: 'success',
                            title: 'Anda Berhasil Masuk',
                            showConfirmButton: false,
                            timer: 2000
                          })</script>");
                        redirect('home');
                    } elseif ($login['role_id'] == 'USER') {
                        $this->session->set_flashdata('message', "<script>Swal.fire({
                            icon: 'success',
                            title: 'Anda Berhasil Masuk',
                            showConfirmButton: false,
                            timer: 2000
                          })</script>");
                        redirect('home');
                    } else {
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Gagal Login',
                        'Password Anda Salah',
                        'error'
                      )</script>");
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', "<script>Swal.fire(
                    'Gagal',
                    'Username Anda Salah!',
                    'error'
                  )</script>");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', "<script>Swal.fire(
                'Gagal',
                'Username Anda Tidak Terdaftar!',
                'error'
              )</script>");
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', "<script>Swal.fire({
            icon: 'success',
            title: 'Anda Berhasil Keluar',
            showConfirmButton: false,
            timer: 2000
          })</script>");
        redirect('auth');
    }
    public function logout2()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', "<script>Swal.fire({
            icon: 'success',
            title: 'Sesi Anda Telah Berakhir',
            showConfirmButton: false,
            timer: 2000
          })</script>");
        redirect('auth');
    }
}