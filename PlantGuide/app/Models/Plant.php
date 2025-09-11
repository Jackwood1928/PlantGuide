<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name'];

    public function planterBoxes()
    {
        return $this->hasMany(PlanterBox::class);
    }

    public function pots()
    {
        return $this->hasMany(Pot::class);
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
