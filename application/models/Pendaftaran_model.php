<?php
class pendaftaran_model extends CI_model
{
    public function pendaftaranmodel()
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'namalengkap' => htmlspecialchars($this->input->post('namalengkap', true)),
            'tempatlahir' => htmlspecialchars($this->input->post('tempatlahir', true)),
            'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
            'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'namaort' => htmlspecialchars($this->input->post('namaort', true)),
            'domisili' => htmlspecialchars($this->input->post('domisili', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'telpon' => htmlspecialchars($this->input->post('telpon', true)),
            'email' => $this->session->userdata('email')
        ];
        $this->db->insert('pendaftaran', $data);
    }

    public function biodatamodel()
    {
        $data = [
            'tempatlahir' => htmlspecialchars($this->input->post('tempatlahir', true)),
            'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
            'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'namaort' => htmlspecialchars($this->input->post('namaort', true)),
            'domisili' => htmlspecialchars($this->input->post('domisili', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'telpon' => htmlspecialchars($this->input->post('telpon', true)),
            'email' => $this->session->userdata('email')
        ];

        $this->db->set($data);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('pendaftaran');
    }

    public function GetbiodataById($id)
    {
        return $this->db->get_where('pendaftaran', ['email' => $id])->row_array();
    }
}
