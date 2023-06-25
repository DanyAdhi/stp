<?php
class profile_model extends CI_model
{
    public function getAllprofile()
    {
        return $this->db->get('user')->result_array();
    }

    public function editprofile()
    {
        $data = [
            'namalengkap' => htmlspecialchars($this->input->post('namalengkap', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => htmlspecialchars($this->input->post('image', true))
        ];
        $editprofile = $this->input->post('user', true);

        $this->db->where('email')->update('user', $data);
    }
}
