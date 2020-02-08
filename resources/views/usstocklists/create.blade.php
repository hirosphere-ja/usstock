@extends('layouts.app')

@section('title', '新規作成')

@section('content')
  <form action="/usstocklists" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <input type="text" name="ticker" required>
    </div>
    <div>
      <label for="stockname">銘柄名</label>
      <input type="text" name="stockname" size="50" required>
    </div>
    <div>
      <label for="market_id">市場</label>
      <select name="market_id">
        <option value="1">NYSE</option>
        <option value="2">NASDAQ</option>
      </select>
    </div>
    <div>
      <input type="submit" value="登録する" class="btn btn-primary btn-sm">
    </div>
  </form>
@endsection
