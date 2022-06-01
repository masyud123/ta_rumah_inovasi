<?php 
class Model_bidang2 extends CI_Model{
    public function get_subevent(){
        return $this->db->get('subevent');
    } 

    public function get_bidang(){
        return $this->db->get('bidang');
    }

    public function get_bidang_aktif($id_subevent){
        $this->db->select('*');
        $this->db->from('bidang');
        $this->db->where('id_subevent', $id_subevent);
        $this->db->where('status', 1);
        return $this->db->get();
    }

    public function get_bidang_tdk_aktif($id_subevent){
        $this->db->select('*');
        $this->db->from('bidang');
        $this->db->where('id_subevent', $id_subevent);
        $this->db->where('status', 0);
        return $this->db->get();
    }
}