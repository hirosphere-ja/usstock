@extends('layouts.app')

@section('title', '銘柄詳細')

@section('content')
<table class="table">
  <tr>
    <th>ティッカー</th>
    <th>銘柄名</th>
    <th>市場</th>
  </tr>
  <tr>
    <td>{{ strtoupper($usstocklist->ticker) }}</td>
    <td>{{ $usstocklist->stockname }}</td>
    <td>{{ $usstocklist->market_id }}</td>
  </tr>
</table>
<a href="/usstocklists/{{ $usstocklist->ticker }}/edit" class="btn btn-primary btn-sm">編集</a>
<form action="/usstocklists/{{$usstocklist->ticker}}" method="post">
  @csrf
  <input type="hidden" name="_method" value="delete">
  <input type="submit" value="削除" class="btn btn-danger btn-sm">
</form><br>
<a href="/usstocklists" class="btn btn-success btn-sm">一覧に戻る</a>
@endsection
