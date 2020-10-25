<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


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
            $tahun = date('Y');
            $bulan = date('m');
            $hari = date('d');
            $data_dashboard = [];
            
            /**
             * data passing ke halaman view content
             */
            $data = [
                'type' => $type
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

		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$datenow = $obj_date->format('Y-m-d');
		

		if($price == 'reg') {
			$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 1], 't_harga', NULL);
		}else{
			$harga = $this->m_global->single_row('*',['id_talent' => 1, 'jenis_harga' => 2], 't_harga', NULL);
		}
		
		if($harga->is_diskon) {
			$tgl_akhir_diskon = $harga->tgl_akhir_diskon;
			if(strtotime($datenow) > strtotime($tgl_akhir_diskon)) {
				$diskon = $this->m_global->single_row('*', ['id' => $harga->id_m_diskon], 'm_diskon');
				$harga_fix = (float)$harga->nilai_harga * (float)$diskon->besaran / 100;
			}else{
				$harga_fix = $harga->nilai_harga;
			}
		}else{
			$harga_fix = $harga->nilai_harga;
		}


		if($price == 'reg') {
			$txt_ket = 'reguler';
		}else{
			$txt_ket = 'eksklusif';
		}
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
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

		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $first_name,
		  'last_name'     => $last_name,
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => $telp,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
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
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
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
}
