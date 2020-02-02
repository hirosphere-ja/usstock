@extends('layouts.app')

@section('title', '銘柄一覧')

@section('content')
<div>
  <a href="/usstocklists/create" class="btn btn-primary btn-sm">新規作成</a>
</div>
<table class="table">
  <tr>
    <th>ティッカー</th>
    <th>銘柄名</th>
    <th>市場</th>
    <th></th>
  </tr>
  @foreach ($usstocklists as $usstocklist)
  <tr>
    <td>{{ strtoupper($usstocklist->ticker) }}</td>
    <td>{{ $usstocklist->stockname }}</td>
    <td>{{ $usstocklist->usstockmarket->market }}</td>
    <td>
      <a href="/usstocklists/{{ $usstocklist->ticker }}" class="btn btn-primary btn-sm d-inline-block">詳細</a>
      <a href="/usstocklists/{{ $usstocklist->ticker }}/edit" class="btn btn-primary btn-sm d-inline-block">編集</a>
      <form action="/usstocklists/{{$usstocklist->ticker}}" method="post" class="d-inline-block">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
      </form>
    </td>  </tr>
  @endforeach
</table>
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
