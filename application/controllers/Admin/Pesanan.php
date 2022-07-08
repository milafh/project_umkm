<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->title = 'Pesanan';
		$this->table = 'pesanan';

		$this->load->model('M_Master');
	}

	public function index() {

        $data['data'] = $this->M_Master->get_join_id(
			$this->table,
			array(
				array(
					'table' => 'users',
					'fk'	=> 'pesanan.users_id = users.id'
				),
				array(
					'table' => 'produk',
					'fk'	=> 'pesanan.produk_id = produk.id'
				),
			),
			null,
			"users.username as nama_user, produk.nama as nama_produk, pesanan.tanggal, pesanan.jumlah, pesanan.id"
		)->result();

		$data['title'] = $this->title;
		$data['view'] = $this->table.'/index';

		$this->load->view('template/index', $data);
	}

	public function delete($id)
    {
        $where  = ['id' => $id];
        $del    = $this->M_Master->del($this->table, $where);
        $this->M_Master->success('Berhasil hapus data');

        redirect('admin/pesanan');
    }

	public function form($id = null)
    {
        if ($this->input->method(TRUE) == 'POST') {
            $tanggal = $this->input->post('tanggal');
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga');
            $produk_id = $this->input->post('produk_id');
            $suplier_id = $this->input->post('suplier_id');

            $data   = [
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'produk_id' => $produk_id,
                'suplier_id' => $suplier_id,
            ];
            $msg    = 'Berhasil tambah data';

            if (!empty($id)) {
                $where  = ['id' => $id];
                $detail = $this->M_Master->get_id($this->table, $where)->row();

                $edit   = $this->M_Master->edit($this->table, $data, $where);
                $msg    = 'Berhasil ubah data';
            } else {
                $add    = $this->M_Master->add($this->table, $data);
            }

            $this->M_Master->success($msg);
            redirect('admin/pesanan');
        }

        $data['produk'] = $this->M_Master->get('produk')->result();
		$data['suplier'] = $this->M_Master->get('suplier')->result();
        $data['detail'] = $id ? $this->M_Master->get_id($this->table, ['id' => $id])->row() : null;
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/form';

        $this->load->view('template/index', $data);
    }
}