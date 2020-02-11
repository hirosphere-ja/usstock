@extends('layouts.app')

@section('title', '銘柄一覧')

@section('content')
<div>
  <a href="/usstocklists/create" class="btn btn-primary">新規作成</a>
  <a href="/" class="btn btn-success">TOPへ戻る</a>

</div>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th style="width:10%" class="text-center">ティッカー</th>
      <th style="width:63%" class="text-center">銘柄名</th>
      <th style="width:10%" class="text-center">市場</th>
      @if (Auth::check())
        <th style="width:15%" class="text-center"></th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($usstocklists as $usstocklist)
    <tr>
      <td class="text-center">{{ strtoupper($usstocklist->ticker) }}</td>
      <td class="text-center">{{ $usstocklist->stockname }}</td>
      <td class="text-center">{{ $usstocklist->usstockmarket->market }}</td>
      <td class="text-center">
        @if (Auth::check())
        {{-- <a href="/usstocklists/{{ $usstocklist->ticker }}" class="btn btn-primary btn-sm d-inline-block">詳細</a> --}}
        <a href="/usstocklists/{{ $usstocklist->ticker }}/edit" class="btn btn-primary d-inline-block">編集</a>
        <form action="/usstocklists/{{$usstocklist->ticker}}" method="post" class="d-inline-block">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="submit" value="削除" class="btn btn-danger btn-dell">
        </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
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
