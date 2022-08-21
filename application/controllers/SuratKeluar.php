<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Data Surat Keluar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('data_model', 'surat_keluar');
        $data['surat_keluar'] = $this->surat_keluar->getAllDataKeluar();

        if ($this->input->post('keyword')) {
            $data['surat_keluar'] = $this->surat_keluar->FindDataKeluar();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/tampil_SuratKeluar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function Input()
    {
        $data['title'] = "Input Surat Keluar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('data_model', 'surat_keluar');

        $this->form_validation->set_rules('alamatpengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/input_SuratKeluar', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->surat_keluar->inputDataKeluar();
            $this->session->set_flashdata('message', 'Data surat added succesfully!');
            redirect('SuratKeluar/index');
        }
    }

    public function Edit($id)
    {
        $this->load->model('data_model', 'surat_keluar');
        $data['title'] = "Edit data Surat Keluar";

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->GetDataKeluarByID($id);


        $this->form_validation->set_rules('alamatpengirim', 'Alamat Pengirim', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/edit_suratKeluar', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->surat_keluar->EditDataKeluar();
            $this->session->set_flashdata('message', 'Data surat edited succesfully!');
            redirect('SuratKeluar/index');
        }
    }

    public function Hapus($id)
    {
        $this->load->model('data_model', 'surat_keluar');
        $this->surat_keluar->DeleteDataKeluar($id);
        $this->session->set_flashdata('message', 'Data surat deleted Successfuly!');
        redirect('SuratKeluar/index');
    }

    public function Gambar($id)
    {
        $this->load->model('data_model', 'surat_keluar');
        $data['title'] = "Picture of Surat Keluar";

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->GetDataKeluarByID($id);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/gambar_suratKeluar', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->surat_keluar->EditDataKeluar();
            $this->session->set_flashdata('message', 'Picture of surat masuk added succesfully!');
            redirect('SuratKeluar/index');
        }
    }

    public function EditGambar()
    {
        $upload_files = $_FILES['image'];
        if ($upload_files) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['upload_path'] = './assets/img/SuratKeluar/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $data = ["photo" => $new_image];
                $this->db->where('nomor_urut', $this->input->post('nomor_urut'));
                $this->db->update('surat_keluar', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }
        redirect('SuratKeluar/index');
    }

    public function Disposisi($id)
    {
        $this->load->model('data_model', 'disposisi_keluar');
        $data['title'] = "Disposisi data Surat Keluar";
        $data['no_urut'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['disposisi_keluar'] = $this->disposisi_keluar->GetDataDisposisiKeluarByID($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/tampildisposisi_suratKeluar', $data);
        $this->load->view('templates/footer', $data);
    }

    public function TambahDisposisi($No_urut)
    {
        $data['title'] = "Add Disposisi Surat Keluar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('data_model', 'disposisi_keluar');

        $data['disposisi_keluar'] = $this->disposisi_keluar->GetDataMasukByID($No_urut);
        $data['surat_keluar'] = $this->disposisi_keluar->GetDataMasukByID($No_urut);

        $this->form_validation->set_rules('suratdari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('diterimatanggal', 'Diterima Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/inputDisposisi_suratKeluar', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->disposisi_keluar->inputDisposisiDataKeluar($No_urut);
            $this->session->set_flashdata('message', 'Data disposisi surat keluar added succesfully!');
            redirect('SuratKeluar/Disposisi/' . $No_urut);
        }
    }

    public function EditDisposisi($No_urut, $id)
    {
        $data['title'] = "Edit Disposisi Surat Keluar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->model('data_model', 'disposisi_keluar');

        $data['disposisi_keluar'] = $this->disposisi_keluar->GetDataDisposisiKeluarByIDAndIndex($No_urut, $id);

        $this->form_validation->set_rules('suratdari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('diterimatanggal', 'Diterima Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/EditDisposisi_suratKeluar', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->disposisi_keluar->EditDisposisiDatakeluar($No_urut, $id);
            $this->session->set_flashdata('message', 'Data disposisi surat keluar edited succesfully!');
            redirect('SuratKeluar/Disposisi/' . $No_urut);
        }
    }

    public function HapusDisposisi($No_urut, $id)
    {
        $this->load->model('data_model', 'disposisi_keluar');
        $this->disposisi_keluar->DeleteDataDisposisiKeluar($No_urut, $id);
        $this->session->set_flashdata('message', 'Data disposisi surat deleted Successfuly!');
        redirect('SuratKeluar/Disposisi/' . $No_urut);
    }
}
