<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name'];

    public function containerObjects()
    {
        return $this->hasMany(ContainerObject::class);
    }

    public function varieties()
    {
        return $this->hasMany(Variety::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
