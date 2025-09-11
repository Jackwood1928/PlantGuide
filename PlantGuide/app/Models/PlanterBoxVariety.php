<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanterBoxVariety extends Model
{
    protected $fillable = ['planter_box_id', 'variety_id'];

    public function planterBox()
    {
        return $this->belongsTo(PlanterBox::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
