<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\FuncCall;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'title',
        'url',
        'seller',
        'price',
        'category_id'
    ];
    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function images() : HasMany{
        return $this->hasMany(Image::class);
    }
}
