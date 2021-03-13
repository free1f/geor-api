<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action',
        'ip'
    ];
}
