<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Leads',[
            'Leads' => Leads::Where('type','customer')->get()
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'project_type' => 'required',
            'offer_state' => 'required'
       ]);
       
       $lead = new Leads();
       $lead->name =   strip_tags($request->input('name'));
       $lead->phone = strip_tags($request->input('phone'));
       $lead->email =  strip_tags($request->input('email'));
       $lead->project_type = strip_tags($request->input('project_type'));
       $lead->offer_state = strip_tags($request->input('offer_state'));
       $lead->type = 'customer';

       if($lead->save()){
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
        $Leads = Leads::find($id);
        if($Leads){
            return response()->json([
                'status' => '200',
                'lead' => $Leads
            ]);
        }
        else
        {
            return response()->json([
                'status' => '404',
                'lead' => 'No Lead Is Found'
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
        //
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
            'update_name' => 'required',
            'update_phone' => 'required',
            'update_email' => 'required',
            'update_project_type' => 'required',
            'update_offer_state' => 'required'
       ]);
       $lead = Leads::findOrFail($id);
         if($lead){
            $lead->name =   strip_tags($request->input('update_name'));
            $lead->phone = strip_tags($request->input('update_phone'));
            $lead->email =  strip_tags($request->input('update_email'));
            $lead->project_type =  strip_tags($request->input('update_project_type'));
            $lead->offer_state =  strip_tags($request->input('update_offer_state'));
            $lead->save();
            return redirect()->route('leads.index');
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
        $delete = Leads::findOrFail($id);
        $delete->delete();
        return redirect()->route('leads.index');
    }
}
