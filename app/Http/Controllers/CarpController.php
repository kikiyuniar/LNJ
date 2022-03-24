<?php

namespace App\Http\Controllers;

use App\Models\Carp;
use App\Models\Initiator;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $init = Initiator::all();
        $recip = Recipient::all();
        return view('dashboard.main.carp_post', [
            'initiator' => $init,
            'recipient' => $recip
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $table_no = '00000';
        $carp = 'CARP';
        $code = $carp . $table_no;
        $auto = substr($code, 8);
        $auto = intval($code) + 1;
        $auto_number = substr($code, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;

        $data = new Carp();
        $data->carp_code = $auto_number;
        $data->initiator_id = $request->initiator_id;
        $data->recipient_id = $request->recipient_id;
        $data->category = $request->category;
        $data->verified_by = $request->verified_by;
        $data->due_date = $request->due_date;
        $data->effectiveness = $request->effectiveness;
        $data->status_date = $request->status_date;
        $data->stage = $request->stage;
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'CARP added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Carp::leftJoin('initiators', 'initiators.id', '=', 'carp.initiator_id')
            ->leftJoin('recipients', 'recipients.id', '=', 'carp.recipient_id')
            ->orderBy('carp.id', 'desc')
            ->get(['carp.*', 'initiators.*', 'recipients.*', 'carp.id as carpid']);
        return view('dashboard.main.carp', [
            'carp' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carp  $carp
     * @return \Illuminate\Http\Response
     */
    public function show(Carp $carp)
    {
        $data = Carp::all();
        $init = Initiator::all();
        $recip = Recipient::all();
        return view('dashboard.main.carp_edit', [
            'carp' => $data,
            'initiator' => $init,
            'recipient' => $recip

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carp  $carp
     * @return \Illuminate\Http\Response
     */
    public function edit(Carp $carp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carp  $carp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Carp::findOrFail($id);
        $data = new Carp();
        $data->initiator_id = $request->initiator_id;
        $data->recipient_id = $request->recipient_id;
        $data->category = $request->category;
        $data->verified_by = $request->verified_by;
        $data->due_date = $request->due_date;
        $data->effectiveness = $request->effectiveness;
        $data->status_date = $request->status_date;
        $data->stage = $request->stage;
        $data->status = $request->status;
        $data->update($request->all());

        return redirect()->back()->with('success', 'CARP edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carp  $carp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carp = Carp::find($id);
        $carp->delete();

        return redirect()->back()
            ->with('success', 'CARPs deleted successfully');
    }
}
