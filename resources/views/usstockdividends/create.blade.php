@extends('layouts.app')

@section('title', '新規作成')

@section('content')
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
      <input type="date" name="announceday" size="50" required>
    </div>
    <div>
      <label for="exrights">権利落日</label>
      <input type="date" name="exrights" size="50" required>
    </div>
    <div>
      <label for="paymentday">支払日</label>
      <input type="date" name="paymentday" size="50" required>
    </div>
    <div>
      <label for="dividend">配当内容</label>
      <input type="text" name="dividend" size="50" required>
    </div>
    <div>
      <input type="submit" value="登録する" class="btn btn-primary btn-sm">
    </div>
  </form>
@endsection
