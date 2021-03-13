<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'abb',
        'prefix'
    ];

    public function states()
    {
        return $this->hasMany('App\Models\State');
    }
}
