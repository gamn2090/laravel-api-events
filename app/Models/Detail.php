<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}

}
