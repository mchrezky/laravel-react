<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

  protected $table = 'country_data';

  protected $fillable = [
    'id_country', 'country_name', 'code1', 'code2', 'flag'
  ];
}
