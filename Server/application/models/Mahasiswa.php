<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Model {

	public function ambil_data()
	{


		$this->db->select("id AS id_mhs,
		NPM AS npm_mhs,
		nama AS nama_mhs,
		telepon AS telepon_mhs,
		jurusan AS jurusan_mhs");

		$this->db->from("tb_mahasiswa");
        $this->db->order_by("NPM");

        $query = $this->db->get()->result();

        return $query;
	}

	//buat fungsi hapus data
	function hapus_data($token)
	{
		//cek apakah npm ada/tidak
		$this->db->select("NPM");
		$this->db->from("tb_mahasiswa");
		$this->db->where("TO_BASE64(NPM) = '$token'");
		$query = $this->db->get()->result();
		//jika npm ditemukan
		if(count($query) == 1)
		{
			//hapus data
			$this->db->where("TO_BASE64(NPM) = '$token'");
			$this->db->delete("tb_mahasiswa");
			$hasil = 1;
		}
		//jika npm tidak ditemukan
		else
		{
			$hasil = 0;
		}
		return $hasil;
	}

	function simpan_data($NPM,$nama,$telepon,$jurusan,$token)
	{
		//cek apakah npm ada/tidak
		$this->db->select("NPM");
		$this->db->from("tb_mahasiswa");
		$this->db->where("TO_BASE64(NPM) = '$token'");
		$query = $this->db->get()->result();
		//jika npm tidak ditemukan
		if(count($query) == 0)
		{
			//isi nilai untuk disimpan
			$data = array(
				"NPM" => $NPM,
				"nama" => $nama,
				"telepon" => $telepon,
				"jurusan" => $jurusan,
			);
			//simpan data
			$this->db->insert("tb_mahasiswa",$data);
			$hasil = 0;
		}
		else
		{
			$hasil = 1;
		}
		
		return $hasil;
	}

	function ubah_data($NPM,$nama,$telepon,$jurusan,$token)
	{
		//cek apakah npm ada/tidak
		$this->db->select("NPM");
		$this->db->from("tb_mahasiswa");
		$this->db->where("TO_BASE64(NPM) != '$token' AND NPM = '$NPM'");
		$query = $this->db->get()->result();
		//jika npm tidak ditemukan
		if(count($query) == 0)
		{
			//isi nilai untuk disimpan
			$data = array(
				"NPM" => $NPM,
				"nama" => $nama,
				"telepon" => $telepon,
				"jurusan" => $jurusan,
			);
			//ubah data
			$this->db->where("TO_BASE64(NPM) = '$token'");
			$this->db->update("tb_mahasiswa",$data);
			$hasil = 0;
		}
		else
		{
			$hasil = 1;
		}
		
		return $hasil;
	}
}
