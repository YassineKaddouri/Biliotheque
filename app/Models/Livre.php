<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Livre extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable= ['titre','slug','description' ,'auteur' ,'image' ,'prix','category','inStock','qte'];
}
