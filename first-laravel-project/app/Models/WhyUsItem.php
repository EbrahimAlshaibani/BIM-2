<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhyUsItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'title',
        'desc',
    ];
    public function whyUs(): BelongsTo{
        return $this->belongsTo(WhyUs::class);
    }
}
