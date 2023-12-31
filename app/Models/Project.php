<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers;

class Project extends Model
{
    use HasFactory;
    public function Customers(){
        return $this->hasMany(Customers::class,'project');
    }
}
