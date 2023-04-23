<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class,'group_user')->using(GroupUser::class)->withTimestamps();
    }

    public function introduced_users()
    {
        return $this->belongsToMany(User::class,'invitations')->using(Invitation::class)->withTimestamps();
    }
}