<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table = 'surat_masuk';  // Your table name
    protected $primaryKey = 'id_suratmasuk';  // Primary key column
    protected $allowedFields = ['status'];  // Fields that can be updated

    // You can add any custom methods you need here, for example:
    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }
}
