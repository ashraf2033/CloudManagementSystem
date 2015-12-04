<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Machine extends Model
{
  protected $fillable =
   ['machine_name','serial_number','machine_supplier','production_line','manufacturer','buying_date'];
protected $dates =['created_at','updated_at','buying_date'];
      protected $primaryKey = 'machine_id';
      public function setBuyingDateAttribute($date)
         {
      		$this->attributes['buying_date'] = Carbon::parse($date);

      				}

public function failure(){

  return $this->hasMany('App\Failure');
}
public function task(){

  return $this->hasMany('App\Task');
}

}
