<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WhyUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'video',
    ];
    public function items(): HasMany{
        return $this->hasMany(WhyUsItem::class);
    }
}
