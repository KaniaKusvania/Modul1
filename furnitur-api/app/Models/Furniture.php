<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Furniture extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
protected $fillable = [
    'name',
    'type',
    'description',
    'price',
    'image',
    ];
    public function category()
    {
    return $this->belongsTo(Category::class);
    }
}
