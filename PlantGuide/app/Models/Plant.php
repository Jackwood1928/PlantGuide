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

    public function varieties()
    {
        return $this->hasMany(Variety::class);
    }
}
