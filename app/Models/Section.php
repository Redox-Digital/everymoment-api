<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'content_id',
        'type',
        'order',
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function content() {
        return $this->hasOne(Content::class);
    }
}
