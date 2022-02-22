<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class InventoryCat extends Model
{

  protected $table = 'category';

  protected $fillable = [    
    'id', 'nama','mitra', 'flag','created_by',  'created_at'
  ];
}
