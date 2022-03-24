<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.main.recipients_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules  = [
            'recipients'           => 'unique:recipients',
            'recipients_div'       => 'required',
            'recipients_branch'    => 'required'
        ];

        $messages = [
            'recipients.unique'             => 'recipient is already!',
            'recipients_div.required'       => 'Must be filled!',
            'recipients_branch.required'    => 'Must be filled!'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $category = new Recipient();
        $category->recipients = $request->recipients;
        $category->recipients_div = $request->recipients_div;
        $category->recipients_branch = $request->recipients_branch;
        $category->save();


        return redirect()->back()->with('success', 'Recipient added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function show(Recipient $recipient)
    {
        $data = Recipient::all();
        return view('dashboard.main.recipients', [
            'recipients' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipient $recipient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipient = Recipient::find($id);
        $recipient->delete();

        return redirect()->back()
            ->with('success', 'Recipient deleted successfully');
    }
}
