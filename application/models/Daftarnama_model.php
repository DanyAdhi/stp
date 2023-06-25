<?php
class daftarnama_model extends CI_model
{
    public function getAllDaftarnama()
    {
        return $this->db->get('pendaftaran')->result_array();
    }

    public function editnama()
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
            'telpon' => htmlspecialchars($this->input->post('telpon', true))
        ];

        $id = $this->input->post('id', true);
        $editnama = $this->input->post('pendaftaran', true);

        $this->db->where('id', $id)->update('pendaftaran', $data);
    }

    // delete table
    public function hapusnama($id)
    {
        // $this->db->where('id',$id);
        $this->db->delete('pendaftaran', ['id' => $id]);
    }

    public function GetDaftarnmById($id)
    {
        return $this->db->get_where('pendaftaran', ['id' => $id])->row_array();
    }
}
