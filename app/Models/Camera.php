<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camera extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'name', 'description', 'quantity', 'price', 'image', 'user_id'];
}
