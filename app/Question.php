<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text', 'answer', 'author', 'email', 'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo('App\Theme');
    }
}
