<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->title = 'Pesanan';
		$this->table = 'pesanan';
		$this->load->model('M_Master');
	}

	public function index()
	{
		$data['produk'] = $this->M_Master->get('produk')->result();
		$data['has_login'] = ($this->session->userdata('user') ? $this->session->userdata('user') : '');
		
		$this->load->view('landing_page/index', $data);
	}

	public function order()
	{
		if ($this->input->method(TRUE) == 'POST') {
            $tanggal = date('Y-m-d');
            $jumlah = $this->input->post('jumlah');
            $produk_id = $this->input->post('produk_id');
            $users_id = $this->session->userdata('user')->id;

            $data   = [
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
                'produk_id' => $produk_id,
                'users_id' => $users_id,
            ];

            $msg    = 'Berhasil menginput pesanan';
			$add    = $this->M_Master->add($this->table, $data);

            $this->M_Master->success($msg);
            redirect('welcome/');
        }
	}
}
