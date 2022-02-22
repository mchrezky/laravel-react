<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class IncomeInventory extends Model
{

  protected $table = 'income_inventory';

  protected $fillable = [
    'id', 'in_qty', 'in_price', 'ket', 'inventory_id', 'petani', 'mitra', 'created_by', 'updated_by'
  ];
}
