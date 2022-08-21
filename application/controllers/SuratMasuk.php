<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function input()
    {
        $data['title'] = "Input Surat Masuk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('data_model', 'surat_masuk');

        $this->form_validation->set_rules('alamatpengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/input_suratMasuk', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->surat_masuk->inputDataMasuk();
            $this->session->set_flashdata('message', 'Data surat added succesfully!');
            redirect('SuratMasuk/index');
        }
    }

    public function index()
    {
        $data['title'] = "Data Surat Masuk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('data_model', 'surat_masuk');
        $data['surat_masuk'] = $this->surat_masuk->getAllDataMasuk();

        if ($this->input->post('keyword')) {
            $data['surat_masuk'] = $this->surat_masuk->FindDataMasuk();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/tampil_suratMasuk', $data);
        $this->load->view('templates/footer', $data);
    }

    public function Hapus($id)
    {
        $this->load->model('data_model', 'surat_masuk');
        $this->surat_masuk->DeleteDataMasuk($id);
        $this->session->set_flashdata('message', 'Data surat deleted Successfuly!');
        redirect('SuratMasuk/index');
    }

    public function Edit($id)
    {
        $this->load->model('data_model', 'surat_masuk');
        $data['title'] = "Edit data Surat Masuk";

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->surat_masuk->GetDataMasukByID($id);


        $this->form_validation->set_rules('alamatpengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/edit_suratMasuk', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->surat_masuk->EditDataMasuk();
            $this->session->set_flashdata('message', 'Data surat edited succesfully!');
            redirect('SuratMasuk/index');
        }
    }

    public function Gambar($id)
    {
        $this->load->model('data_model', 'surat_masuk');
        $data['title'] = "Picture of Surat Masuk";

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->surat_masuk->GetDataMasukByID($id);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/gambar_suratMasuk', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->surat_masuk->EditDataMasuk();
            $this->session->set_flashdata('message', 'Picture of surat masuk added succesfully!');
            redirect('SuratMasuk/index');
        }
    }

    public function EditGambar()
    {


        $upload_files = $_FILES['image'];
        if ($upload_files) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['upload_path'] = './assets/img/SuratMasuk/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $data = ["photo" => $new_image];
                $this->db->where('nomor_urut', $this->input->post('nomor_urut'));
                $this->db->update('surat_masuk', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }
        redirect('SuratMasuk/index');
    }

    public function TampilDisposisi($id)
    {
        $this->load->model('data_model', 'disposisi_masuk');
        $data['title'] = "Disposisi data Surat Masuk";
        $data['no_urut'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['disposisi_masuk'] = $this->disposisi_masuk->GetDataDisposisiMasukByID($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/tampildisposisi_suratMasuk', $data);
        $this->load->view('templates/footer', $data);
    }

    public function EditDisposisi($No_urut, $id)
    {
        $data['title'] = "Edit Disposisi Surat Masuk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('data_model', 'disposisi_masuk');

        $data['disposisi_masuk'] = $this->disposisi_masuk->GetDataDisposisiMasukByIDAndIndex($No_urut, $id);

        $this->form_validation->set_rules('suratdari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('diterimatanggal', 'Diterima Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/EditDisposisi_suratMasuk', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->disposisi_masuk->EditDisposisiDataMasuk($No_urut, $id);
            $this->session->set_flashdata('message', 'Data disposisi surat masuk edited succesfully!');
            redirect('SuratMasuk/TampilDisposisi/' . $No_urut);
        }
    }

    public function TambahDisposisi($No_urut)
    {
        $data['title'] = "Add Disposisi Surat Masuk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('data_model', 'disposisi_masuk');

        $data['disposisi_masuk'] = $this->disposisi_masuk->GetDataMasukByID($No_urut);
        $data['surat_masuk'] = $this->disposisi_masuk->GetDataMasukByID($No_urut);

        $this->form_validation->set_rules('suratdari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('diterimatanggal', 'Diterima Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/inputDisposisi_suratMasuk', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->disposisi_masuk->inputDisposisiDataMasuk($No_urut);
            $this->session->set_flashdata('message', 'Data disposisi surat masuk added succesfully!');
            redirect('SuratMasuk/TampilDisposisi/' . $No_urut);
        }
    }

    public function HapusDisposisi($No_urut, $id)
    {
        $this->load->model('data_model', 'disposisi_masuk');
        $this->disposisi_masuk->DeleteDataDisposisiMasuk($No_urut, $id);
        $this->session->set_flashdata('message', 'Data disposisi surat deleted Successfuly!');
        redirect('SuratMasuk/TampilDisposisi/' . $No_urut);
    }
}
