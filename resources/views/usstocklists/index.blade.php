@extends('layouts.app')

@section('title', '銘柄一覧')

@section('content')
<div>
  <a href="/usstocklists/create">新規作成</a>
</div>
<table class="table">
  <tr>
    <th>ティッカー</th>
    <th>銘柄名</th>
    <th>市場</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  @foreach ($usstocklists as $usstocklist)
  <tr>
    <td>{{ strtoupper($usstocklist->ticker) }}</td>
    <td>{{ $usstocklist->stockname }}</td>
    <td>{{ $usstocklist->market_id }}</td>
    <td><a href="/usstocklists/{{ $usstocklist->ticker }}" class="btn btn-primary btn-sm">詳細</a></td>
    <td><a href="/usstocklists/{{ $usstocklist->ticker }}/edit" class="btn btn-primary btn-sm">編集</a></td>
    <td>
      <form action="/usstocklists/{{$usstocklist->ticker}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection
