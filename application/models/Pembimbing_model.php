<?php
class pembimbing_model extends CI_model
{
    public function getAllpembimbing()
    {
        // $this->db->select('*');
        // $this->db->from('pembimbing');
        // $this->db->join('jadwalprogram', 'jadwalprogram.id_jprogram = pembimbing.id_jprogram', 'left');

        // return $this->db->get()->result_array();
        return $this->db->get('pembimbing')->result_array();
    }

    public function pembimbing()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'tempatlahir' => htmlspecialchars($this->input->post('tempatlahir', true)),
            'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
            'kontak' => htmlspecialchars($this->input->post('kontak', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'program' => htmlspecialchars($this->input->post('program', true))

        ];
        $this->db->insert('pembimbing', $data);
    }

    public function editpembimbing()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'tempatlahir' => htmlspecialchars($this->input->post('tempatlahir', true)),
            'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
            'kontak' => htmlspecialchars($this->input->post('kontak', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'program' => htmlspecialchars($this->input->post('program', true))

        ];

        $id = $this->input->post('id_pembimbing', true);
        $editpembimbing = $this->input->post('pembimbing', true);

        $this->db->where('id_pembimbing', $id)->update('pembimbing', $data);
    }


    public function hapuspembimbing($id)
    {
        $this->db->delete('pembimbing', ['id_pembimbing' => $id]);
    }

    public function GetPembimbingById($id)
    {
        return $this->db->get_where('pembimbing', ['id_pembimbing' => $id])->row_array();
    }
}
