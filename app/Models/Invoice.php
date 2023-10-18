<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'local_id',
        'event_id',
        'client_id',
        'total',
        'subtotal',
        'taxes',
        'observation',
        'creation_date',
        'active',
        'status',
    ];

    public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function detail()
	{
		return $this->hasMany(Detail::class);
	}	

}
