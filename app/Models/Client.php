<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'phone_number',
        'address',
        'email',
        'document_id',
        'document_number',
        'client_type',
    ];

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }

}
