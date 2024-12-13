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

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}

// album has many songs
// album belongs to an artist (one or more) 