<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
protected $fillable = [
    'name',
    'description',
    ];
    public function furniture()
    {
    return $this->hasMany(Furniture::class);
    }
}
