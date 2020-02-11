@extends('layouts.app')

@section('title', '米国株式配当')

@section('content')
@if (Auth::check())
  <p>USER: {{ $user->name . ' (' . $user->email . ')' }}(<a href="/logout">ログアウト</a>)</p>
  <div>
    <a href="/usstocklists/" class="btn btn-primary">米国銘柄一覧管理</a>
    <a href="/usstockdividends/" class="btn btn-primary">現金配当一覧管理</a>
  </div><br>
@else
  <div>
    <a href="/usstockdividends/" class="btn btn-primary">現金配当一覧</a>
  </div><br>
@endif
<form action="show">
  @csrf
  <div>
    <label for="ticker">ティッカー</label>
    <select name="ticker">
      @foreach ($usstocklists as $usstocklists)
        <option value="{{ $usstocklists->ticker }}">{{ strtoupper($usstocklists->ticker) }}</option>
      @endforeach
    </select>
    <input type="submit" value="ティッカー検索" class="btn btn-primary">
  </div>
</form>
@endsection
