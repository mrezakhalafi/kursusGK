<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function registrasi($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }
     function ubahUser($data,$id){
        $this->db->where('id',$id);
        $this->db->update('user', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    public function getDataUser($email)
    {
        $data = $this->db->get_where('user', ['email' => $email])->row_array();
        return $data;
    }

    public function getUserDetail($id)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("id", $id);
        $data = $this->db->get()->row_array();
        return $data;
    }
}
