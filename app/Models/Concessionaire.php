<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concessionaire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id',
        'user_id',
        'status',
        'name',
        'RIF'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
}
