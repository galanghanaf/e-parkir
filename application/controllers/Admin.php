<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{
    private $login;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');

        if ($this->session->userdata('role_id') == NULL) {
            redirect('auth/logout');
        } elseif ($this->session->userdata('role_id') != 'ADMIN') {
            redirect('home');
        }

        $this->login = $this->db->get_where(
            'tbl_user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
    }

    private function inputUnique($inputNameId, $inputName, $tblName)
    {
        $this->form_validation->set_rules($inputNameId, $inputNameId, 'required|is_unique[' . $tblName . '.' . $inputNameId . ']', [
            'required' => "<script>Swal.fire(
                'Gagal',
                '$inputName Belum Terisi!',
                'error'
              )</script>",

            'is_unique' => "<script>Swal.fire(
                'Gagal',
                '$inputName Sudah Digunakan!',
                'error'
              )</script>",
        ]);
    }
    private function inputRequired($inputNameId, $inputName)
    {
        $this->form_validation->set_rules($inputNameId, $inputNameId, 'required', [
            'required' => "<script>Swal.fire(
                'Gagal',
                '$inputName Wajib Diisi!',
                'error'
              )</script>",

        ]);
    }


    public function datauser()
    {
        $this->db->db_debug = true;

        $data['login'] = $this->login;
        $data['title'] = 'Data User';

        $data['users'] = $this->M_Visual->getSecurity();

        $this->inputUnique('username', 'Username', 'tbl_user');
        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('password', 'Password');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/datauser', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $password = htmlspecialchars($this->input->post('password', true));
            $nik = htmlspecialchars($this->input->post('nik', true));
            $departemen = htmlspecialchars($this->input->post('departemen', true));
            $plant = htmlspecialchars($this->input->post('plant', true));

            if (!empty($_FILES['photo']['name'])) {
                // $username = time().$_FILES["userfiles"]['name'];
                $config['file_name'] = time();
                $config['upload_path']          = './assets/imgusers/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 10000;

                $this->load->library('upload', $config);
                $this->upload->do_upload('photo');
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            }

            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'nik' => $nik,
                'plant' => $plant,
                'departemen' => $departemen,
                'photo' => $filename,
                'created_by' => htmlspecialchars($this->input->post('created_by', true)),
            ];


            if (!$this->db->insert('tbl_user', $data)) {
                $this->db->error();
                $this->session->set_flashdata('message', "<script>Swal.fire(
					'Gagal',
					'Username Sudah Digunakan!',
					'error'
				  )</script>");
                header('Location: ' . base_url() . 'admin/datauser');
            } else {
                $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Berhasil',
                        'Data Berhasil Ditambahkan!',
                        'success'
                      )</script>");
                redirect('admin/datauser');
            }
        }
    }

    public function datausertambah($nik)
    {
        $data['login'] = $this->login;
        $data['title'] = 'Data User';
        $data['users'] = $this->M_Visual->getSecurityByNik($nik);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/datausertambah', $data);
        $this->load->view('templates/admin_footer');
    }

    public function datauseredit($nik)
    {
        $data['login'] = $this->login;
        $data['title'] = 'Data User';
        $data['users'] = $this->M_Visual->getUserByNik($nik);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/datauseredit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_user_action()
    {
        $this->db->db_debug = false;

        $data['login'] = $this->login;
        $username = htmlspecialchars($this->input->post('username', true));
        $username_lama = htmlspecialchars($this->input->post('username_lama', true));
        $photo_lama = htmlspecialchars($this->input->post('photo_lama', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $nik = htmlspecialchars($this->input->post('nik', true));
        $departemen = htmlspecialchars($this->input->post('departemen', true));
        $plant = htmlspecialchars($this->input->post('plant', true));

        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('password', 'Password');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<script>Swal.fire(
				'Gagal',
				'Pastikan Semua Data Diisi!',
				'error'
			    )</script>");
            header('Location: ' . base_url() . '/admin/datauseredit/' . $nik);
        } else {

            if (!empty($_FILES['photo']['name'])) {
                // $username = time().$_FILES["userfiles"]['name'];
                $config['file_name'] = time();
                $config['upload_path']          = './assets/imgusers/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 10000;

                // Delete Photo Lama
                unlink('./assets/imgusers/' . $photo_lama);

                $this->load->library('upload', $config);
                $this->upload->do_upload('photo');
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $update_data = [
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'plant' => $plant,
                    'photo' => $filename,
                    'created_by' => htmlspecialchars($this->input->post('created_by', true)),
                ];
            } else {
                $update_data = [
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'plant' => $plant,
                    'nik' => $nik,
                    'departemen' => $departemen,
                    'created_by' => htmlspecialchars($this->input->post('created_by', true)),
                ];
            }

            $where = [
                'username' => $username_lama,
            ];
            if (!$this->db->update('tbl_user', $update_data, $where)) {;
                $this->db->error();
                $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Gagal',
                        'Username Sudah Digunakan!',
                        'error'
                        )</script>");
                header('Location: ' . base_url() . '/admin/datauseredit/' . $nik);
            } else {

                $this->session->set_flashdata('message', "<script>Swal.fire(
                    'Berhasil',
                    'Data Berhasil Diubah!',
                    'success'
                    )</script>");
                header('Location: ' . base_url() . '/admin/datauseredit/' . $nik);
            }
        }
    }

    public function delete_user($username, $photo = NULL)
    {
        $where = array('username' => $username);
        $this->M_Visual->delete_data($where, 'tbl_user');
        // Delete Photo Lama
        unlink('./assets/imgusers/' . $photo);
        $this->session->set_flashdata('message', "<script>Swal.fire(
            'Berhasil',
            'Data User Berhasil Dihapus!',
            'success'
          )</script>");
        redirect('admin/datauser');
    }

    public function deletedatauser($nik)
    {
        $where = array('nik' => $nik);
        $this->M_Visual->delete_data($where, 'tbl_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data Berhasil Dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('home/dataUser');
    }
    public function deletedatakaryawan($nik)
    {
        $where = array('nik' => $nik);
        $this->M_Visual->delete_data($where, 'tbm_karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data Berhasil Dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('home/datakaryawan');
    }
    public function deletedatakendaraan($no_kendaraan)
    {
        $where = array('no_kendaraan' => $no_kendaraan);
        $this->M_Visual->delete_data($where, 'tbm_kendaraan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data Berhasil Dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('home/datakendaraan');
    }
}
