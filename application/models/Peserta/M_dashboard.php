<?php

class M_dashboard extends CI_Model {

  public function get_detail_member($member_id) {
    return $this->db->get_where('detail_member', ['id' => $member_id])->result();
  }

  public function get_progress_member($program_period_id) {
    return $this->db->select('program_progress.*, program.name AS program, detail_mentor.name AS mentor')
                    ->from('program_progress')
                    ->join('detail_member', 'detail_member.program_period_id = program_progress.program_period_id')
                    ->join('program', 'program.id = program_progress.program_id')
                    ->join('detail_mentor', 'detail_mentor.id = program_progress.mentor_id')
                    ->where('program_progress.program_period_id', $program_period_id)
                    ->order_by('program_progress.id', 'DESC')
                    ->get()
                    ->result();
  } 

}