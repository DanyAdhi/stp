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


}



