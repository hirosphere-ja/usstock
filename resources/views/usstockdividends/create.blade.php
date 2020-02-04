@extends('layouts.app')

@section('title', '新規作成')

@section('content')
  <form action="/usstockdividends" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <input type="text" name="ticker">
    </div>
    <div>
      <label for="announceday">発表日</label>
      <input type="text" name="announceday" size="50">
    </div>
    <div>
      <label for="exrights">権利落日</label>
      <input type="text" name="exrights" size="50">
    </div>
    <div>
      <label for="paymentday">支払日</label>
      <input type="text" name="paymentday" size="50">
    </div>
    <div>
      <label for="dividend">配当内容</label>
      <input type="text" name="dividend" size="50">
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection
