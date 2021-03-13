<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concessionaire_id',
        'status',
        'name',
        'last_name',
        'identification'
    ];

    public function concessionaire()
    {
        return $this->belongsTo('App\Models\User');
    }
}
