<?php

namespace MateusTeste\CrudAdminlte\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
