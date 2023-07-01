<?php

class M_profile extends CI_Model {

  public function get_profile($id) {
    return $this->db->select('*')
                    ->from('detail_member')
                    ->where('id', $id)
                    ->get()
                    ->result();
  }

  public function get_user_by_id($id) {
    return $this->db->select('*')
                    ->from('users')
                    ->where('id', $id)
                    ->get()
                    ->result();
  }


  public function update_password($id, $password) {
    $this->db->update('users', ['password' => $password], ['id' => $id]);
  }

}