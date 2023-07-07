<?php

class M_progress extends CI_Model {

  public function get_active_period() {
    return $this->db->select('*')
                    ->from('program_period')
                    ->where('status', 'Aktif')
                    ->get()
                    ->result();
  }

  public function get_all_progress() {
    return $this->db->select('program_progress.*, detail_mentor.name AS mentor, program.name AS program')
                    ->from('program_progress')
                    ->join('detail_mentor', 'detail_mentor.id = program_progress.mentor_id')
                    ->join('program', 'program.id = program_progress.program_id')
                    ->get()
                    ->result();
  }

  public function get_all_program() {
    return $this->db->get('program')->result();
  }

  public function get_progress_by_filter($program_id, $start_date, $end_date) {
    return $this->db->select('program_progress.*, detail_mentor.name AS mentor, program.name AS program')
                    ->from('program_progress')
                    ->join('detail_mentor', 'detail_mentor.id = program_progress.mentor_id')
                    ->join('program', 'program.id = program_progress.program_id')
                    ->where('program_progress.program_id', $program_id)
                    ->where('program_progress.created_at >=', $start_date)
                    ->where('program_progress.created_at <=', $end_date.' 23:59:59')
                    ->get()
                    ->result();
  }

}



