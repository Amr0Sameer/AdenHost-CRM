<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offers;

class Leads extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Offers(){
        return $this->hasMany(Offers::class,'lead_name');
    }
}
