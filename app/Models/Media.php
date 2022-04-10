<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'content_id',
        'url',
        'type',
        'description'
    ];

    public function content() {
        return $this->belongsTo(Content::class);
    }
}
