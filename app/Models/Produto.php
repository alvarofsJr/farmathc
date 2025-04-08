<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'categoria_id',
        'quantidade',
        'valor',
        'validade',
    ];

    protected $dates = ['validade'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function setValidadeAttribute($value)
    {
        if (!$value) {
            $this->attributes['validade'] = null;
            return;
        }

        $date = \DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['validade'] = $date ? $date->format('Y-m-d') : $value;
    }

    public function getValidadeAttribute($value)
    {
        if (!$value) {
            return null;
        }

        $date = \DateTime::createFromFormat('Y-m-d', $value);
        return $date ? $date->format('d/m/Y') : $value;
    }
}
