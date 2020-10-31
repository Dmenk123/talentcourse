<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-sZaLLb9rc5_mfPasoa9Hy96d', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('m_global');
    }

    public function index()
    {
		$type = $this->input->get('type');
        if(in_array($type, ['reg', 'vip'])){
			if($type == 'reg') {
				$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 1, 'deleted_at' => null], 't_harga', NULL);
			}else{
				$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 2, 'deleted_at' => null], 't_harga', NULL);
			}

            $tahun = date('Y');
            $bulan = date('m');
            $hari = date('d');
            $data_dashboard = [];
            
            /**
             * data passing ke halaman view content
             */
            $data = [
				'type' => $type,
				'harga' => $harga
            ];

            //cek disini 
            $this->load->view('v_template', $data, FALSE);
        }else{
            return redirect('home');
        };
   
    }

    public function token()
    {
		$first_name     = $this->input->post('first_name');
		$last_name   	= $this->input->post('last_name');
		$email    		= $this->input->post('email');
		$price    		= $this->input->post('price');
		$quantity 		= $this->input->post('quantity');
		$telp     		= $this->input->post('telp');
		$address        = $this->input->post('address');

		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$datenow = $obj_date->format('Y-m-d');
		
		$arr_valid = $this->rule_validasi();
		// var_dump($arr_valid);exit;
		if ($arr_valid['status'] == FALSE) {
			// $this->session->set_flashdata('feedback_failed','Gagal menyimpan Data, pastikan telah mengisi semua inputan yang wajib di isi.'); 
			// return redirect('snap').'?type='.$price.'#checkout';
			// echo json_encode(['status' => false]);
			return;
		}

		if($price == 'reg') {
			$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 1, 'deleted_at' => null], 't_harga', NULL);
		}else{
			$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 2, 'deleted_at' => null], 't_harga', NULL);
		}
		
		if($harga->is_diskon) {
			// cek tanggal
			$tgl_mulai_diskon = $obj_date->createFromFormat('Y-m-d H:i:s', $harga->tgl_mulai_diskon.' 00:00:00')->format('Y-m-d H:i:s');
			$tgl_akhir_diskon = $obj_date->createFromFormat('Y-m-d H:i:s', $harga->tgl_akhir_diskon.' 00:00:00')->format('Y-m-d H:i:s');
			$diskon = $this->m_global->single_row('*', ['id' => $harga->id_m_diskon], 'm_diskon');
			//jika harga normal (timestamp > tgl_akhir diskon)
			if(strtotime($timestamp) > strtotime($tgl_akhir_diskon)) {
				$harga_fix = (float)$harga->nilai_harga;
			}else{
				//cek apakah sudah masuk tgl diskon ?
				if(strtotime($timestamp) >= strtotime($tgl_mulai_diskon)) {
					$harga_fix = (float)$harga->nilai_harga - ((float)$harga->nilai_harga * (float)$diskon->besaran / 100);
				}
				// jika belum berarti harganya masih normal
				else{
					$harga_fix = (float)$harga->nilai_harga;
				}
			}
		}else{
			$harga_fix = (float)$harga->nilai_harga;
		}

		if($price == 'reg') {
			$txt_ket = 'reguler';
		}else{
			$txt_ket = 'eksklusif';
		}
	
		// Required
		$order_id = rand();
		$transaction_details = array(
		  'order_id' => $order_id,
		  'gross_amount' => $harga_fix + 4000, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $harga_fix,
		  'quantity' => 1,
		  'name' => "Kelas ".$txt_ket
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => 4000,
		  'quantity' => 1,
		  'name' => "Biaya Admin"
		);

		//inserting data customer
		$nama_lengkap = $first_name.' '.$last_name;
		$data = array(
			'nama'  => $nama_lengkap,
			'email' => $email,
			'telp'  => $telp,
			'keterangan' => $txt_ket,
			'harga'     => $harga_fix,
			'harga_bruto' => $harga_fix + $item2_details['price'],
			'order_id'  => $order_id,
			'alamat'    => $address,
			'created_at' => $timestamp
		);
		$simpan = $this->m_global->store($data, 't_checkout');
		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $first_name,
		  'last_name'     => $last_name,
		  'address'       => $address,
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => $telp,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => $address,
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $first_name,
		  'last_name'     => $last_name,
		  'email'         => $email,
		  'phone'         => $telp,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 60
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		// echo json_encode($transaction_data);
		// exit;
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		//error_log($snapToken);
		
		echo json_encode(['token'=>$snapToken, 'transData' => $transaction_data]);
    }

    public function finish()
    {

		$this->load->model('snapmodel');
		$result = json_decode($this->input->post('result_data'));
		$data_trans = json_decode($this->input->post('formulir-data'));
		
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		// var_dump([$result, $data_trans]);exit;
		
		if (isset($result->va_number[0]->bank)) {
			$bank = $result->va_number[0]->bank;
		} else {
			$bank = '-';
		}

		if (isset($result->va_number[0]->va_number)) {
			$va_number = $result->va_number[0]->va_number;
		} else {
			$va_number = '-';
		}

		if (isset($result->bca_va_number)) {
			$bca_va_number = $result->bca_va_number;
		} else {
			$bca_va_number = '-';
		}

		if (isset($result->bill_key)) {
			$bill_key = $result->bill_key;
		} else {
			$bill_key = '-';
		}

		if (isset($result->biller_code)) {
			$biller_code = $result->biller_code;
		} else {
			$biller_code = '-';
		}

		if (isset($result->permata_va_number)) {
			$permata_va_number = $result->permata_va_number;
		} else {
			$permata_va_number = '-';
		}

		$data = [
			'status_code' => $result->status_code,
			'status_message' => $result->status_message,
			'transaction_id' => $result->transaction_id,
			'order_id' => $result->order_id,
			'gross_amount' => $result->gross_amount,
			'payment_type' => $result->payment_type,
			'transaction_time' => $result->transaction_time,
			'transaction_status' => $result->transaction_status,
			'bank' => $bank,
			'va_number' => $va_number,
			'fraud_status' => $result->fraud_status,
			'bca_va_number' => $bca_va_number,
			'permata_va_number' => $permata_va_number,
			'pdf_url' => $result->pdf_url,
			'finish_redirect_url' => $result->finish_redirect_url,
			'bill_key' => $bill_key,
			'biller_code' => $biller_code,
		];

		$return = $this->snapmodel->insert($data);
		if ($return) {
			// if($data_trans->item_details[0]->name == 'Kelas reguler'){
			// 	$ket_txt = 'reguler';
			// }else{
			// 	$ket_txt = 'eksklusif';
			// }

			// $checkout_data = [
			// 	'kode_ref' => $result->order_id,
			// 	'order_id' => $result->order_id,
            //     'email' => $data_trans->customer_details->email,
            //     'nama_dpn' => $data_trans->customer_details->first_name,
            //     'nama_blkg' => $data_trans->customer_details->last_name,
			// 	'telp' => $data_trans->customer_details->phone,
			// 	'keterangan' => $ket_txt,
			// 	'harga' => (float)$data_trans->item_details[0]->price,
			// 	'harga_bruto' => (float)$result->gross_amount,
            //     'created_at' => $timestamp
            // ];

			// $simpan = $this->m_global->store($checkout_data, 't_checkout');
			
			echo "request pembayaran berhasil dilakukan";
		} else {
			echo "request pembayana gagal dilakukan";
		}

		$this->data['finish'] = json_decode($this->input->post('result_data'));
		// $this->load->view('konfirmasi', $data);
		var_dump('terimkasih sudah menjadi agen perubahan bisnis anda yang lebih baik !!');
		// redirect('thankyou');
	}

	function tes() {
		$mysql_query = "SELECT * FROM contoh ORDER BY co_id DESC";
		$query = $this->db->query($mysql_query);

		$arr = [];
		foreach ($query->result_array() as $row) {
			array_push($arr, $row);
		}

		// echo "<pre>";
		// print_r($arr);

		return $arr;
	}
	
	private function rule_validasi()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('price') == '') {
			$data['inputerror'][] = 'keterangan';
            $data['error_string'][] = 'Wajib Memilih Nama keterangan';
            $data['status'] = FALSE;
		}

		if ($this->input->post('first_name') == '') {
			$data['inputerror'][] = 'nama_depan';
            $data['error_string'][] = 'Wajib Mengisi Nama Depan';
            $data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
            $data['error_string'][] = 'Wajib Mengisi Nama Email';
            $data['status'] = FALSE;
		}

		if ($this->input->post('telp') == '') {
			$data['inputerror'][] = 'telp';
            $data['error_string'][] = 'Wajib Mengisi Nomor Telp';
            $data['status'] = FALSE;
		}

        return $data;
	}
}
