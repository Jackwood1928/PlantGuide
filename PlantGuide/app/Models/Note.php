<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note', 'plant_id', 'variety_id', 'url'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
