<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title','startdate', 'enddate', 'description' ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
