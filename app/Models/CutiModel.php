<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $table = 'cuti';
    protected $primaryKey = 'id_cuti';
    protected $allowedFields = [
        'id_user',
        'jenis_cuti',
        'tanggal_mulai',
        'tanggal_sampai',
        'alasan',
        'alamat_cuti',
        'guru_pengganti',
        'status',
        'status_pengganti',
        'komentar'
    ];
}
