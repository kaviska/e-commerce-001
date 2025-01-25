<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $fillable = [
      
        'email',
        'password',
        'phone',
        'email_verified_at',
        'remember_token',
        'first_name',
        'last_name',
    ];
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
