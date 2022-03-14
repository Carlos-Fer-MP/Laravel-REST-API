<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class WorkEntry extends Authenticate
{
    use Notifiable;

    protected $fillable = [

        'startDate', 'endDate',
    ];
    protected $casts = [

        'startDate' => 'datetime',
        'endDate' => 'datetime'
    ];

}
