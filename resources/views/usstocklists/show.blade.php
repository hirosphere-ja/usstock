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
<a href="/usstocklists">一覧に戻る</a>
@endsection
