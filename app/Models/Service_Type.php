<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Type extends Model
{
    public function index(){
    return Service_Type::with('Project')->get();
    }
}
