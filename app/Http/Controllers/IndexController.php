<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usstockdividend;
use App\Usstocklist;

class IndexController extends Controller
{
    public function index(){
        $usstocklists = Usstocklist::all('ticker', 'desc');
        return view('index', ['usstocklists' => $usstocklists]);
    }

    public function show(Request $request){
        // キーワード受け取り
        $ticker = $request->input('ticker');
        // クエリ生成
        $query = Usstockdividend::query();

        // もしキーワードがあったら
        if(!empty($ticker)){
            $query->where('ticker',$ticker);
        }

        $usstockdividends = $query->orderBy('announceday','desc')->paginate(100);
        $usstocklist = Usstocklist::find($ticker);
        return view('show')->with('usstockdividends',$usstockdividends)->with('usstocklist',$usstocklist)->with('ticker',$ticker);
    }

    public function destroy($id)
    {
        $usstockdividend = Usstockdividend::find($id);

        $usstockdividend->delete();

        return redirect('/');
    }
}
