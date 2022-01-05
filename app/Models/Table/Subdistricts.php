<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Model;

class Subdistricts extends Model
{

  protected $table = 'subdistricts';

  protected $fillable = [
    'subdis_id', 'subdis_name','dis_id'
  ];
}
