<?php
class pdf_model extends CI_model
{
    public function getAllpdf()
    {
        return $this->db->get('pendaftaran')->result_array();
    }

    public function getpdfById($id)
    {
        return $this->db->get_where('pendaftaran', ['id' => $id])->row_array();
    }
}
