<?php

class M_pembimbing extends CI_Model {

  public function get_all_pembimbing() {
    $this->db->select('detail_mentor.*, program.name AS program');
    $this->db->from('users');
    $this->db->join('detail_mentor', 'detail_mentor.user_id = users.id');
    $this->db->join('program', 'program.id = detail_mentor.program_id');
    $this->db->where('users.role_id', 3);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_one_pembimbing($id) {
    return $this->db->select('detail_mentor.*, program.name AS program, COUNT(program_schedule.id) AS total_schedule')
                    ->from('users')
                    ->join('detail_mentor', 'detail_mentor.user_id = users.id')
                    ->join('program', 'program.id = detail_mentor.program_id')
                    ->join('program_schedule', 'program_schedule.mentor_id = detail_mentor.id', 'left')
                    ->where('users.role_id', 3)
                    ->where('detail_mentor.id', $id)
                    ->get()
                    ->result();
  }

  public function get_all_program() {
    return $this->db->get('program')->result();
  }

  public function save_user($data) {
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function save_detail_mentor($data) {
    $this->db->insert('detail_mentor', $data);
  }

  public function update_user($id, $data) {
    $this->db->update('users', $data , ['id' => $id]);
  }

  public function update_detail_mentor($id, $data) {
    $this->db->update('detail_mentor', $data , ['id' => $id]);
  }

  public function delete_user($id) {
    $this->db->delete('users', ['id' => $id]);
  }

  public function delete_mentor($id) {
    $this->db->delete('detail_mentor', ['id' => $id]);
  }

}