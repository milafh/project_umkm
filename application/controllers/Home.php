<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('M_Master');
	}

	public function login() {
        if ($this->input->method(TRUE) == 'POST') {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = [
				'email' => $email,
				'password' => $password,
			];

			$cek = $this->M_Master->get_id('users', $where)->row();

			if ($cek) {
                $this->session->set_userdata('user', $cek);
                $this->M_Master->success('Anda berhasil login');
                if(strtolower($cek->role) == 'administrator'){
                    redirect('admin/pembelian');
                }else{
                    redirect('/');
                }
			} else {
				$this->M_Master->warning('Email atau password salah');
				redirect('home/login');
			}
        }

		$this->load->view('template/login');
	}

	public function register()
	{
        if ($this->input->method(TRUE) == 'POST') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = "username = '$username' or email = '$email'";

			$cek = $this->M_Master->get_id('users', $where)->row();

			if (!$cek) {
                $this->M_Master->add('users', [
					'username' => $username,
					'email' => $email,
					'password' => $password,
					'status' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'role' => 'public',
				]);
				$this->M_Master->success('Anda berhasil register');
				redirect('home/login');
			} else {
				$this->M_Master->warning('Username atau email sudah terdaftar');
				redirect('home/register');
			}
        }

		$this->load->view('template/register');
	}

}
