<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'media_id',
        'text'
    ];

    // Either media or gallery
    public function media() {
        return $this->hasOne(Media::class);
    }

    public function gallery() {
        return $this->hasOne(Gallery::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
