<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';

    protected $fillable = [
        'title',
        'release_date',
    ];
}

// song belongs to an artist (one or more)
// song belongs to an album