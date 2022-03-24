<?php

namespace App\Http\Controllers;

use App\Models\Initiator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InitiatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.main.initiators_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules  = [
            'initiators'           => 'unique:initiators',
            'initiators_div'       => 'required',
            'initiators_branch'    => 'required'
        ];

        $messages = [
            'initiators.unique'             => 'Initiator is already!',
            'initiators_div.required'       => 'Must be filled!',
            'initiators_branch.required'    => 'Must be filled!'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $category = new Initiator();
        $category->initiators = $request->initiators;
        $category->initiators_div = $request->initiators_div;
        $category->initiators_branch = $request->initiators_branch;
        $category->save();


        return redirect()->back()->with('success', 'Initiator added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Initiator  $initiator
     * @return \Illuminate\Http\Response
     */
    public function show(Initiator $initiator)
    {
        $data = Initiator::all();
        return view('dashboard.main.initiator', [
            'initiator' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Initiator  $initiator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $updt = Initiator::findOrFail($id);
        $updt->initiators            = $request->input('initiators');
        $updt->initiators_div        = $request->input('initiators_div');
        $updt->initiators_branch     = $request->input('initiators_branch');
        $updt->update($request->all());

        return redirect()->back()->with('success', 'Initiator edit successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Initiator  $initiator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initiator $initiator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Initiator  $initiator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $initiator = Initiator::find($id);
        $initiator->delete();

        return redirect()->back()
            ->with('success', 'Initiator deleted successfully');
    }
}
