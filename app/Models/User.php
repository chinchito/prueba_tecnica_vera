<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Con esta funcion filtramos cualquier nombre buscado
    function scopeFilterUsers(Builder $query): Builder {
        // Aqui irían todos los when necesarios para filtar
        // los campos de los usuarios, yo lo estoy haciendo
        // con los datos por defecto de Laravel 10.x
        // name, email, email_verified_at
        return $query->when(request()->name, function (Builder $q, $name) {
            $q->where("name", "LIKE", "%" . $name . "%");
        })->when(request()->email, function (Builder $q, $email) {
            // El email, igual que el DNI me gusta buscarlo
            // que las primeras letras coincidan.
            $q->where("email", "LIKE",  $email . "%");
        });
    }

}
