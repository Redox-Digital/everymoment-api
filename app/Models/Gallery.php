<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'media_id',
        'content_id'
    ];

    public function content() {
        return $this->belongsTo(Content::class);
    }

    public function media() {
        return $this->hasOne(Media::class);
    }
}
