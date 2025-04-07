<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'categoria_pai_id',
    ];

    // Categoria pai (caso seja subcategoria)
    public function categoriaPai()
    {
        return $this->belongsTo(Categoria::class, 'categoria_pai_id');
    }

    // Subcategorias
    public function subcategorias()
    {
        return $this->hasMany(Categoria::class, 'categoria_pai_id');
    }

    // Produtos relacionados (se for do tipo produto)
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_categoria');
    }
}
