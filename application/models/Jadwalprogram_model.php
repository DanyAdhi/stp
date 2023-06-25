<?php
class jadwalprogram_model extends CI_model
{
    public function getAlljprogram()
    {
        // $this->db->select('*');
        // $this->db->from('jadwalprogram');
        // $this->db->join('pembimbing', 'pembimbing.id_pembimbing = jadwalprogram.id_pembimbing', 'left');
        // return $this->db->get()->result_array();
        return $this->db->get('jadwalprogram')->result_array();
    }

    public function getprogram($limit, $start)
    {
        return $this->db->get('jadwalprogram', $limit, $start)->result_array();
    }


    // table jadwal program
    public function jprogram()
    {
        $data = [
            'program' => htmlspecialchars($this->input->post('program', true)),
            'hari' => htmlspecialchars($this->input->post('hari', true)),
            'jam' => htmlspecialchars($this->input->post('jam', true))

        ];
        $this->db->insert('jadwalprogram', $data);
    }

    public function editjprogram()
    {
        $data = [
            'program' => htmlspecialchars($this->input->post('program', true)),
            'hari' => htmlspecialchars($this->input->post('hari', true)),
            'jam' => htmlspecialchars($this->input->post('jam', true))
        ];

        $id = $this->input->post('id_jprogram', true);
        $editjprogram = $this->input->post('jadwalprogram', true);

        $this->db->where('id_jprogram', $id)->update('jadwalprogram', $data);
    }

    public function hapusjprogram($id)
    {
        $this->db->delete('jadwalprogram', ['id_jprogram' => $id]);
    }

    public function GetProgramById($id)
    {
        return $this->db->get_where('jadwalprogram', ['id_jprogram' => $id])->row_array();
    }
}
