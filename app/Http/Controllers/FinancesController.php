<?php

namespace App\Http\Controllers;

use App\Models\Finances;
use Illuminate\Http\Request;

class FinancesController extends Controller
{
    public function index(){
        return view('finance',[
            'Finance' => Finances::all()
        ]);
    }
}
