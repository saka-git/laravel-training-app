<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingMenu extends Model
{
    use HasFactory;

    public function training_category()
    {
        return $this->belongsTo('App\Models\TrainingCategory');
    }

}