<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContainerObjectVariety extends Model
{
    protected $fillable = ['container_object_id', 'variety_id'];

    public function containerObject()
    {
        return $this->belongsTo(ContainerObject::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
