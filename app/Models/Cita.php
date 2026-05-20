<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Imagen;

class Cita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cliente_id',
        'manicurista_id',
        'servicio_id',
        'fecha',
        'hora',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function manicurista()
    {
        return $this->belongsTo(User::class, 'manicurista_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}   