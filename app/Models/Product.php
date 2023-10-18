<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'local_id',
        'name',
        'stock',
        'price',
        'unidad',
    ];

    public function detail(){
        return $this->hasMany(Detail::class);
    }

}
