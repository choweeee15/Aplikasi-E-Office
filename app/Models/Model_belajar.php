<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_belajar extends Model
{
    public function queryCustom($query, $params = [])
    {
        $db = \Config\Database::connect();
        return $db->query($query, $params)->getResult();
    }

    public function joinWhere($table1, $table2, $on, $where)
    {
        $builder = $this->db->table($table1);
        $builder->join($table2, $on);
        $builder->groupStart()
            ->orWhere($where)
            ->groupEnd();
        return $builder->get()->getResult();
    }

    public function tampil($table, $by)
    {
        return $this->db->table($table)->orderby($by, 'desc')->get()->getResult();
    }
    public function eltampil($table)
    {
        return $this->db->table($table)->get()->getResult();
    }

    public function getUsernames()
    {
        return $this->db->table('user')
            ->select('username')
            ->get()
            ->getResultArray();
    }


    public function getAllUsers()
    {
        return $this->db->table('users')->get()->getResultArray();
    }


    public function getArsipSurat($orderby)
    {
        return $this->db->table('arsip_surat')
            ->orderBy($orderby, 'desc')
            ->get()
            ->getResult();
    }

    public function getPenerimaKhusus()
    {
        return $this->db->table('user')
            ->whereIn('level', [1, 2, 3, 4])
            ->select('username, level')
            ->get()
            ->getResult();
    }

    public function getArsipByPenerima($penerima_disposisi)
    {
        return $this->db->table('arsip_surat')
            ->where('penerima_disposisi', $penerima_disposisi)
            ->get()
            ->getResult();
    }
    public function getArsipSuratByPenerima($username)
    {
        return $this->db->table('arsip_surat')
            ->where('penerima_disposisi', $username)
            ->orWhere('penerima_disposisi', '')
            ->orderBy('tanggal_arsip', 'DESC')
            ->get()
            ->getResult();
    }

    public function join($table, $table2, $on)
    {
        return $this->db->table($table)
            ->join($table2, $on)
            ->get()
            ->getResult();
    }
    public function filter($table, $table2, $on, $filter1, $filter2, $awal, $ahir)
    {
        return $this->db->table($table)
            ->join($table2, $on)
            ->where($filter1, $awal)
            ->where($filter2, $ahir)
            ->get()
            ->getResult();
    }
    public function joinw($table, $table2, $on, $w)
    {
        return $this->db->table($table)
            ->join($table2, $on)
            ->where($w)
            ->get()
            ->getRow();
    }
    public function hapus($table, $where)
    {
        return $this->db->table($table)->delete($where);
    }

    public function edit($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }

    public function getWhere($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRow();
    }
    public function input($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }
    public function getUserById($id)
    {
        return $this->getWhere('user', ['id_user' => $id]);
    }

    public function simpanUser($data)
    {
        return $this->input('user', $data);
    }

    public function updateUser($id, $data)
    {
        return $this->edit('user', $data, ['id_user' => $id]);
    }

    public function getUsers()
    {
        return $this->tampil('user');
    }
    public function getKaryawanById($id)
    {
        return $this->db->table('karyawan')->where('id_karyawan', $id)->get()->getRow();
    }
    public function getDokumenByIdUsingWhere($id_dokumen)
    {

        return $this->db->get_where('dokumen_absensi', ['id_dokumen' => $id_dokumen])->row();
    }

    public function getDokumenById($id_dokumen)
    {

        return $this->db->get_where('dokumen_kesiswaan', ['id_dokumen' => $id_dokumen])->row();
    }
    public function getBarangRusakById($id)
    {
        return $this->db->table('barang_rusak')->where('id_barangrusak', $id)->get()->getRow();
    }

    public $allowedFields = ['nama', 'NIK', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp'];
}
