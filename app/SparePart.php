<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
protected  $fillable = ['part_name','part_stock','part_store'];
protected  $primaryKey = 'part_id';

public function repair(){
  return $this->belongsToMany('App\Repair','part_repair','part_id','repair_id')->withPivot('part_qty');}

public function task(){
  return $this->belongsToMany('App\Task')->withPivot('part_qty');
}

}
