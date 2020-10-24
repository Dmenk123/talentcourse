<?php
//defined('BASEPATH ') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
	}

	public function index()
	{	
		$tahun = date('Y');
		$bulan = date('m');
		$hari = date('d');
		
		$select = "gk.*, ft.path_file, ft.path_file_thumb";
		$where = ['gk.deleted_at is null' => null, 'gk.id_talent' => 1];
		$table = 't_galeri_konten as gk';
		$join = [ 
			['table' => 't_file_talent as ft', 'on' => 'gk.id_t_file_talent = ft.id']
		];

		$galeri = $this->m_global->multi_row($select,$where,$table, $join, 'gk.urutan asc');
		//var_dump($galeri);exit;
		/**
		 * data passing ke halaman view content
		 */
		$data = [
			'galeri' => $galeri
		];

		$this->load->view('v_template', $data, FALSE);
	}

	public function checkout_reguler()
	{
		$kode_ref = $this->generate_kode_ref();
		var_dump($kode_ref);exit;
	}


	public function oops()
	{	
		$this->load->view('login/view_404');
	}

	public function bulan_indo($bulan)
	{
		$arr_bulan =  [
			1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
		];

		return $arr_bulan[(int) $bulan];
	}

	private function generate_kode_ref() {

		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
		);
	
		shuffle($chars);
	
		$num_chars = count($chars) - 1;
		$token = '';
	
		for ($i = 0; $i < 8; $i++){ // <-- $num_chars instead of $len
			$token .= $chars[mt_rand(0, $num_chars)];
		}
	
		return $token;
	}

}
