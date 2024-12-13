<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $fillable = [
        'name',
        'index_date',
        'cover',
    ];

    public function album()
    {
        return $this->hasMany(Album::class);
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}

//artist has many albums (or none)
//artist has many songs (or none)