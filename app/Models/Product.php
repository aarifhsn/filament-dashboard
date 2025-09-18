<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'category_id',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // For enum features to work, Like (getLabel, getColor) the DB column must be casted to the enum class.
    protected function casts(): array
    {
        return [
            'status' => ProductStatusEnum::class,
        ];
    }
}
