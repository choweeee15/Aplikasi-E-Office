<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table = 'surat_keluar';  // Your table name
    protected $primaryKey = 'id_suratkeluar';  // Primary key column
    protected $allowedFields = ['status'];  // Fields that can be updated

    // Custom method to update status
    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }
}
