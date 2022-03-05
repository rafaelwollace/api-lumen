<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    use HasFactory;

    protected $table = 'episodios';

    protected $fillable = [
        'series_id',
        'temporada',
        'numero',
        'assistido'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id', 'id');
    }


    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }
}
