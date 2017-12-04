<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	
	public function getMahasiswa(){
		$q =$this->db->get('tb_mahasiswa');

		if($q->num_rows()>0){
			$data['result'] = true ;
			$data['pesan'] = 'Data Ada';
			$data['data'] = $q->result();
		}
		else{
			$data['result'] = false ;
			$data['pesan'] = 'Data, tidak ada';
		}

		echo json_encode($data);
	}

	public function getDosen(){
		$q =$this->db->get('tb_dosen');

		if($q->num_rows()>0){
			$data['result'] = true ;
			$data['pesan'] = 'Data Ada';
			$data['data'] = $q->result();
		}
		else{
			$data['result'] = false ;
			$data['pesan'] = 'Data, tidak ada';
		}

		echo json_encode($data);
	}


	public function getMatkul(){
		$q =$this->db->get('tb_matkul');

		if($q->num_rows()>0){
			$data['result'] = true ;
			$data['pesan'] = 'Data Ada';
			$data['data'] = $q->result();
		}
		else{
			$data['result'] = false ;
			$data['pesan'] = 'Data, tidak ada';
		}

		echo json_encode($data);
	}


	public function daftar(){ 
$data = array();
$nim = $this->input->post('nim');
$nama = $this->input->post('nama_mahasiswa');
$jurusan = $this->input->post('jurusan');
$alamat = $this->input->post('alamat');
$nilai  = $this->input->post('nilai');

$this->db->where('nim', $nim);

$q = $this->db->get('tb_mahasiswa');

if($q->num_rows() > 0) {
$data['result'] = 'false';
$data['msg'] = 'Data telah tersedia';
}else{	
$simpan = array();

$simpan['nim'] = ($nim);
$simpan['nama_mahasiswa'] = ($nama);
$simpan['jurusan'] = $jurusan;
$simpan['alamat'] = $alamat;
$simpan['nilai'] = $nilai;

$status = $this->db->insert('tb_mahasiswa',$simpan);

if($status){	
$data['result'] = 'true';
$data['msg'] = 'data berhasil disimpan';

}else{
$data['result'] = 'false';
$data['msg'] = 'data gagal disimpan, silahkan coba kembali';
}
}
echo json_encode($data);
}

public function daftar2(){ 
$data = array();
$nim = $this->input->post('nim');
$nip = $this->input->post('nip');
$nama = $this->input->post('nama_dosen');
$alamat = $this->input->post('alamat');
$hp  = $this->input->post('hp');
$mata  = $this->input->post('mata_kuliah');

$this->db->where('nip', $nip);

$q = $this->db->get('tb_dosen');

if($q->num_rows() > 0) {
$data['result'] = 'false';
$data['msg'] = 'Data telah tersedia';
}else{	
$simpan = array();

$simpan['nim'] = ($nim);
$simpan['nip'] = ($nip);
$simpan['nama_dosen'] = ($nama);
$simpan['mata_kuliah'] = $mata;
$simpan['alamat'] = $alamat;
$simpan['hp'] = $hp;

$status = $this->db->insert('tb_dosen',$simpan);

if($status){	
$data['result'] = 'true';
$data['msg'] = 'data berhasil disimpan';

}else{
$data['result'] = 'false';
$data['msg'] = 'data gagal disimpan, silahkan coba kembali';
}
}
echo json_encode($data);
}

public function daftar3(){ 
$data = array();
$id = $this->input->post('id_matkul');
$nama = $this->input->post('nama_matkul');
$jumlah = $this->input->post('jumlah_sks');

$this->db->where('id_matkul', $id);

$q = $this->db->get('tb_matkul');

if($q->num_rows() > 0) {
$data['result'] = 'false';
$data['msg'] = 'Data telah tersedia';
}else{	
$simpan = array();

$simpan['jumlah_sks'] = ($jumlah);
$simpan['id_matkul'] = ($id);
$simpan['nama_matkul'] = ($nama);


$status = $this->db->insert('tb_matkul',$simpan);

if($status){	
$data['result'] = 'true';
$data['msg'] = 'data berhasil disimpan';

}else{
$data['result'] = 'false';
$data['msg'] = 'data gagal disimpan, silahkan coba kembali';
}
}
echo json_encode($data);
}



	// //menambahkan method baru untuk input data
	// public function input_data_karyawan(){

	// 	//membuat data array
	// 	$data = array();

	// 	//membuat variable untuk menampung data english dan indonesia
	// 	$id_employee = $this->input->post('id_employee');
	// 	$nama_employee = $this->input->post('nama_employee');
	// 	$posisi = $this->input->post('posisi');
	// 	$gaji = $this->input->post('gaji');
	// 	$alamat = $this->input->post('alamat');
	// 	$masuk = $this->input->post('tanggal_masuk');

	// 	//membuat variable simpan sebagai data array
	// 	$simpan = array();

	// 	$simpan['id_employee'] = $id_employee;
	// 	$simpan['nama_employee'] = $nama_employee;
	// 	$simpan['posisi'] = $posisi;
	// 	$simpan['gaji'] = $gaji;
	// 	$simpan['alamat'] = $alamat;
	// 	$simpan['tanggal_masuk'] = $masuk;

	// 	//membuat variable status untuk mengecek apakah berhasil simpan atau tidak
	// 	$status = $this->db->insert('tb_employee', $simpan);

	// 	//apabila kondisi status nya benar
	// 	if($status){
	// 		//data nya keluar result true
	// 		$data['result'] = 'true';
	// 		$data['msg'] = 'Data berhasil di simpan';

	// 	}else{
	// 		//kondisi salah
	// 		$data['result'] = 'false';
	// 		$data['msg'] = 'Simpan gagal, silahkan coba lagi';
	// 	}

	// 	//melakukan encode data json
	// 	echo json_encode($data);
	// }
}
