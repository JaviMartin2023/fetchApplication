<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'singer_id',
        'year',
        'number_of_songs',
        'rating',
    ];

    /**
     * Get the singer that owns the album.
     */
    public function singer()
    {
        return $this->belongsTo(Singer::class);
    }
}