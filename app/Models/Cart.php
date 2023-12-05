<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['cam_id', 'brand', 'name', 'quantity', 'price', 'image', 'user_name', 'status', 'user_id'];
}
