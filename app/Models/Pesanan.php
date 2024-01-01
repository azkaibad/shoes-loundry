<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    //protected $fillable = [];
    protected $guarded = ['id'];

    public function service()
    {   
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
    return $this->hasOne(Review::class);
    }
}
