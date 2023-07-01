<?php

class M_pembimbing extends CI_Model {

  public function get_all_pembimbing() {
    return $this->db->select('detail_mentor.*, program.name AS program')
                    ->from('users')
                    ->join('detail_mentor', 'detail_mentor.user_id = users.id')
                    ->join('program', 'program.id = detail_mentor.program_id')
                    ->where('users.role_id', 3)
                    ->order_by('detail_mentor.name', 'ASC')
                    ->get()
                    ->result();
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

}