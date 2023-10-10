<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stat;

class Project extends Model
{
    use HasFactory;
    public function stat(){
        return $this->belongsTo(Stat::class,'stat_id');
    }
    public function progress(){
        return $this->belongsTo(progress::class, 'progress_id');
     }
}
