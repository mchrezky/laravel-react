<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{

  protected $table = 'mitra';

  protected $fillable = [
    'id', 'id_user', 'type', 'nama', 'ket', 'profit', 'kelas', 'awal_kontrak', 'akhir_kontrak', 'doc_kontrak', 'foto', 'is_active','created_by'
  ];
}
