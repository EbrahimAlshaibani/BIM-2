<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ajaycalicut17\LaravelTrash\Traits\Trashable;
use Ajaycalicut17\LaravelTrash\Events\MoveToTrash;
use Ajaycalicut17\LaravelTrash\Models\Trash;
class Car extends Model
{
    use HasFactory;
    // use SoftDeletes, Trashable;
    protected $fillable = [ 
        "name",
        "model",
        "manufacturer",
        "color",
        "vin",
        "price",
        "is_avaiable",
    ];
    // protected $dispatchesEvents = [
    //     'trashed' => MoveToTrash::class,
    // ];
    // public static function trashName(Model $model): string
    // {
    //     return static::class.' '.$model->id;
    // }
}
