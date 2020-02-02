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
<a href="/usstocklists/{{ $usstocklist->ticker }}/edit" class="btn btn-primary btn-sm d-inline-block">編集</a>
<form action="/usstocklists/{{$usstocklist->ticker}}" method="post" class="d-inline-block">
  @csrf
  <input type="hidden" name="_method" value="delete">
  <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
</form>
<a href="/usstocklists" class="btn btn-success btn-sm d-inline-block">一覧に戻る</a>
@endsection
@section('script')
<script>
  $(function(){
    $(".btn-dell").click(function(){
      if(confirm("本当に削除しますか？")){
      // そのまま削除
      }else{
        return false;
      }
    });
  });
</script>
@endsection
