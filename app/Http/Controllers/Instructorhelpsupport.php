<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suporttracker;
use Illuminate\Support\Facades\DB;

use App\Models\Supportmessagetracker;

class Instructorhelpsupport extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $helper = Suporttracker::select('*')->where('created_by',auth()->user()->id)
        ->get(); 
        $allhelp =  json_decode(json_encode($helper), true);

        return view("instructor.viewsupportchat", ["support" => $allhelp]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.support');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $support = new Suporttracker();
        $message = new Supportmessagetracker();
        $support->subject = $request->hsf_subject;
        $support->issues = $request->hsf_issue;
        $support->tran_id = $request->ordwid;
        $support->created_tag = 'INSTRUCTOR';
        
        $support->created_by = $user;
        $support->save();

        $lastInsertedID = $support->id;
        $message->ticket_id = $lastInsertedID;
        $message->f_id = $user;
        $message->t_id = 0;
        
        $message->message = $request->hsf_issue;
        $message->save();

        return redirect()->route('help.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supportTracker = Supportmessagetracker::leftjoin('users','users.id','=','supportmessagetrackers.f_id')->select('supportmessagetrackers.*','users.name','A.name as nafullname')->leftjoin('users as A','A.id','=','supportmessagetrackers.t_id')->where('ticket_id',$id)->get();
        $allhelp =  json_decode(json_encode($supportTracker), true);
        return view("instructor.chatsupport", ["support" => $allhelp]);
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

    public function insertchat(Request $request){
        $mess = new Supportmessagetracker();
        $sender = DB::select("SELECT * FROM suporttrackers where id = ".$request->idd);
        $topRow = $sender[0];
            $sendie = $topRow->created_by;

           // echo auth()->user()->id;die;

          $mess->ticket_id = $request->idd;
            $mess->f_id = auth()->user()->id;
            $mess->t_id = 0;
            $mess->message = $request->message;
            $mess->save();     
            return redirect()->route('help.show',$request->idd); 
    }
}
