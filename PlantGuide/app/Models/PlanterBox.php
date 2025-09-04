<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanterBox extends Model
{
    protected $fillable = ['position', 'plant_id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
