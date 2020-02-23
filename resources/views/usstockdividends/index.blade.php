@extends('layouts.app')

@section('title', '高配当米国株一覧')

@section('content')
<div>
  @if (Auth::check())
    <a href="/usstockdividends/create" class="btn btn-primary">新規作成</a>
  @endif
</div>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th style="width:10%" class="text-center">ティッカー</th>
      <th style="width:15%" class="text-center">発表日</th>
      <th style="width:15%" class="text-center">権利落日</th>
      <th style="width:15%" class="text-center">支払日</th>
      <th style="width:15%" class="text-center">配当内容</th>
      @if (Auth::check())
        <th style="width:30%" class="text-center"></th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($usstockdividends as $usstockdividend)
    <tr>
      <td class="text-center">{{ strtoupper($usstockdividend->ticker) }}</td>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->announceday)) }}</td>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->exrights)) }}</td>
      <td class="text-center">{{ date('Y/m/d',strtotime($usstockdividend->paymentday)) }}</td>
      <td class="text-center">{{ money_format("%.6n",$usstockdividend->dividend) }} USD</td>
      @if (Auth::check())
        <td class="text-center">
          {{-- <a href="/usstockdividends/{{ $usstockdividend->id }}" class="btn btn-primary btn-sm d-inline-block">詳細</a> --}}
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
  </tbody>
</table>
<a href="/" class="btn btn-success">TOPへ戻る</a><br>
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
