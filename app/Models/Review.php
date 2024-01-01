<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function pesanan()
    {
    return $this->belongsTo(Pesanan::class);
    } 

    public function user()
    {
    return $this->belongsTo(User::class);
    } 
}
