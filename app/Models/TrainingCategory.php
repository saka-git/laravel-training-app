<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCategory extends Model
{
    use HasFactory;

    public function training_menus()
    {
        return $this->hasMany('App\Models\TrainingMenu');
    }

}