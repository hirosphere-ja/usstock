<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usstocklist;
use App\Usstockmarket;

class UsstocklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usstocklists = Usstocklist::with('usstockmarket')->orderBy('ticker','asc')->get();
        return view('usstocklists.index', ['usstocklists' => $usstocklists]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usstocklists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usstocklist = new Usstocklist;

        $usstocklist->ticker = $request->ticker;
        $usstocklist->stockname = $request->stockname;
        $usstocklist->market_id = $request->market_id;

        $usstocklist->save();

        return redirect('/usstocklists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticker)
    {
        $usstocklist = Usstocklist::find($ticker);
        return view('usstocklists.show', ['usstocklist' => $usstocklist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ticker)
    {
        $usstocklist = Usstocklist::find($ticker);
        $usstockmarkets = Usstockmarket::all();
        return view('usstocklists.edit', ['usstocklist' => $usstocklist])->with('usstockmarkets',$usstockmarkets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ticker)
    {
        $usstocklist = Usstocklist::find($ticker);

        $usstocklist->ticker = $request->ticker;
        $usstocklist->stockname = $request->stockname;
        $usstocklist->market_id = $request->market_id;

        $usstocklist->save();

        return redirect('/usstocklists/'.$ticker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticker)
    {
        $usstocklist = Usstocklist::find($ticker);

        $usstocklist->delete();

        return redirect('/usstocklists');
    }
}
