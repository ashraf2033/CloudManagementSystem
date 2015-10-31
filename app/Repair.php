<?php

namespace App;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
protected $fillable =[
  'rep_time',
  'rep_date',
  'user_id',
  'rep_dur',
  'rep_details',
  'rep_status',
  'tech_no',
  'fail_id'
];
protected $dates = ['rep_date','created_at','updated_at'];
protected  $primaryKey = 'rep_id';
public function setRepDateAttribute($date)
   {
	   $time = $this->attributes['rep_date'] = Carbon::createFromFormat('Y-m-d',$date);
	   if($time->isToday()){
	   $this->attributes['rep_date'] = Carbon::createFromFormat('Y-m-d',$date);
			}else{
				$this->attributes['rep_date'] = Carbon::parse($date);
				}
		}
  public function spare_parts(){
    return $this->belongsToMany('App\SparePart','part_repair','repair_id','part_id')->withPivot('part_qty');
}
public function user(){
  return $this->belongsTo('App\User');
}
public function technicans(){
  return $this->belongsToMany('App\Technican');
}
public function failure(){
  return $this->belongsTo('App\Failure','fail_id','fail_id');
}
public function scopeRunning($query){
  return $query->where('rep_status','=' ,'جاري الإصلاح');
}

public function scopeFinished($query){
return  $query->where('rep_status','=' ,'تم')->get();
}
public function scopeNotApproved($query){
  return $query->where('rep_status','!=' ,'تم الإعتماد')->get();
}
public function scopeApproved($query){
  return $query->where('rep_status','=' ,'تم الإعتماد')->get();
}
public function scopeThisWeek($query){

if (Carbon::today()->isSaturday()) {
$fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
return $query->whereBetween(DB::raw('date(rep_date)'), [Carbon::today(),$fri])->get();
}elseif (Carbon::today()->isFriday()) {
  $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
  return $query->whereBetween(DB::raw('date(rep_date)'), [$sat,Carbon::today()])->get();
}else {
   $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
   $fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
   return $query->whereBetween(DB::raw('date(rep_date)'), [$sat,$fri])->get();
}
}
public function scopeThismonth($query){

$carbon = new Carbon;
  return $query->whereBetween(DB::raw('date(rep_date)'), [$carbon->startOfMonth()->format('y-m-d'),$carbon->
  endOfMonth()->format('Y-m-d')])->get();

}
public function scopeDateRange($query,$date1,$date2){


  return $query->whereBetween(DB::raw('date(rep_date)'), [$date1,$date2])->get();

}
public function scopetoday($query){

  return $query->whereBetween('rep_date',[Carbon::today(),Carbon::today()->endOfDay()])->get();

}
}
