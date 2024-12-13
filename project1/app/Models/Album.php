<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'name',
        'description',
        'cover',
        'release_date',
    ];
}

// album has many songs
// album belongs to an artist (one or more) 