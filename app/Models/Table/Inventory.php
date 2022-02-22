<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

  protected $table = 'inventory';

  protected $fillable = [
    'id', 'nama', 'ket', 'qty', 'qty_min','uom', 'expired', 'category', 'mitra', 'flag', 'created_by', 'updated_by'
  ];
}
