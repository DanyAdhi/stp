<?php

class M_jadwal extends CI_Model {

  public function get_all_jadwal() {
    return $this->db->select('program_schedule.*, program.name AS name, days.name AS day')
                    ->from('program_schedule')
                    ->join('detail_mentor', 'detail_mentor.id = program_schedule.mentor_id')
                    ->join('program', 'program.id = program_schedule.program_id')
                    ->join('days', 'days.id = program_schedule.days_id')
                    ->order_by('days_id', 'ASC')
                    ->order_by('start_time', 'ASC')
                    ->get()
                    ->result();
  } 

}