<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "Libraries/Server.php";

class Mahasiswa extends CI_Controller
{
    function service_get()
    {
        $this->load->model("Mmahasiswa");
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
