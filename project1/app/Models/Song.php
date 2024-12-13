<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'release_date',
        'file_path',
        'cover_path',
    ];
}