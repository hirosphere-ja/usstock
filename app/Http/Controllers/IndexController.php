<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Usstockdividend;
use App\Usstocklist;

class IndexController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $sort = $request->sort;
        $usstocklists = Usstocklist::all()->sortBy('ticker');
        $param = ['usstocklists' => $usstocklists,'sort'=>$sort,'user'=>$user];
        return view('index', $param);
    }

    public function getLogout(){
        Auth::logout();
        $usstocklists = Usstocklist::all()->sortBy('ticker');;
        $param = ['usstocklists' => $usstocklists];
        return view('index', $param);
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
