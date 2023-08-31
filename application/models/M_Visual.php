<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Visual extends CI_Model
{
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getDataById($table, $column_name, $where)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($column_name, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getActivityByCheckIn()
    {
        $this->db->select("*");
        $this->db->from("tbm_activity");
        $this->db->order_by("id", "desc");
        $this->db->where("status", "CHECK IN");
        $query = $this->db->get();
        return $query->result();
    }
    public function rowActivityByCheckIn($jenis_kendaraan)
    {
        $this->db->select("*");
        $this->db->from("tbm_activity");
        $this->db->order_by("id", "desc");
        $this->db->where("status", "CHECK IN");
        $this->db->where("jenis_kendaraan", $jenis_kendaraan);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getKaryawanAutoFill($plant, $title)
    {
        $this->db->select("*");
        $this->db->from('tbm_karyawan');
        $this->db->where('plant', $plant);
        $this->db->like('nik', $title);
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    public function getKaryawanTbm()
    {
        $this->db->select("*");
        $this->db->from("tbm_karyawan");
        $this->db->order_by("nik", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getKendaraanTbm()
    {
        $this->db->select("*");
        $this->db->from("tbm_kendaraan");
        $this->db->order_by("nik", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getActivityTbm()
    {
        $this->db->select("*");
        $this->db->from("tbm_activtiy");
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function cekDataKaryawan($nik)
    {
        $this->db->select("*");
        $this->db->from("tbm_karyawan");
        $this->db->where("nik", $nik);
        $query = $this->db->get();
        // $query = $this->db->last_query();
        return $query->row();
    }

    public function getActivityByNomorKendaraan($where)
    {
        $this->db->select("*");
        $this->db->from("tbm_activity");
        $this->db->where("no_kendaraan", $where);
        $this->db->order_by("id", "desc");
        $this->db->limit('1');
        $query = $this->db->get();
        // $query = $this->db->last_query();
        return $query->row();
    }

    public function exportActivityTbm($startdate, $enddate)
    {
        $this->db->select("*");
        $this->db->from("tbm_activity");
        $this->db->where("activity_datetime BETWEEN '$startdate' and '$enddate' ");
        $this->db->order_by("id", "asc");
        $query = $this->db->get();

        return $query->result();
    }

    function scanbarcode($nokendaraan)
    {
        $this->db->select('*');
        $this->db->from('tbm_kendaraan');
        $this->db->join('tbm_karyawan', 'tbm_karyawan.nik = tbm_kendaraan.nik');
        $this->db->where('no_kendaraan', $nokendaraan);
        $query = $this->db->get();
        return $query->row();
    }

    function getQRcode($no_kendaraan)
    {
        // $this->db->join('tbm_karyawan', 'tbm_karyawan.Nik = tbm_kendaraan.Nik')->where('no_kendaraan', $no_kendaraan);
        $this->db->where('no_kendaraan', $no_kendaraan);
        $query = $this->db->get('tbm_kendaraan');
        return $query->row();
    }

    public function getDataUser()
    {
        $this->db->select("*");
        $this->db->from("tbl_user");
        $this->db->order_by("create_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getDatakendaraan()
    {
        $this->db->select("*");
        $this->db->from("tbm_kendaraan");
        $this->db->order_by("create_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataActivity()
    {
        $this->db->select("*");
        $this->db->from("tbm_activity");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
}
