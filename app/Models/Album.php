<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title', 'year', 'rating', 'number_of_songs', 'singer_id'];

    public function singer()
    {
        return $this->belongsTo(Singer::class);
    }
}
