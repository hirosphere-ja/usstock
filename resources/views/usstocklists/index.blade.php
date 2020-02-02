@extends('layouts.app')

@section('title', '銘柄一覧')

@section('content')
<table class="table">
  <tr>
    <th>ティッカー</th>
    <th>銘柄名</th>
    <th>市場</th>
  </tr>
  @foreach ($usstocklists as $usstocklist)
  <tr>
    <td>{{ strtoupper($usstocklist->ticker) }}</td>
    <td>{{ $usstocklist->stockname }}</td>
    <td>{{ $usstocklist->market_id }}</td>
    <td><a href="/usstocklists/{{ $usstocklist->ticker }}">詳細を表示</a></td>
  </tr>
  @endforeach
</table>
@endsection
