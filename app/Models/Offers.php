<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Leads;

class Offers extends Model
{
    use HasFactory;

    public function Leads(){
        return $this->belongsTo(Leads::class, 'lead_name');
    }
}
