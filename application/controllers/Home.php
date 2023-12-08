<?php
date_default_timezone_set('Asia/Jakarta');

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    private $login;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');

        if ($this->session->userdata('role_id') == NULL) {
            redirect('auth/logout');
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

    // Start Index
    public function index()
    {
        $data['login'] = $this->login;
        $data['title'] = 'Dasboard';

        $data['queryActivity'] = $this->M_Visual->getActivityByCheckIn();
        $data['queryActivityMobil'] = $this->M_Visual->rowActivityByCheckIn('Mobil');
        $data['queryActivityMotor'] = $this->M_Visual->rowActivityByCheckIn('Motor');
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataactivity()
    {

        $data['login'] = $this->login;
        $data['title'] = 'Data Activity';

        if ($this->form_validation->run() == false) {
            $data['queryActivity'] = $this->M_Visual->getDataActivity();
            $this->load->view('home/dataactivity', $data);
        } else {

            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'departemen' => htmlspecialchars($this->input->post('departemen', true)),
                'no_kendaraan' => htmlspecialchars(str_replace(' ', '', $this->input->post('no_kendaraan', true))),
                'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis_kendaraan', true)),
                'activity_datetime' => date('Y-m-d H:i:s'),

            ];

            $this->db->insert('tbm_activity', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data Berhasil Ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('home/dataactivity');
        }
    }


    public function datakaryawan()
    {
        $this->db->db_debug = false;

        $data['login'] = $this->login;
        $data['title'] = 'Data Karyawan';
        $this->inputRequired('nik', 'NIK');
        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('departemen', 'Departemen');
        $this->inputRequired('plant', 'Plant');

        if ($this->form_validation->run() == false) {
            $data['queryKaryawan'] = $this->M_Visual->getKaryawanTbm();

            $this->load->view('templates/header', $data);
            $this->load->view('home/datakaryawan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'departemen' => htmlspecialchars($this->input->post('departemen', true)),
                'plant' => htmlspecialchars($this->input->post('plant', true)),
                'create_by' => htmlspecialchars($this->input->post('create_by', true)),
            ];

            if (!$this->db->insert('tbm_karyawan', $data)) {;
                $this->db->error();
                $this->session->set_flashdata('message', "<script>Swal.fire(
					'Gagal',
					'NIK Tersebut Telah Digunakan!',
					'error'
				)</script>");
                header('Location: ' . base_url() . 'home/datakaryawan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                header('Location: ' . base_url() . 'home/datakaryawan');
            }
        }
    }


    public function datakendaraan()
    {

        $this->db->db_debug = false;
        $data['login'] = $this->login;
        $data['title'] = 'Data Kendaraan';

        $this->inputRequired('nik', 'NIK');
        $this->inputRequired('plant', 'Plant');
        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('no_kendaraan', 'No Kendaraan');
        $this->inputRequired('jenis_kendaraan', 'Jenis Kendaraan');

        if ($this->form_validation->run() == false) {
            $data['tbm_kendaraan'] = $this->M_Visual->getDatakendaraan();

            $this->load->view('home/datakendaraan', $data);
        } else {
            $nik_karyawan = htmlspecialchars($this->input->post('nik', true));
            $cek_karyawan = $this->M_Visual->cekDataKaryawan($nik_karyawan);
            if ($nik_karyawan == $cek_karyawan->nik) {
                $data = [
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'plant' => htmlspecialchars($this->input->post('plant', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'no_sim' => htmlspecialchars($this->input->post('no_sim', true)),
                    'create_by' => htmlspecialchars($this->input->post('create_by', true)),
                    'no_kendaraan' => htmlspecialchars(str_replace(' ', '', $this->input->post('no_kendaraan', true))),
                    'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis_kendaraan', true))
                ];

                if (!$this->db->insert('tbm_kendaraan', $data)) {;
                    $this->db->error();
                    $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Gagal',
                        'Nomor Kendaraan Tersebut Sudah Digunakan!',
                        'error'
                    )</script>");
                    header('Location: ' . base_url() . 'home/datakendaraan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('home/datakendaraan');
                }
            } else {
                $this->session->set_flashdata('message', "<script>Swal.fire(
                    'NIK Tidak Terdaftar',
                    'Silahkan Daftarkan Karyawan Terlebih Dahulu, Di Data Karyawan!',
                    'error'
                )</script>");
                redirect('home/datakendaraan');
            }
        }
    }

    public function datakendaraanedit($no_kendaraan)
    {
        $data['login'] = $this->login;

        $data['title'] = 'Data Kendaraan';
        $data['queryKendaraan'] = $this->M_Visual->getDataById('tbm_kendaraan', 'no_kendaraan', $no_kendaraan);
        $this->load->view('home/datakendaraanedit', $data);
    }
    public function datakendaraaneditaction()
    {
        $this->db->db_debug = false;

        $this->inputRequired('nik', 'NIK');
        $this->inputRequired('plant', 'Plant');
        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('no_sim', 'Nomor SIM');
        $this->inputRequired('no_kendaraan', 'No Kendaraan');
        $this->inputRequired('jenis_kendaraan', 'Jenis Kendaraan');

        if ($this->form_validation->run() == false) {
            header('Location: ' . base_url() . '/home/datakendaraanedit/' . $this->input->post('no_kendaraan_lama'));
        } else {
            $nik_karyawan = htmlspecialchars($this->input->post('nik', true));
            $cek_karyawan = $this->M_Visual->cekDataKaryawan($nik_karyawan);
            if ($nik_karyawan == $cek_karyawan->nik) {
                $update_data = [
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'plant' => htmlspecialchars($this->input->post('plant', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'no_sim' => htmlspecialchars($this->input->post('no_sim', true)),
                    'create_by' => htmlspecialchars($this->input->post('create_by', true)),
                    'no_kendaraan' => htmlspecialchars(str_replace(' ', '', $this->input->post('no_kendaraan', true))),
                    'jenis_kendaraan' => htmlspecialchars($this->input->post('jenis_kendaraan', true))
                ];
                $where = [
                    'no_kendaraan' => $this->input->post('no_kendaraan_lama'),
                ];
                if (!$this->db->update('tbm_kendaraan', $update_data, $where)) {;
                    $this->db->error();
                    $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Gagal',
                        'Nomor Kendaraan Sudah Digunakan!',
                        'error'
                        )</script>");
                    header('Location: ' . base_url() . 'home/datakendaraanedit/' . $this->input->post('no_kendaraan_lama'));
                } else {
                    $this->session->set_flashdata('message', "<script>Swal.fire(
                        'Berhasil',
                        'Data Berhasil Diubah!',
                        'success'
                        )</script>");
                    header('Location: ' . base_url() . '/home/datakendaraanedit/' . $this->input->post('no_kendaraan'));
                }
            } else {

                $this->session->set_flashdata('message', "<script>Swal.fire(
                    'NIK Tidak Terdaftar',
                    'Silahkan Daftarkan Karyawan Terlebih Dahulu, Di Data Karyawan!',
                    'error'
                )</script>");
                header('Location: ' . base_url() . 'home/datakendaraanedit/' . $this->input->post('no_kendaraan_lama'));
            }
        }
    }






    public function generateqrcode($no_kendaraan)
    {
        $data['login'] = $this->login;
        $data['title'] = 'Qr Code';
        $queryKendaraan = $this->M_Visual->getQRcode($no_kendaraan);
        $data = array('querykendaraan' => $queryKendaraan);
        $this->load->view('home/generateqrcode', $data);
    }



    public function dataactivitycheckOut($no_kendaraan)
    {
        $queryactivity = $this->M_Visual->getActivityByNomorKendaraan($no_kendaraan);

        $ArrUpdate = array(
            'activity_datetime_out' => date('Y-m-d H:i:s'),
            'status' => 'CHECK OUT',
            'expiration' => 'MANUAL CHECK OUT',
        );
        $ArrWhere = array(
            'id' => $queryactivity->id,
        );
        $this->db->update('tbm_activity', $ArrUpdate, $ArrWhere);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Nomor Kendaraan <b>' . $no_kendaraan . '</b> Berhasil Check Out!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect('home');
    }

    public function inputdataactivity()
    {
        $no_kendaraan = $this->input->post('no_kendaraan');
        $lokasi_input = $this->input->post('lokasi_input');
        $query_kendaraan = $this->M_Visual->scanbarcode($no_kendaraan);
        $query_nik = $this->M_Visual->scanbarcodenik($no_kendaraan);
        $query_activity = $this->M_Visual->getActivityByNomorKendaraan($no_kendaraan);
        $query_activity_nik = $this->M_Visual->getActivityByNIK($no_kendaraan);
        $cek_karyawan = $this->M_Visual->getDataById('tbm_karyawan', 'nik', $query_activity->nik);
        $cek_kendaraan = $this->M_Visual->getDataById('tbm_kendaraan', 'no_kendaraan', $no_kendaraan);
        if ($query_kendaraan != NULL) {
            if ($query_activity->status == 'CHECK IN' && time() >= intval($query_activity->expiration) - 61140) {
                $ArrUpdate = array(
                    'activity_datetime_out' => date('Y-m-d H:i:s'),
                    'status' => 'CHECK OUT',
                    'expiration' => 'MANUAL CHECK OUT',
                );
                $ArrWhere = array(
                    'id' => $query_activity->id,
                );
                $this->db->update('tbm_activity', $ArrUpdate, $ArrWhere);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Nomor Kendaraan <b>' . $no_kendaraan . '</b> Berhasil Check Out!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
            } elseif ($query_activity->status == 'CHECK IN' && time() <= intval($query_activity->expiration) - 61140) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Gagal!</strong> Nomor Kendaraan <strong>' .  $no_kendaraan . '</strong> (CHECK IN) Kurang Dari 1 Menit<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
            } else {
                $ArrInsert = array(
                    'id' => $query_kendaraan->id,
                    'no_kendaraan' => $query_kendaraan->no_kendaraan,
                    'jenis_kendaraan' => $query_kendaraan->jenis_kendaraan,
                    'nik' => $query_kendaraan->nik,
                    'nama' => $query_kendaraan->nama,
                    'departemen' => $query_kendaraan->departemen,
                    'plant' => $this->input->post('plant'),
                    'create_by' => $this->input->post('create_by'),
                    'activity_datetime' => date('Y-m-d H:i:s'),
                    'expiration' => time() + 61200, //satuannya 60 Detik, jadi 17 JAM = 61200 Detik

                );
                $this->db->insert('tbm_activity', $ArrInsert);
                // $this->session->set_flashdata('message', "<script>Swal.fire(
                // 	'Berhasil',
                // 	'Nomor Kendaraan <b>$query_activity->no_kendaraan</b> Berhasil Check In!',
                // 	'success'
                // )</script>");
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Kendaraan Dengan Nomor <b>' . $no_kendaraan . '</b> Berhasil Check In!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
            }
        } elseif ($query_activity->status == 'CHECK IN' && $query_kendaraan == NULL) {
            $ArrUpdate = array(
                'activity_datetime_out' => date('Y-m-d H:i:s'),
                'status' => 'CHECK OUT',
                'expiration' => 'MANUAL CHECK OUT',
            );
            $ArrWhere = array(
                'id' => $query_activity->id,
            );
            $this->db->update('tbm_activity', $ArrUpdate, $ArrWhere);
            // $this->session->set_flashdata('message', "<script>Swal.fire(
            //     'Berhasil Check Out',
            //     'Nomor Kendaraan <b>$query_activity->no_kendaraan</b> Berhasil Check Out!',
            //     'success'
            // )</script>");
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> Kendaraan Dengan Nomor <b>' . $no_kendaraan . '</b> Berhasil Check Out!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
        } elseif ($cek_kendaraan != NULL) {
            // $this->session->set_flashdata('message', "<script>Swal.fire(
            //     'Gagal',
            //     'Nomor Kendaraan <b>$no_kendaraan</b> Terdaftar, Namun Data Karyawan Belum Dilengkapi!',
            //     'error'
            // )</script>");
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Gagal!</strong> Kendaraan Dengan Nomor <b>' . $no_kendaraan . '</b> Terdaftar, Namun Data Karyawan Belum Dilengkapi!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
        } elseif ($cek_karyawan == NULL) {
            // $this->session->set_flashdata('message', "<script>Swal.fire(
            //     'Gagal',
            //     'Tidak Ada Karyawan Yang Memiliki Nomor Kendaraan <b>$no_kendaraan</b>!',
            //     'error'
            // )</script>");
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Gagal!</strong> Tidak Ada Karyawan Yang Memiliki Kendaraan Dengan Nomor <b>' . $no_kendaraan . '</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            $lokasi_input == 'dashboard' ? redirect('home') : redirect('home/dataactivity');
        }
    }


    public function datakaryawanedit($nik)
    {
        $data['login'] = $this->login;

        $data['title'] = 'Data Karyawan';
        $data['queryKaryawan'] = $this->M_Visual->getDataById('tbm_karyawan', 'nik', $nik);
        $this->load->view('templates/header', $data);
        $this->load->view('home/datakaryawanedit', $data);
        $this->load->view('templates/footer');
    }
    public function datakaryawaneditaction()
    {
        $this->db->db_debug = false;

        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('nik', 'NIK');
        $this->inputRequired('departemen', 'Departemen');
        $this->inputRequired('plant', 'Plant');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<script>Swal.fire(
				'Gagal',
				'Pastikan Semua Data Diisi!',
				'error'
			    )</script>");
            header('Location: ' . base_url() . '/home/datakaryawanedit/' . $this->input->post('nik'));
        } else {

            $update_data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'departemen' => htmlspecialchars($this->input->post('departemen', true)),
                'plant' => htmlspecialchars($this->input->post('plant', true)),
                'create_by' => htmlspecialchars($this->input->post('create_by', true))
            ];
            $where = [
                'nik' => $this->input->post('nik_lama'),
            ];
            if (!$this->db->update('tbm_karyawan', $update_data, $where)) {;
                $this->db->error();
                $this->session->set_flashdata('message', "<script>Swal.fire(
					'Gagal',
					'NIK Sudah Digunakan!',
					'error'
				    )</script>");
                header('Location: ' . base_url() . 'home/datakaryawanedit/' . $this->input->post('nik_lama'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data Berhasil Diubah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('home/datakaryawan');
            }
        }
    }

    public function datakaryawanautofill($plant)
    {
        if (isset($_GET['term'])) {
            $result = $this->M_Visual->getKaryawanAutoFill($plant, $_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    // $arr_result[] = $row->materialDesc;
                    $arr_result[] = array(
                        'label' => $row->nik . ' (' . $row->nama . ')',
                        'nik' => $row->nik,
                        'nama' => $row->nama,
                        'plant' => $row->plant,

                    );
                echo json_encode($arr_result);
            }
        }
    }
    public function profil($username)
    {
        $data['login'] = $this->login;
        $data['users'] = $this->M_Visual->getUser($username);
        $data['title'] = 'Profil Saya';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('home/profil', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit_profil()
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

        $this->inputRequired('nama', 'Nama');
        $this->inputRequired('password', 'Password');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<script>Swal.fire(
				'Gagal',
				'Pastikan Semua Data Diisi!',
				'error'
			    )</script>");
            header('Location: ' . base_url() . '/home/profil/' . $username_lama);
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
                    'photo' => $filename,
                    'created_by' => htmlspecialchars($this->input->post('created_by', true)),
                ];
            } else {
                $update_data = [
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
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
                header('Location: ' . base_url() . '/home/profil/' . $username_lama);
            } else {
                $this->session->set_userdata('photo', $filename);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('password', $password);
                $this->session->set_flashdata('message', "<script>Swal.fire(
                    'Berhasil',
                    'Data Berhasil Diubah!',
                    'success'
                    )</script>");
                header('Location: ' . base_url() . '/home/profil/' . $username);
            }
        }
    }
}
