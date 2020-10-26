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
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$tanggal = $obj_date->format('Y-m-d');
		
		$select = "gk.*, ft.path_file, ft.path_file_thumb";
		$where = ['gk.deleted_at is null' => null, 'gk.id_talent' => 1];
		$table = 't_galeri_konten as gk';
		$join = [ 
			['table' => 't_file_talent as ft', 'on' => 'gk.id_t_file_talent = ft.id']
		];
		
		$galeri = $this->m_global->multi_row($select,$where,$table, $join, 'gk.urutan asc');

		/////////////////////////////
		
		$select = "vk.*, vt.path_video";
		$where = ['vk.deleted_at is null' => null, 'vk.id_talent' => 1];
		$table = 't_video_konten as vk';
		$join = [ 
			['table' => 't_video_talent as vt', 'on' => 'vk.id_t_video_talent = vt.id']
		];
		
		$video = $this->m_global->multi_row($select,$where,$table, $join, 'vk.urutan asc');

		/////////////////////////////

		$select = 't_harga.*, m_diskon.nama, m_diskon.besaran';
		$where = ['t_harga.deleted_at is null' => null, 't_harga.id_talent' => 1];
		$table = 't_harga';
		$join = [ 
			['table' => 'm_diskon', 'on' => 't_harga.id_m_diskon = m_diskon.id']
		];
		
		$harga = $this->m_global->multi_row($select,$where,$table, $join);
		
		foreach ($harga as $key => $value) {
			if($value->is_diskon) {
				// cek tanggal
				$tgl_akhir_diskon = $obj_date->createFromFormat('Y-m-d H:i:s', $value->tgl_akhir_diskon.' 23:59:59')->format('Y-m-d H:i:s');
				//jika harga normal
				if(strtotime($timestamp) > strtotime($tgl_akhir_diskon)) {
					$arr['harga'] = $value->nilai_harga;
					$arr['harga_txt'] = "Rp " . number_format($value->nilai_harga,0,',','.');
					$arr['jenis_harga'] = $value->jenis_harga;
					$arr['sisa_waktu_diskon'] = null;
				}else{
					$arr['harga'] = (float)$value->nilai_harga - ((float)$value->nilai_harga * (float)$value->besaran / 100);
					$arr['harga_txt'] = "Rp " . number_format($value->nilai_harga,0,',','.');
					$arr['jenis_harga'] = $value->jenis_harga;
					
					$datetime_akhir = new DateTime($tgl_akhir_diskon);
					$selisih = $obj_date->diff($datetime_akhir);
					$sisa_interval_diskon = $obj_date->modify('+'.$selisih->d.' day'.' '.'+'.$selisih->h.' hour'.' '.'+'.$selisih->i.' minute'.' '.'+'.$selisih->s.' second');
					
					$arr['sisa_waktu_diskon'] = $sisa_interval_diskon->format('Y/m/d H:i:s');
				}
			}else{
				$arr['harga'] = $value->nilai_harga;
				$arr['harga_txt'] = "Rp " . number_format($value->nilai_harga,0,',','.');
				$arr['jenis_harga'] = $value->jenis_harga;
				$arr['sisa_waktu_diskon'] = null;
			}

			$arr_harga[] = $arr;
		}

		//cek apakah diskon ?
		foreach ($harga as $keys => $vals) {
			if($value->is_diskon) {
				$is_diskon = true;
			}else{
				//jika tidak diskon set to false dan break
				$is_diskon = false;
				break;
			}
		}
		
		/**
		 * data passing ke halaman view content
		 */
		$data = [
			'galeri' => $galeri,
			'video' => $video,
			'harga' => $harga,
			'arr_harga' => $arr_harga,
			'is_diskon' => $is_diskon
		];

		$this->load->view('v_template', $data, FALSE);
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

	private function get_harga_teks($harga)
	{
		
	}

}
