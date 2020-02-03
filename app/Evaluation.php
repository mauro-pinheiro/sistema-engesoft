<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['originality', 'presentation', 'content'];
    public function avg()
    {
        return ($this->originality + $this->presentation + $this->content) / 3;
    }

    public function submission()
    {
        return $this->belongsTo('App\Submission');
    }

    public function evaluator()
    {
        return $this->belongsTo('App\User');
    }
}
