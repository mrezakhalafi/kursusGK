<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    function tambahSiswa($data)
    {
        $this->db->insert('siswa', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllSiswa()
    {
        $this->db->select("siswa.*, kelas.nama AS nama_kelas");
        $this->db->from("siswa");
        $this->db->join("kelas","kelas.id = siswa.kelas_id");
        // $this->db->order_by("siswa.nama","DESC");
        $data = $this->db->get()->result_array();
        
        return $data;
    }

    function ubahSiswa($data,$id){
        $this->db->where('id',$id);
        $this->db->update('siswa', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    function getSiswaByUserId($id){
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->where("user_id", $id);
        $data = $this->db->get()->result_array();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->where('id', $data[$i]['kelas_id']);
            $kelas = $this->db->get()->row_array();
            $data[$i]['kelas'] = $kelas;
        }


        return $data;
    }

    // function getAllSiswa(){
    //     $this->db->select("*");
    //     $this->db->from("siswa");
    //     $data = $this->db->get()->result_array();
    //     return $data;
    // }

}
