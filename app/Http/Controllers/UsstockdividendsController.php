<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Usstocklist;
use App\Usstockdividend;

class UsstockdividendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usstockdividends = Usstockdividend::orderBy('announceday','desc')->get();
        return view('usstockdividends.index', ['usstockdividends' => $usstockdividends]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usstocklists = Usstocklist::orderBy('ticker','asc')->get();
        return view('usstockdividends.create', ['usstocklists' => $usstocklists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = $request->all();

        $rules = [
            'announceday' => 'required|before:exrights',
            'exrights' => 'required|before:paymentday',
            'paymentday' => 'required',
            'dividend' => 'required',
        ];

        $messages = [
            'announceday.required' => '発表日を入力してください。',
            'exrights.required' => '権利落日を入力してください。',
            'announceday.before' => '権利落日は発表日より後の日付を入力してください。',
            'paymentday.required' => '支払日を入力してください。',
            'exrights.before' => '支払日は権利落日より後の日付を入力してください。',
            'dividend.required' => '配当内容を入力してください。',
        ];

        $validator = Validator::make($requests,$rules,$messages);

        if($validator->fails()){
            return redirect('/usstockdividends/create')->withErrors($validator)->withInput();
        }

        $usstockdividend = new Usstockdividend;

        $usstockdividend->ticker = $request->ticker;
        $usstockdividend->announceday = $request->announceday;
        $usstockdividend->exrights = $request->exrights;
        $usstockdividend->paymentday = $request->paymentday;
        $usstockdividend->dividend = $request->dividend;

        $usstockdividend->save();

        return redirect('/usstockdividends');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usstockdividend = Usstockdividend::find($id);
        return view('usstockdividends.show', ['usstockdividend' => $usstockdividend]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usstockdividend = Usstockdividend::find($id);
        $usstocklists = Usstocklist::all();
        return view('usstockdividends.edit', ['usstockdividend' => $usstockdividend])->with('usstocklists',$usstocklists);
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
        $usstockdividend = Usstockdividend::find($id);

        $usstockdividend->ticker = $request->ticker;
        $usstockdividend->announceday = $request->announceday;
        $usstockdividend->exrights = $request->exrights;
        $usstockdividend->paymentday = $request->paymentday;
        $usstockdividend->dividend = $request->dividend;

        $usstockdividend->save();

        return redirect('/usstockdividends/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usstockdividend = Usstockdividend::find($id);

        $usstockdividend->delete();

        return redirect('/usstockdividends');
    }
}
