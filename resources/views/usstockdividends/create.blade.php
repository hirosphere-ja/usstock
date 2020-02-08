@extends('layouts.app')

@section('title', '新規作成')

@section('content')
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="/usstockdividends" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <select name="ticker">
        @foreach ($usstocklists as $usstocklist)
          <option value="{{ $usstocklist->ticker }}">{{ strtoupper($usstocklist->ticker) }}</option>
        @endforeach
      </select>
      </div>
    <div>
      <label for="announceday">発表日</label>
    <input type="date" name="announceday" size="50" value="{{ old('announceday') }}">
    </div>
    <div>
      <label for="exrights">権利落日</label>
      <input type="date" name="exrights" size="50" value="{{ old('exrights') }}">
    </div>
    <div>
      <label for="paymentday">支払日</label>
      <input type="date" name="paymentday" size="50" value="{{ old('paymentday') }}">
    </div>
    <div>
      <label for="dividend">配当内容</label>
      <input type="text" name="dividend" size="4" value="{{ old('dividend') }}">
    </div>
    <div>
      <input type="submit" value="登録する" class="btn btn-primary">
      <a href="/usstockdividends" class="btn btn-success d-inline-block">一覧に戻る</a>
    </div>
  </form>
@endsection
