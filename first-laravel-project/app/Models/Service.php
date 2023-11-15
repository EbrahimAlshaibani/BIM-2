<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'title',
        'desc',
        'border_color',
        'icon_color',
        'bg_color',
    ];
}
