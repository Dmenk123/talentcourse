<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_harga extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') === false) {
			return redirect('login');
		}

		$this->load->model('t_harga');
		$this->load->model('m_global');
		$this->load->model('master_user/m_user');
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data_user = $this->m_user->get_by_id($id_user);

		/**
		 * data passing ke halaman view content
		 */
		$data = array(
			'title' => 'Pengelolaan Harga',
			'data_user' => $data_user
		);

		/**
		 * content data untuk template
		 * param (css : link css pada direktori assets/css_module)
		 * param (modal : modal komponen pada modules/nama_modul/views/nama_modal)
		 * param (js : link js pada direktori assets/js_module)
		 */
		$content = [
			'css' 	=> null,
			'modal' => 'modal_set_harga',
			'js'	=> 'set_harga.js',
			'view'	=> 'view_set_harga'
		];

		$this->template_view->load_view($content, $data);
	}

	public function list_harga()
	{
		$obj_date = new DateTime();
		$list = $this->t_harga->get_datatable();
		$data = array();
		$no =$_POST['start'];
		foreach ($list as $val) {
			$no++;
			$row = array();
			//loop value tabel db
			$row[] = $no;
			$row[] = $val->tipe_harga;
			$row[] = "Rp " . number_format($val->nilai_harga,0,',','.');
			$row[] = $val->nama_talent;
			$row[] = ($val->nama_diskon) ? $val->nama_diskon : '-';
			$row[] = ($val->masa_berlaku_diskon) ? $val->masa_berlaku_diskon.' Hari' : '-';
			$row[] = ($val->besaran) ? $val->besaran.'%' : '-';
			
			if ($val->is_diskon) {
				$str_aksi = '
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opsi</button>
						<div class="dropdown-menu">
							<button class="dropdown-item" onclick="stop_diskon(\'' . $val->id . '\')">
								<i class="la la-trash"></i> Stop Diskon
							</button>
				';
			}else{
				$str_aksi = '<div class="btn-group"><div class="dropdown-menu">';
			}
			
			$str_aksi .= '</div></div>';
			$row[] = $str_aksi;
			$data[] = $row;
		}//end loop

		$output = [
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->t_harga->count_all(),
			"recordsFiltered" => $this->t_harga->count_filtered(),
			"data" => $data
		];
		
		echo json_encode($output);
	}

	public function add_data()
	{
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$arr_valid = $this->rule_validasi();
		
		$id_talent = $this->input->post('talent');
		$jenis_harga = $this->input->post('jenis_harga');
		$harga = trim($this->input->post('harga'));
		$is_diskon = $this->input->post('is_diskon');
		$id_diskon = $this->input->post('diskon');
		$masa_berlaku = $this->input->post('masa_berlaku');
		
		if($is_diskon == '1') {
			$tgl_mulai_disc = $obj_date->createFromFormat('d/m/Y', $this->input->post('tgl_mulai_disc'))->format('Y-m-d');
			$tgl_akhir_disc = $obj_date->createFromFormat('d/m/Y', $this->input->post('tgl_mulai_disc'))->modify('+' . $masa_berlaku . ' day')->format('Y-m-d');
		}
		
		if ($arr_valid['status'] == FALSE) {
			echo json_encode($arr_valid);
			return;
		}

		$this->db->trans_begin();

		//ambil data existing
		$cek = $this->t_harga->get_by_condition("jenis_harga = '$jenis_harga' and id_talent = '$id_talent' and deleted_at is null", true);
		if($cek) {	
			//set deleted_at is null
			$this->t_harga->update(['id' => $cek->id], ['deleted_at' => $timestamp]);
		}

		$id = $this->t_harga->get_max_id();
		
		$datanya['id'] = $id;
		$datanya['jenis_harga'] = $jenis_harga;
		$datanya['nilai_harga'] = $harga;
		$datanya['id_talent'] = $id_talent;
		$datanya['created_at'] = $timestamp;

		if($is_diskon == '1') {
			$datanya['is_diskon'] = 1;
			$datanya['id_m_diskon'] = $id_diskon;
			$datanya['tgl_mulai_diskon'] = $tgl_mulai_disc;
			$datanya['tgl_akhir_diskon'] = $tgl_akhir_disc;
			$datanya['masa_berlaku_diskon'] = $masa_berlaku;
		}
		
		$insert = $this->t_harga->save($datanya);
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			$retval['status'] = false;
			$retval['pesan'] = 'Gagal setting harga';
		}else{
			$this->db->trans_commit();
			$retval['status'] = true;
			$retval['pesan'] = 'Sukses setting harga';
		}

		echo json_encode($retval);
	}

	/**
	 * isi kolom deleted at dengan datetime now()
	 * dan isi data baru sama persis tanpa diskon
	 */
	public function stop_diskon()
	{
		$id = $this->input->post('id');
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		
		//get old data
		$oldData = $this->t_harga->get_by_id($id);
		
		//sofdelete dulu yg lama
		$del = $this->t_harga->softdelete_by_id($id);

		//insert data baru
		$new_id = $this->t_harga->get_max_id();

		$datanew['id'] = $new_id;
		$datanew['jenis_harga'] = $oldData->jenis_harga;
		$datanew['nilai_harga'] = $oldData->nilai_harga;
		$datanew['id_talent'] = $oldData->id_talent;
		$datanew['created_at'] =  $timestamp;

		$insert = $this->t_harga->save($datanew);

		if ($insert) {
			$retval['status'] = TRUE;
			$retval['pesan'] = 'Data Diskon sukses distop';
		} else {
			$retval['status'] = FALSE;
			$retval['pesan'] = 'Data Diskon gagal distop';
		}

		echo json_encode($retval);
	}

	// ===============================================
	private function rule_validasi()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('talent') == '') {
			$data['inputerror'][] = 'talent';
            $data['error_string'][] = 'Wajib Memilih Nama Talent';
            $data['status'] = FALSE;
		}

		if ($this->input->post('harga') == '') {
			$data['inputerror'][] = 'harga';
            $data['error_string'][] = 'Wajib Mengisi Harga';
            $data['status'] = FALSE;
		}

		if($this->input->post('is_diskon') == '1') {
			if ($this->input->post('diskon') == '') {
				$data['inputerror'][] = 'diskon';
				$data['error_string'][] = 'Wajib Memilih Diskon';
				$data['status'] = FALSE;
			}
	
			if ($this->input->post('masa_berlaku') == '') {
				$data['inputerror'][] = 'masa_berlaku';
				$data['error_string'][] = 'Wajib Memilih Masa Berlaku';
				$data['status'] = FALSE;
			}
	
			if ($this->input->post('tgl_mulai_disc') == '') {
				$data['inputerror'][] = 'tgl_mulai_disc';
				$data['error_string'][] = 'Wajib Memilih Tgl Mulai Diskon';
				$data['status'] = FALSE;
			}
		}

        return $data;
	}

	private function seoUrl($string) {
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}
}
