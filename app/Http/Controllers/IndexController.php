<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usstockdividend;

class IndexController extends Controller
{
    public function index(){
        return view('index');
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
        return view('show')->with('usstockdividends',$usstockdividends)->with('ticker',$ticker);
    }
}
