<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
protected $fillable = [
  'part_id',
  'part_qty',
  'note',
  'type'
];
protected $table = 'transes';
protected  $primaryKey = 'trans_id';

public function user(){
  return $this->belongsTo('App\User');
}
public function part(){
  return $this->HasOne('App\SparePart','part_id');
}
}
