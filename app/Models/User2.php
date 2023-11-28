<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'hash'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Хеширование пароля и присвоение хеша полю hash
            $user->password = Hash::make($user->password);
            $user->hash = $user->password;
        });
    }

    public function articles()
    {

        
        return $this->hasMany(Article::class);
    }


}
