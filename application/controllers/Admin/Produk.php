<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->title = 'Produk';
        $this->table = 'produk';

        $this->load->model('M_Master');
    }

    public function index()
    {
        $select = "{$this->table}.*, jenis_produk.nama jenis_produk_nama";
        $join = [
            [
                'table' => 'jenis_produk',
                'fk' => $this->table.'.jenis_id=jenis_produk.id',
            ],
        ];
        $data['data'] = $this->M_Master->get_join_id($this->table, $join, null, $select, $this->table.'.id')->result();
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/index';

        $this->load->view('template/index', $data);
    }

    public function form($id = null)
    {
        if ($this->input->method(TRUE) == 'POST') {
            $jenis_produk = $this->input->post('jenis_produk');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $stok = $this->input->post('stok');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $deskripsi = $this->input->post('deskripsi');
            $foto_flyer = $this->input->post('foto_flyer');

            $data   = [
                'jenis_id' => $jenis_produk,
                'kode' => $kode,
                'nama' => $nama,
                'stok' => $stok,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'deskripsi' => $deskripsi,
            ];
            $msg    = 'Berhasil tambah data';
            
            if ($_FILES['foto']['name']) {
                $new_name = time() . $_FILES['foto']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = './public/produk/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                create_folder(FCPATH . str_replace('./', '', $config['upload_path']));
                $data['foto'] = $new_name;
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->M_Master->warning(implode('<br>', $error));
                    $id = $id ? $id : '';
                    redirect('admin/produk/form/' . $id);
                } else {
                    $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            if (!empty($id)) {
                $where  = ['id' => $id];
                $detail = $this->M_Master->get_id($this->table, $where)->row();

                unlink($config['upload_path'].$detail->foto);
                $edit   = $this->M_Master->edit($this->table, $data, $where);
                $msg    = 'Berhasil ubah data';
            } else {
                $add    = $this->M_Master->add($this->table, $data);
            }

            $this->M_Master->success($msg);
            redirect('admin/produk');
        }

        $data['jenis_produk'] = $this->M_Master->get('jenis_produk')->result();
        $data['detail'] = $id ? $this->M_Master->get_id($this->table, ['id' => $id])->row() : null;
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/form';

        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $where  = ['id' => $id];
        $del    = $this->M_Master->del($this->table, $where);
        $this->M_Master->success('Berhasil hapus data');

        redirect('admin/produk');
    }
}
