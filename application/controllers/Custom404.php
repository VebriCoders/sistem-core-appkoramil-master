<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        // load base_url
        $this->load->helper('url');
    }

    public function index()
    {

        $website = $this->M_Setting->set_setting();
        $data = array(
            'title'      => "404 Page Not Found | " . $website['nama_website'],
            'website' => $website,
        );
        $this->output->set_status_header('404');
        $this->load->view('errors/custom/404_page', $data);
    }
}
