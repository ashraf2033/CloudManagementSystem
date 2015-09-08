<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technican extends Model
{
    protected $fillable=['tech_name','tech_type'];

    public function repair(){
      return $this->belongsToMany('App\Repair');
    }
    public function task(){
      return $this->belongsToMany('App\Task');
    }

    }
