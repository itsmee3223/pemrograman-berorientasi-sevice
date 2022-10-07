<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Model
{

    function ambil_data()
    {
        $this->db->from("tb_mahasiswa");
        $this->db->order_by("npm");

        $query = $this->db->get();

        return $query;
    }
}
