<?php

class data_model extends CI_Model
{
    public function getAllDataMasuk()
    {
        return $this->db->get('surat_masuk')->result_array();
    }

    public function getAllDataKeluar()
    {
        return $this->db->get('surat_keluar')->result_array();
    }

    public function inputDataMasuk()
    {
        $data = [
            "nomor_berkas" => $this->input->post('nomorberkas'),
            "alamat_pengirim" => $this->input->post('alamatpengirim'),
            "tanggal" => $this->input->post('tanggal'),
            "nomor" => $this->input->post('nomor'),
            "perihal" => $this->input->post('perihal'),
            "nomor_petunjuk" => $this->input->post('nomor_petunjuk'),
            "nomor_paket" => $this->input->post('nomor_paket')
        ];

        $this->db->insert('surat_masuk', $data);
    }

    public function inputDataKeluar()
    {
        $data = [
            "nomor_berkas" => $this->input->post('nomorberkas'),
            "alamat_pengirim" => $this->input->post('alamatpengirim'),
            "tanggal" => $this->input->post('tanggal'),
            "perihal" => $this->input->post('perihal'),
            "nomor_petunjuk" => $this->input->post('nomor_petunjuk'),
            "nomor" => $this->input->post('nomor')
        ];

        $this->db->insert('surat_keluar', $data);
    }

    public function DeleteDataMasuk($id)
    {
        $this->db->where('nomor_urut', $id);
        $this->db->delete('surat_masuk');
    }

    public function DeleteDataKeluar($id)
    {
        $this->db->where('nomor_urut', $id);
        $this->db->delete('surat_keluar');
    }

    public function GetDataMasukByID($id)
    {
        return $this->db->get_where('surat_masuk', ['nomor_urut' => $id])->row_array();
    }

    public function GetDataKeluarByID($id)
    {
        return $this->db->get_where('surat_keluar', ['nomor_urut' => $id])->row_array();
    }

    public function EditDataKeluar()
    {
        $data = [
            "nomor_berkas" => $this->input->post('nomorberkas'),
            "alamat_pengirim" => $this->input->post('alamatpengirim'),
            "tanggal" => $this->input->post('tanggal'),
            "perihal" => $this->input->post('perihal'),
            "nomor_petunjuk" => $this->input->post('nomor_petunjuk'),
            "nomor" => $this->input->post('nomor')
        ];

        $this->db->where('nomor_urut', $this->input->post('nomor_urut'));
        $this->db->update('surat_keluar', $data);
    }

    public function EditDataMasuk()
    {
        $data = [
            "nomor_berkas" => $this->input->post('nomorberkas'),
            "alamat_pengirim" => $this->input->post('alamatpengirim'),
            "tanggal" => $this->input->post('tanggal'),
            "nomor" => $this->input->post('nomor'),
            "perihal" => $this->input->post('perihal'),
            "nomor_petunjuk" => $this->input->post('nomor_petunjuk'),
            "nomor_paket" => $this->input->post('nomor_paket')
        ];

        $this->db->where('nomor_urut', $this->input->post('nomor_urut'));
        $this->db->update('surat_masuk', $data);
    }

    public function FindDataMasuk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nomor_urut', $keyword);
        $this->db->or_like('alamat_pengirim', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('nomor', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('nomor_petunjuk', $keyword);
        $this->db->or_like('nomor_paket', $keyword);

        return $this->db->get('surat_masuk')->result_array();
    }

    public function FindDataKeluar()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nomor_urut', $keyword);
        $this->db->or_like('nomor_berkas', $keyword);
        $this->db->or_like('alamat_pengirim', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('nomor_petunjuk', $keyword);
        $this->db->or_like('nomor', $keyword);

        return $this->db->get('surat_keluar')->result_array();
    }

    public function GetDataDisposisiMasukByID($id)
    {
        return $this->db->get_where('disposisi_surat_masuk', ['nomor_urut' => $id])->result_array();
    }

    public function GetDataDisposisiKeluarByID($id)
    {
        return $this->db->get_where('disposisi_surat_keluar', ['nomor_urut' => $id])->result_array();
    }

    public function GetDataDisposisiMasukByIDAndIndex($No_Urut, $id)
    {
        $where_array = array(
            'nomor_urut' => $No_Urut,
            'id_disposisi' => $id
        );
        return $this->db->get_where('disposisi_surat_masuk', $where_array)->row_array();
    }

    public function GetDataDisposisiKeluarByIDAndIndex($No_Urut, $id)
    {
        $where_array = array(
            'nomor_urut' => $No_Urut,
            'id_disposisi' => $id
        );
        return $this->db->get_where('disposisi_surat_keluar', $where_array)->row_array();
    }

    public function inputDisposisiDataMasuk($No_urut)
    {
        $data = [
            "nomor_urut" => $No_urut,
            "surat_dari" => $this->input->post('suratdari'),
            "no_surat" => $this->input->post('nosurat'),
            "tanggal_surat" => $this->input->post('tanggalsurat'),
            "diterima_tanggal" => $this->input->post('diterimatanggal'),
            "no_agenda" => $this->input->post('noagenda'),
            "sifat" => $this->input->post('sifat'),
            "perihal" => $this->input->post('perihal'),
            "diteruskan_kepada" => $this->input->post('diteruskankepada'),
            "dengan_hormat_harap" => $this->input->post('denganhormatharap'),
            "catatan" => $this->input->post('catatan')
        ];

        $this->db->insert('disposisi_surat_masuk', $data);
    }

    public function inputDisposisiDataKeluar($No_urut)
    {
        $data = [
            "nomor_urut" => $No_urut,
            "surat_dari" => $this->input->post('suratdari'),
            "no_surat" => $this->input->post('nosurat'),
            "tanggal_surat" => $this->input->post('tanggalsurat'),
            "diterima_tanggal" => $this->input->post('diterimatanggal'),
            "no_agenda" => $this->input->post('noagenda'),
            "sifat" => $this->input->post('sifat'),
            "perihal" => $this->input->post('perihal'),
            "diteruskan_kepada" => $this->input->post('diteruskankepada'),
            "dengan_hormat_harap" => $this->input->post('denganhormatharap'),
            "catatan" => $this->input->post('catatan')
        ];

        $this->db->insert('disposisi_surat_keluar', $data);
    }

    public function EditDisposisiDataKeluar($No_urut, $id)
    {
        $data = [
            "nomor_urut" => $No_urut,
            "surat_dari" => $this->input->post('suratdari'),
            "no_surat" => $this->input->post('nosurat'),
            "tanggal_surat" => $this->input->post('tanggalsurat'),
            "diterima_tanggal" => $this->input->post('diterimatanggal'),
            "no_agenda" => $this->input->post('noagenda'),
            "sifat" => $this->input->post('sifat'),
            "perihal" => $this->input->post('perihal'),
            "diteruskan_kepada" => $this->input->post('diteruskankepada'),
            "dengan_hormat_harap" => $this->input->post('denganhormatharap'),
            "catatan" => $this->input->post('catatan')
        ];

        $where_array = array(
            'nomor_urut' => $No_urut,
            'id_disposisi' => $id
        );
        $this->db->where($where_array);
        $this->db->update('disposisi_surat_keluar', $data);
    }

    public function EditDisposisiDataMasuk($No_urut, $id)
    {
        $data = [
            "nomor_urut" => $No_urut,
            "surat_dari" => $this->input->post('suratdari'),
            "no_surat" => $this->input->post('nosurat'),
            "tanggal_surat" => $this->input->post('tanggalsurat'),
            "diterima_tanggal" => $this->input->post('diterimatanggal'),
            "no_agenda" => $this->input->post('noagenda'),
            "sifat" => $this->input->post('sifat'),
            "perihal" => $this->input->post('perihal'),
            "diteruskan_kepada" => $this->input->post('diteruskankepada'),
            "dengan_hormat_harap" => $this->input->post('denganhormatharap'),
            "catatan" => $this->input->post('catatan')
        ];

        $where_array = array(
            'nomor_urut' => $No_urut,
            'id_disposisi' => $id
        );
        $this->db->where($where_array);
        $this->db->update('disposisi_surat_masuk', $data);
    }

    public function DeleteDataDisposisiMasuk($No_urut, $id)
    {
        $where_array = array(
            'nomor_urut' => $No_urut,
            'id_disposisi' => $id
        );
        $this->db->where($where_array);
        $this->db->delete('disposisi_surat_masuk');
    }

    public function DeleteDataDisposisiKeluar($No_urut, $id)
    {
        $where_array = array(
            'nomor_urut' => $No_urut,
            'id_disposisi' => $id
        );
        $this->db->where($where_array);
        $this->db->delete('disposisi_surat_keluar');
    }
}
