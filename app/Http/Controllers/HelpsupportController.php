<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suporttracker;
use App\Models\Supportmessagetracker;
use Illuminate\Support\Facades\DB;

class HelpsupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $helper = DB::table('suporttrackers')
        ->join('users', 'users.id', '=', 'suporttrackers.created_by')
        ->select(
            'suporttrackers.*',
            'users.name',
            DB::raw('CASE WHEN suporttrackers.tran_id is null then "" else (select stat from refund where tran_id = suporttrackers.tran_id) end  as tra'),
            DB::raw('CASE WHEN (SELECT amount FROM withdrawals WHERE id IN (SELECT ref_id FROM transactions WHERE id = suporttrackers.tran_id)) IS NULL THEN "NA" ELSE (SELECT amount FROM withdrawals WHERE id IN (SELECT ref_id FROM transactions WHERE id = suporttrackers.tran_id)) END AS Amount'),
            DB::raw('CASE WHEN (SELECT amount FROM withdrawals WHERE id IN (SELECT ref_id FROM transactions WHERE id = suporttrackers.tran_id)) IS NULL THEN "NA" ELSE (SELECT created_at FROM withdrawals WHERE id IN (SELECT ref_id FROM transactions WHERE id = suporttrackers.tran_id)) END AS Datee')
        )
        ->get();
        $allhelp =  json_decode(json_encode($helper), true);

        return view("admin.cms.helpnsupport", ["support" => $allhelp]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mess = new Supportmessagetracker();
        $sender = DB::select("SELECT * FROM suporttrackers where id = ".$request->idd);
        $topRow = $sender[0];
            $sendie = $topRow->created_by;

          
            $mess->ticket_id = $request->idd;
            $mess->f_id = 0;
            $mess->t_id = $sendie;
            $mess->message = $request->message;
            $mess->save();     
            return redirect()->route('helps.show',$request->idd); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supportTracker = Supportmessagetracker::leftjoin('users','users.id','=','supportmessagetrackers.f_id')->select('supportmessagetrackers.*','users.name','A.name as nafullname')->leftjoin('users as A','A.id','=','supportmessagetrackers.t_id')->where('ticket_id',$id)->get();
        $allhelp =  json_decode(json_encode($supportTracker), true);
        return view("admin.cms.supportfull", ["support" => $allhelp]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
