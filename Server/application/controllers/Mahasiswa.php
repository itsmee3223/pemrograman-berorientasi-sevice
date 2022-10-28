<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Panggil Libraries Server
require APPPATH."libraries/Server.php";

class Mahasiswa extends Server {

    // serivice get
    function service_get()
    {
        //panggil model mmahasiswa
        $this->load->model("Mahasiswa","mdl",TRUE);
        //panggil method "ambil_data"
        $hasil = $this->mdl->ambil_data();
        //tampilkan hasil
        $this->response(array("mhs" => $hasil), 200);
    }
	
    // service delete
    function service_delete()
    {
        //panggil model mmahasiswa
        $this->load->model("Mmahasiswa","mdl",TRUE);
        //ambil parameter "NPM" sebagai dasar penghapusan data
        $token = $this->delete("NPM");
        //panggil method "hapus data"
        $hasil = $this->mdl->hapus_data(base64_encode($token));
        //jika data mahasiswa berhasil dihapus
        if($hasil == 1)
        {
            //tampilkan hasil
            $this->response(array("status" => "Data Berhasil Dihapus"),200);
        }
        //jika data mahasiswa tidak berhasil dihapus
        else
        {
            //tampilkan hasil
            $this->response(array("status" => "Data Gagal Dihapus"),200);
        }
    }
    // service post
    function service_post()
    {
        //panggil model mahasiswa
        $this->load->model("Mmahasiswa","mdl",TRUE);
        //ambil dara dari parameter2
        $data = array(
            "NPM" => $this->post("NPM"),
            "nama" => $this->post("nama"),
            "telepon" => $this->post("telepon"),
            "jurusan" => $this->post("jurusan"),
        );


        //panggil method simpan data
        $hasil = $this->mdl->simpan_data($data["NPM"],$data["nama"],$data["telepon"],$data["jurusan"],base64_encode($data["NPM"]));
        //jika data mahasiswa tidak ditemukan
        if($hasil == 0)
        {
            $this->response(array("status" => "Data Berhasil Disimpan..."),200);
        }
        else
        {
            $this->response(array("status" => "Data gagal disimpan"),200);
        }
    }
    // service put
    function service_put()
    {
        //panggil model mmahasiswa
        $this->load->model("Mmahasiswa","mdl",TRUE);
        //ambil dara dari parameter2
        $data = array(
            "NPM" => $this->put("NPM"),
            "nama" => $this->put("nama"),
            "telepon" => $this->put("telepon"),
            "jurusan" => $this->put("jurusan"),
            "token" => base64_encode($this->put("token")),
        );

        //panggil method ubah data
        $hasil = $this->mdl->ubah_data($data["NPM"],$data["nama"],$data["telepon"],$data["jurusan"],$data["token"]);
        //jika data mahasiswa tidak ditemukan
        if($hasil == 0)
        {
            $this->response(array("status" => "Data Berhasil Diubah..."),200);
        }
        else
        {
            $this->response(array("status" => "Data gagal diubah"),200);
        }
    }    
}
