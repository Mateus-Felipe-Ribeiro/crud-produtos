<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'quantidade',
        'foto',
        'category_id'
    ];

    // Validação para criação/atualização
    public static $rules = [
        'nome' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
        'descricao' => 'nullable|string|max:255',
        'quantidade' => 'required|numeric|min:0',
        'category_id' => 'required|numeric|min:0',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
