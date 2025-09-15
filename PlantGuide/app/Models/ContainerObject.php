<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContainerObject extends Model
{
    protected $fillable = ['type', 'name', 'location', 'plant_id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function varieties()
    {
        return $this->belongsToMany(Variety::class, 'container_object_varieties');
    }
}
