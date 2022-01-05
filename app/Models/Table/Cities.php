<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{

  protected $table = 'cities';

  protected $fillable = [
    'city_id', 'city_name','prov_id'
  ];
}
