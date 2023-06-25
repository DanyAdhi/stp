<?php

class M_dashboard extends CI_Model {

  public function get_count_member() {
    return $this->db->select('detail_member.id')
                    ->from('detail_member')
                    ->join('program_period', 'program_period.id = detail_member.program_period_id')
                    ->where('program_period.status', 'Aktif')
                    ->get()
                    ->num_rows();
  }

  public function get_count_mentor() {
    return $this->db->get('detail_mentor')->num_rows();
  }

  public function get_count_archive_member() {
    return $this->db->select('detail_member.id')
                    ->from('detail_member')
                    ->join('program_period', 'program_period.id = detail_member.program_period_id')
                    ->where('program_period.status', 'Selesai')
                    ->get()
                    ->num_rows();
  }

}