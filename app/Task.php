<?php

namespace App;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_name','task_date','user_id','task_status','task_type','tech_id','machine_id'];
protected $dates = ['task_date','created_at','updated_at'];
    protected $primaryKey = 'task_id';
    public function machine(){
      return $this->belongsTo('App\Machine');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function technican(){
      return $this->belongsToMany('App\Technican');
    }
    public function parts(){
      return $this->belongsToMany('App\SparePart')->withPivot('part_qty');
    }

      public function scopeThisWeek($query){

      if (Carbon::today()->isSaturday()) {
      $fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
      return $query->whereBetween(DB::raw('date(task_date)'), [Carbon::today(),$fri])->get();
      }elseif (Carbon::today()->isFriday()) {
        $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
        return $query->whereBetween(DB::raw('date(task_date)'), [$sat,Carbon::today()])->get();
      }else {
         $sat = new Carbon; $sat = $sat->previous(Carbon::SATURDAY);
         $fri = new Carbon; $fri = $fri->next(Carbon::FRIDAY);
         return $query->whereBetween(DB::raw('date(task_date)'), [$sat,$fri])->get();
      }
      }

    public function scopeLastWeek($query){

      $today = date('Y-m-d');
      $seven_days_ago = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
      return $query->whereBetween(DB::raw('date(task_date)'), [$seven_days_ago,$today]);

    }
    public function scopetoday($query){

      return $query->where('task_date','=',Carbon::today())->get();

    }

    public function scopeDateRange($query,$date1,$date2){

      return $query->whereBetween(DB::raw('date(task_date)'), [$date1,$date2])->get();

    }
    public function scopeThismonth($query){

    $carbon = new Carbon;
      return $query->whereBetween(DB::raw('date(task_date)'), [$carbon->startOfMonth()->format('y-m-d'),$carbon->
      endOfMonth()->format('Y-m-d')])->get();

    }
    public function scopeFinished($query){
    return  $query->where('task_status','=' ,'تمت')->get();
    }
    public function scopeUnfinished($query){
    return  $query->where('task_status','=' ,'مجدولة')->get();
    }
}
