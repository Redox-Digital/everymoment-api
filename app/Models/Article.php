<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'preview_img'
    ];

    public function relatedProducts() {
        return $this->hasMany(RelatedProduct::class);
    }
}
