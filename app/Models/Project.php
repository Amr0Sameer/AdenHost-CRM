<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Project extends Model
{
    public function status(){
        return $this->hasMany(Status::class,'id','id');
    }
}
