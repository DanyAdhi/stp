<?php

class M_periode extends CI_Model {

  public function get_all_period() {
    return $this->db->select('*')
                ->from('program_period')
                ->order_by('id', 'DESC')
                ->get()
                ->result();
  }

  public function get_one_period($id) {
    return $this->db->select('program_period.*, COUNT(detail_member.id) AS total_user')
                    ->from('program_period')
                    ->join('detail_member', 'detail_member.program_period_id = program_period.id', 'left')
                    ->where('program_period.id', $id)
                    ->group_by('program_period.id')
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

  public function save_period($data) {
    $this->db->insert('program_period', $data);
  }

  public function update_period($id, $data) {
    $this->db->update('program_period', $data, ['id' => $id]);
  }

  public function delete_period($id) {
    $this->db->delete('program_period', ['id' => $id]);
  }

}