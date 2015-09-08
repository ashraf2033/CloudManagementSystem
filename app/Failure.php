<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Failure extends Model
{
    //
     protected $fillable =
      ['fail_name','machine_id','fail_time','fail_type','shift','fail_details','fail_importance','fail_notes'];
 protected $dates =['created_at','updated_at','fail_time'];
         protected $primaryKey = 'fail_id';

public function setFailTimeAttribute($date)
   {
	   $time = $this->attributes['fail_time'] = Carbon::createFromFormat('Y-m-d',$date);
	   if($time->isToday()){
	   $this->attributes['fail_time'] = Carbon::createFromFormat('Y-m-d',$date);
			}else{
				$this->attributes['fail_time'] = Carbon::parse($date);
				}
		}
public function machine(){
  return $this->belongsTo('App\Machine');
}
public function repair(){
  return $this->hasOne('App\Repair','fail_id','fail_id');
}
public function scopeThisWeek($query){

if (Carbon::today()->isSaturday()) {
$fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
return $query->whereBetween(DB::raw('date(fail_time)'), [Carbon::today(),$fri])->get();
}elseif (Carbon::today()->isFriday()) {
  $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
  return $query->whereBetween(DB::raw('date(fail_time)'), [$sat,Carbon::today()])->get();
}else {
   $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
   $fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
   return $query->whereBetween(DB::raw('date(fail_time)'), [$sat,$fri])->get();
}
}

public function scopeThismonth($query){

$carbon = new Carbon;
  return $query->whereBetween(DB::raw('date(fail_time)'), [$carbon->startOfMonth()->format('y-m-d'),$carbon->
  endOfMonth()->format('Y-m-d')])->get();

}
public function scopetoday($query){

  return $query->
  whereBetween('fail_time',[Carbon::today(),Carbon::today()->endOfDay()])->get();

}
}
