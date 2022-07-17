<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_babinsa extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_babinsa');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $data = array(
            'namamodule'     => "data_babinsa",
            'namafileview'     => "v_data_babinsa",
            'title'      => "Data Babinsa | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Data_babinsa->tampilData(),
            //Data Wilayah
            'joinWilayah' => $this->M_Data_babinsa->joinWilayah(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah()
    {
        $this->M_Data_babinsa->tambah();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_babinsa');
    }

    public function edit()
    {
        $this->M_Data_babinsa->edit();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_babinsa');
    }

    public function hapus()
    {
        $this->M_Data_babinsa->hapus();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_babinsa');
    }
}
