<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $usstocklists = Usstocklist::orderBy('ticker','desc')->get();;
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
        return view('usstockdividends.edit', ['usstockdividend' => $usstockdividend]);
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
