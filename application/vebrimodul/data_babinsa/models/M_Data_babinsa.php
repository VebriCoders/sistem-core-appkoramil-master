<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_babinsa extends CI_Model
{
    private $_table = "tbl_babinsa";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilData()
    {
        $this->db->select('tbl_babinsa.*,tbl_wilayah.nama_wilayah as nmwil, tbl_wilayah.kepala_desa as nmkdes')
            ->from('tbl_babinsa')
            // ->where('tbl_babinsa.id_wilayah', $id_wilayah)
            ->join('tbl_wilayah', 'tbl_babinsa.id_wilayah = tbl_wilayah.id')
            ->order_by('tbl_babinsa.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function joinWilayah()
    {
        $this->db->select('*')
            ->from('tbl_wilayah')
            // ->where('id_kodam', $id_kodam)
        ;
        $query = $this->db->get();
        return $query;
    }

    function tambah()
    {
        $data = [
            'id_wilayah' => $this->input->post('id_wilayah'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'foto' => $this->_uploadImage(),
            'pangkat' => $this->input->post('pangkat'),
            'alamat' => $this->input->post('alamat'),
            'active' => $this->input->post('active'),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table, $data);
    }

    function edit()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'id_wilayah' => $this->input->post('id_wilayah'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'foto' => $this->_uploadImage(),
                'pangkat' => $this->input->post('pangkat'),
                'alamat' => $this->input->post('alamat'),
                'active' => $this->input->post('active'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'id_wilayah' => $this->input->post('id_wilayah'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'pangkat' => $this->input->post('pangkat'),
                'alamat' => $this->input->post('alamat'),
                'active' => $this->input->post('active'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }

    private function _deleteImagesLama($nm_images_lama)
    {
        if ($nm_images_lama != "default.jpg") {
            $filename = explode(".", $nm_images_lama)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_babinsa/$filename.*"));
        }
    }

    function hapus()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);
    }

    private function _deleteImage($id)
    {
        $data_foto = $this->getById($id);
        if ($data_foto->foto != "default.jpg") {
            $filename = explode(".", $data_foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_babinsa/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/foto_babinsa';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|';
        $config['file_name']            = "PHOTO_BABINSA-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
