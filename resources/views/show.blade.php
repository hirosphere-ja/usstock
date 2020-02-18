@extends('layouts.app')

@section('title', '個別銘柄現金配当 - '.strtoupper($ticker))

@section('content')
<table class="table">
  <thead>
    <tr>
      <th class="text-center">銘柄名</th>
      <th class="text-center">ティッカー</th>
      <th class="text-center">市場</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="text-center">{{ strtoupper($ticker) }}</td>
      <td class="text-center">{{ $usstocklist->stockname }}</td>
      <td class="text-center">{{ $usstocklist->usstockmarket->market }}</td>
    </tr>
  </tbody>
</table>
<table class="table table-hover">
  <tr>
    <th style="width:20%" class="text-center">発表日</th>
    <th style="width:20%" class="text-center">権利落日</th>
    <th style="width:20%" class="text-center">支払日</th>
    <th style="width:15%" class="text-center">配当内容</th>
    @if (Auth::check())
      <th style="width:15%"></th>
    @endif
  </tr>
  @foreach ($usstockdividends as $usstockdividend)
    <tr>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->announceday)) }}</td>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->exrights)) }}</td>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->paymentday)) }}</td>
      <td class="text-center">{{ money_format("%.6n",$usstockdividend->dividend) }} USD</td>
      @if (Auth::check())
      <td>
        <a href="/usstockdividends/{{ $usstockdividend->id }}/edit" class="btn btn-primary d-inline-block">編集</a>
        <form action="/usstockdividends/{{$usstockdividend->id}}" method="post" class="d-inline-block">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="submit" value="削除" class="btn btn-danger btn-dell">
        </form>
      </td>
    @endif
    </tr>
  @endforeach
</table>
<a href="/" class="btn btn-success d-inline-block">TOPに戻る</a><br>
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
