<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{

  protected $table = 'districts';

  protected $fillable = [
    'dis_id', 'dis_name','city_id'
  ];
}
