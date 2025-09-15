<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    protected $fillable = ['plant_id', 'name'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function containerObjects()
    {
        return $this->belongsToMany(ContainerObject::class, 'container_object_varieties');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
