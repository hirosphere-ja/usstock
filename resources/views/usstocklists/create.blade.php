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
  <form action="/usstocklists" method="post">
    @csrf
    <div>
      <label for="ticker">ティッカー</label>
      <input type="text" name="ticker" size="5"  value="{{ old('ticker') }}">
    </div>
    <div>
      <label for="stockname">銘柄名</label>
      <input type="text" name="stockname" size="50" value="{{ old('stockname') }}">
    </div>
    <div>
      <label for="market_id">市場</label>
      <select name="market_id">
        <option value="1" @if(old('market_id') === '1') selected @endif>NYSE</option>
        <option value="2" @if(old('market_id') === '2') selected @endif>NASDAQ</option>
      </select>
    </div>
    <div>
      <input type="submit" value="登録する" class="btn btn-primary">
      <a href="/usstocklists" class="btn btn-success d-inline-block">一覧に戻る</a>
    </div>
  </form>
@endsection
