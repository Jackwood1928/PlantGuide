<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pot extends Model
{
    protected $fillable = ['name', 'plant_id', 'status'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
