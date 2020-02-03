<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = ['number', 'volume', 'theme', 'month', 'year', 'lead_editor_id'];

    public function leadEditor()
    {
        return $this->belongsTo('App\User');
    }

    public function publicada()
    {
        return (Carbon::now()->isAfter(Carbon::create($this->year, $this->month, 1)));
    }

    public function situacao()
    {
        if ($this->publicada()) {
            return "Publicada";
        } else {
            return "Não publicada";
        }
    }

    public function submissions()
    {
        return $this->hasMany('App\Submission');
    }
}
