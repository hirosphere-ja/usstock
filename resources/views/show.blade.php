@extends('layouts.app')

@section('title', '個別銘柄現金配当')

@section('content')
<table class="table">
  <tr>
    <th>ティッカー</th>
    <th>銘柄名</th>
    <th>市場</th>
  </tr>
  <tr>
    <td>{{ strtoupper($ticker) }}</td>
    <td>{{ $usstocklist->stockname }}</td>
    <td>{{ $usstocklist->usstockmarket->market }}</td>
  </tr>
</table>
<table class="table">
  <tr>
    <th>発表日</th>
    <th>権利落日</th>
    <th>支払日</th>
    <th>配当内容</th>
  </tr>
  @foreach ($usstockdividends as $usstockdividend)
    <tr>
      <td>{{ date('Y/m/d',strtotime($usstockdividend->announceday)) }}</td>
      <td>{{ date('Y/m/d',strtotime($usstockdividend->exrights)) }}</td>
      <td>{{ date('Y/m/d',strtotime($usstockdividend->paymentday)) }}</td>
      <td>{{ money_format("%.6n",$usstockdividend->dividend) }} USD</td>
      <td>
        <a href="/usstockdividends/{{ $usstockdividend->id }}/edit" class="btn btn-primary btn-sm d-inline-block">編集</a>
        <form action="/usstockdividends/{{$usstockdividend->id}}" method="post" class="d-inline-block">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
        </form>
      </td>
    </tr>
  @endforeach
</table>
<a href="/" class="btn btn-success btn-sm d-inline-block">TOPに戻る</a>
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
