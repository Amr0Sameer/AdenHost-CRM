<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\Offers;
use App\Models\Project;
use App\Models\Pendings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offer',[
            'Offers' => Offers::Where('active','inactive')->get(),
            'Leads' => Leads::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lead_name' => 'required',
            'size' => 'required',
            'language' => 'required',
            'programming' => 'required',
            'price' => 'required',
            'time' => 'required',
            'discount' => 'required'
       ]);
       
       $offer = new Offers();
       $offer->lead_name = strip_tags($request->input('lead_name'));
       $offer->size = strip_tags($request->input('size'));
       $offer->language = strip_tags($request->input('language'));
       $offer->programming = strip_tags($request->input('programming'));
       $offer->price = strip_tags($request->input('price'));
       $offer->time = strip_tags($request->input('time'));
       $offer->discount = strip_tags($request->input('discount'));
       $offer->active = 'inactive';

       if($offer->save()){
        return response()->json('Success','201');
       }
       else{
        return response()->json('Fail','400');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Offer = Offers::find($id);
        if($Offer){
            return response()->json([
                'status' => '200',
                'offer' => $Offer
            ]);
        }
        else
        {
            return response()->json([
                'status' => '404',
                'offer' => 'No Offer Is Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date=date_create(date("Y/m/d"));

        $Toffer = Offers::find($id);
        $lead = Leads::find($Toffer->lead_name);
        $lead->type = 'partner';
        $project = new Project();

        if($Toffer->time == 'اسبوع'){
            date_add($date,date_interval_create_from_date_string("1 week"));
            $endDate = date_format($date,"Y/m/d");
        }
        else if($Toffer->time == 'اسبوعين'){
            date_add($date,date_interval_create_from_date_string("2 week"));
            $endDate = date_format($date,"Y/m/d");
        }
        else if($Toffer->time == 'ثلاثة اسابيع'){
            date_add($date,date_interval_create_from_date_string("3 week"));
            $endDate = date_format($date,"Y/m/d");
        }
        else if($Toffer->time == 'شهر'){
            date_add($date,date_interval_create_from_date_string("1 month"));
            $endDate = date_format($date,"Y/m/d");
        }
        else if($Toffer->time == 'شهرين'){
            date_add($date,date_interval_create_from_date_string("2 month"));
            $endDate = date_format($date,"Y/m/d");
        }
        else if($Toffer->time == 'ثلاثة اشهر'){
            date_add($date,date_interval_create_from_date_string("3 month"));
            $endDate = date_format($date,"Y/m/d");
        }
        $project->company_name = $lead->name;
        $project->project_name = 'Website';
        $project->start_date = date("Y/m/d");
        $project->end_date = $endDate;
        $project->offer_id = $Toffer->id;
        if($project->save()){
            $Toffer->active = 'active';
            $Toffer->save();
            $lead->save();
        }
        return redirect()->route('offer.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lead_name' => 'required',
            'size' => 'required',
            'language' => 'required',
            'programming' => 'required',
            'price' => 'required',
            'time' => 'required',
            'discount' => 'required'
       ]);
       
       $offer = Offers::findOrFail($id);
       if($offer){
       $offer->lead_name = strip_tags($request->input('lead_name'));
       $offer->size = strip_tags($request->input('size'));
       $offer->language = strip_tags($request->input('language'));
       $offer->programming = strip_tags($request->input('programming'));
       $offer->price = strip_tags($request->input('price'));
       $offer->time = strip_tags($request->input('time'));
       $offer->discount = strip_tags($request->input('discount'));
       $offer->active = false;
       $offer->save();
       return redirect()->route('offer.index');
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Offers::findOrFail($id);
        $delete->active = 'pending';
        $delete->save();
        return redirect()->route('offer.index');
    }
}
