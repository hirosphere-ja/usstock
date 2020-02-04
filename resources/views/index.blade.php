@extends('layouts.app')

@section('title', '米国株式配当')

@section('content')
<div>
  <a href="/usstocklists/" class="btn btn-primary">米国銘柄一覧管理</a>
  <a href="/usstockdividends/" class="btn btn-primary">現金配当一覧管理</a>
</div><br>
<form action="show">
  @csrf
  <div>
    <label for="ticker">ティッカー</label>
    <input type="text" name="ticker">
  </div>
  <input type="submit" value="検索">
</form>
@endsection
