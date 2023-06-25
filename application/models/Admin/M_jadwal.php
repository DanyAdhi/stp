<?php

class M_jadwal extends CI_Model {

  public function get_all_jadwal() {
    return $this->db->select('program_schedule.*, program.name AS name,  detail_mentor.name AS mentor, days.name AS day')
                    ->from('program_schedule')
                    ->join('detail_mentor', 'detail_mentor.id = program_schedule.mentor_id')
                    ->join('program', 'program.id = program_schedule.program_id')
                    ->join('days', 'days.id = program_schedule.days_id')
                    ->order_by('days_id', 'ASC')
                    ->order_by('start_time', 'ASC')
                    ->get()
                    ->result();
  }

  public function get_one_jadwal($id) {
    $this->db->select('program_schedule.*, detail_mentor.name AS mentor');
    $this->db->from('program_schedule');
    $this->db->join('detail_mentor', 'detail_mentor.id = program_schedule.mentor_id');
    $this->db->join('program', 'program.id = program_schedule.program_id');
    $this->db->where('program_schedule.id', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_all_mentor() {
    return $this->db->get('detail_mentor')->result();
  }

  public function get_all_program() {
    return $this->db->get('program')->result();
  }

  public function get_all_day() {
    return $this->db->get('days')->result();
  }

  public function save_program_schedule($data) {
    $this->db->insert('program_schedule', $data);
  }

  public function update_program_schedule($id, $data) {
    $this->db->update('program_schedule', $data , ['id' => $id]);
  }

  public function delete_program_schedule($id) {
    $this->db->delete('program_schedule', ['id' => $id]);
  }

  public function get_mentor_by_program($program_id) {
    $this->db->select('detail_mentor.*');
    $this->db->from('detail_mentor');
    $this->db->where('detail_mentor.program_id', $program_id);
    return $this->db->get()->result();
  }
  

}