@extends('layouts.app')

@section('title', '編集')

@section('content')
<form action="/usstockdividends/{{ $usstockdividend->id }}" method="post">
    @csrf
    @method('patch')
    <div>
      <label for="ticker">ティッカー</label>
      <select name="ticker">
        @foreach ($usstocklists as $usstocklist)
          <option value="{{ $usstocklist->ticker }}" @if($usstocklist->ticker === $usstockdividend->ticker) selected @endif>{{ strtoupper($usstocklist->ticker) }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="announceday">発表日</label>
      <input type="date" name="announceday" size="50" value="{{ $usstockdividend->announceday }}" required>
    </div>
    <div>
      <label for="exrights">権利落日</label>
      <input type="date" name="exrights" size="50" value="{{ $usstockdividend->exrights }}" required>
    </div>
    <div>
      <label for="paymentday">支払日</label>
      <input type="date" name="paymentday" size="50" value="{{ $usstockdividend->paymentday }}" required>
    </div>
    <div>
      <label for="dividend">配当内容</label>
      <input type="text" name="dividend" size="50" value="{{ $usstockdividend->dividend }}" required>
    </div>
    <div>
      <input type="submit" value="更新する" class="btn btn-primary">
      <a href="/usstockdividends" class="btn btn-success d-inline-block">一覧に戻る</a>
    </div>
  </form>
@endsection
