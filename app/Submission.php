<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['article'];

    public function avg($key)
    {
        $evaluations = $this->evaluations;
        return $evaluations->pluck($key)->avg();
    }

    public function edition()
    {
        return $this->belongsTo('App\Edition');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function authors()
    {
        return $this->belongsToMany('App\User');
    }

    public function contact()
    {
        return $this->belongsTo('App\User');
    }

    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }
}
