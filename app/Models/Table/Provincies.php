<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Provincies extends Model
{

  protected $table = 'provinces';

  protected $fillable = [
    'prov_id', 'prov_name','location_id','status'
  ];
}
