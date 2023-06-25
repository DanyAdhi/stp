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

}