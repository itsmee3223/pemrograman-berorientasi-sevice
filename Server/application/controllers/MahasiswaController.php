<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "Libraries/Server.php";

class MahasiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mahasiswa");
    }
    function index()
    {
        $data = $this->mahasiswa->ambil_data();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                'status' => 'success',
                'data' => $data
            )));
    }
    function service_delete()
    {
    }
    function service_post()
    {
    }
    function service_put()
    {
    }
}
