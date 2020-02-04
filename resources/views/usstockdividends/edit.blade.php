@extends('layouts.app')

@section('title', '編集')

@section('content')
<form action="/usstockdividends/{{ $usstockdividend->id }}" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <input type="text" name="ticker" value="{{ $usstockdividend->ticker }}">
    </div>
    <div>
      <label for="announceday">発表日</label>
      <input type="text" name="announceday" size="50" value="{{ $usstockdividend->announceday }}">
    </div>
    <div>
      <label for="exrights">権利落日</label>
      <input type="text" name="exrights" size="50" value="{{ $usstockdividend->exrights }}">
    </div>
    <div>
      <label for="paymentday">支払日</label>
      <input type="text" name="paymentday" size="50" value="{{ $usstockdividend->paymentday }}">
    </div>
    <div>
      <label for="dividend">配当内容</label>
      <input type="text" name="dividend" size="50" value="{{ $usstockdividend->dividend }}">
    </div>
    <div>
      <input type="hidden" name="_method" value="patch">
      <input type="submit" value="送信" class="btn btn-primary btn-sm">
    </div>
  </form>
@endsection