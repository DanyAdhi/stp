<?php

class M_progress extends CI_Model {

  public function get_all_progress() {
    return $this->db->select('program_progress.*, detail_mentor.name AS mentor, program.name AS program')
                    ->from('program_progress')
                    ->join('detail_mentor', 'detail_mentor.id = program_progress.mentor_id')
                    ->join('program', 'program.id = program_progress.program_id')
                    ->order_by('id', 'DESC')
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

  public function get_one_progress($id) {
    return $this->db->get_where('program_progress', ['id' => $id])->result();
  }

  public function save_progress($data) {
    $this->db->insert('program_progress', $data);
  }

  public function update_progress($id, $data) {
    $this->db->update('program_progress', $data , ['id' => $id]);
  }

  public function delete_progress($id) {
    $this->db->delete('program_progress', ['id' => $id]);
  }


}



