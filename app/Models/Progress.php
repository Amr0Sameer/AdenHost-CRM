<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Progress extends Model
{
    public function project(){
        return $this->hasMany(Project::class,'progress_id');
    }
}
