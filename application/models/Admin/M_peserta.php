<?php

class M_peserta extends CI_Model {

  public function get_all_peserta() {
    return $this->db->select('detail_member.*')
                    ->from('detail_member')
                    ->join('program_period', 'program_period.id = detail_member.program_period_id')
                    ->where('program_period.status', 'Aktif')
                    ->order_by('detail_member.id', 'DESC')
                    ->get()
                   ->result();
  }


  public function get_one_peserta($id) {
    return $this->db->select('detail_member.*')
                    ->from('detail_member')
                    ->where('id', $id)
                    ->get()
                    ->result();
  }

  public function get_period_active() {
    return $this->db->select('*')
                    ->from('program_period')
                    ->where('status', 'Aktif')
                    ->get()
                    ->result();
  }

  public function get_all_domicile() {
    return $this->db->get('regencies')->result();
  }

  public function save_user($data) {
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function save_detail_member($data) {
    $this->db->insert('detail_member', $data);
  }

  public function update_user($id, $data) {
    $this->db->update('users', $data , ['id' => $id]);
  }

  public function update_detail_member($id, $data) {
    $this->db->update('detail_member', $data , ['id' => $id]);
  }

  public function delete_user($user_id) {
    $this->db->delete('users', ['id' => $user_id]);
  }

  public function delete_member($member_id) {
    $this->db->delete('detail_member', ['id' => $member_id]);
  }


  // get peserta yang telah menyelesaikan program
  public function get_peserta_done() {
    return $this->db->select('detail_member.*')
                    ->from('detail_member')
                    ->join('program_period', 'program_period.id = detail_member.program_period_id')
                    ->where('program_period.status', 'Selesai')
                    ->order_by('detail_member.id', 'DESC')
                    ->get()
                   ->result();
  }

}