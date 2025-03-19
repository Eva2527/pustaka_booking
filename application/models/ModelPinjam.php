<?php 
if (!defined('BASEPATH')) exit('No Direct Script Access Allowed'); 
class ModelPinjam extends CI_Model { 
    //manip table pinjam 
    public function simpanPinjam($data) {
        $this->db->insert('pinjam', $data); 
    } 
    
    public function selectData($table, $where) { 
        return $this->db->get($table, $where); 
    } 
    
    public function updateData($data, $where) { 
        $this->db->update('pinjam', $data, $where); 
    } 
    
    public function deleteData($tabel, $where) { 
        $this->db->delete($tabel, $where);
    } 
    
      public function joinData() { 
        $this->db->select('pinjam.*, detail_pinjam.*, user.nama AS nama_pengguna, buku.judul_buku'); 
        $this->db->from('pinjam'); 
        $this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam = pinjam.no_pinjam', 'right'); 
        $this->db->join('user', 'user.id = pinjam.user_id', 'left'); 
        $this->db->join('buku', 'buku.id = detail_pinjam.buku_id', 'left'); 
        return $this->db->get()->result_array();
    }
    
    //manip tabel detai pinjam 
    public function simpanDetail($idbooking, $nopinjam) { 
        $sql = "INSERT INTO detail_pinjam (no_pinjam,buku_id) SELECT pinjam.no_pinjam,booking_detail.buku_id FROM pinjam, booking_detail WHERE booking_detail.booking_id=$idbooking AND pinjam.no_pinjam='$nopinjam'"; 
        $this->db->query($sql); 
    } 
     public function getPinjamByNo($no_pinjam) {
        return $this->db->get_where('pinjam', ['no_pinjam' => $no_pinjam])->row();
    }
}
