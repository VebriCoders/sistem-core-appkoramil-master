<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_wilayah extends CI_Model
{
    private $_table = "tbl_wilayah";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilData()
    {
        $this->db->select('tbl_wilayah.*,')
            ->from('tbl_wilayah')
            ->order_by('tbl_wilayah.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function tambah()
    {
        $data = [
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'desa' => $this->input->post('desa'),
            'foto_desa' => $this->_uploadImage(),
            'kepala_desa' => $this->input->post('kepala_desa'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'lokasi_koordinat' => $this->input->post('lokasi_koordinat'),
            'lokasi_iframe' => $this->input->post('lokasi_iframe'),
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
                'nama_wilayah' => $this->input->post('nama_wilayah'),
                'desa' => $this->input->post('desa'),
                'foto_desa' => $this->_uploadImage(),
                'kepala_desa' => $this->input->post('kepala_desa'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'lokasi_koordinat' => $this->input->post('lokasi_koordinat'),
                'lokasi_iframe' => $this->input->post('lokasi_iframe'),
                'active' => $this->input->post('active'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nama_wilayah' => $this->input->post('nama_wilayah'),
                'desa' => $this->input->post('desa'),
                'kepala_desa' => $this->input->post('kepala_desa'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'lokasi_koordinat' => $this->input->post('lokasi_koordinat'),
                'lokasi_iframe' => $this->input->post('lokasi_iframe'),
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
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_wilayah/$filename.*"));
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
        if ($data_foto->foto_desa != "default.jpg") {
            $filename = explode(".", $data_foto->foto_desa)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_wilayah/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/foto_wilayah';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|';
        $config['file_name']            = "PHOTO_DESA-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
