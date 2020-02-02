@extends('layouts.app')

@section('title', '編集')

@section('content')
<form action="/usstocklists/{{ $usstocklist->ticker }}" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <input type="text" name="ticker" value="{{ $usstocklist->ticker }}">
    </div>
    <div>
      <label for="ticker">銘柄名</label>
      <input type="text" name="stockname" size="50" value="{{ $usstocklist->stockname }}">
    </div>
    <div>
      <label for="market_id">銘柄名</label>
      <select name="market_id">
        <option value="1">NYSE</option>
        <option value="2">NASDAQ</option>
      </select>
    </div>
    <div>
      <input type="hidden" name="_method" value="patch">
      <input type="submit" value="送信" class="btn btn-primary btn-sm">
    </div>
  </form>
@endsection
