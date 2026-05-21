<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'role'
    ];

    public function isAdmin()
{
    return $this->role === 'admin';
}

public function isCliente()
{
    return $this->role === 'cliente';
}

public function isManicurista()
{
    return $this->role === 'manicurista';
}

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class)
                    ->withPivot('precio_personalizado')
                    ->withTimestamps();
    }

    public function citasCliente()
    {
        return $this->hasMany(Cita::class, 'cliente_id');
    }

    public function citasManicurista()
    {
        return $this->hasMany(Cita::class, 'manicurista_id');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}