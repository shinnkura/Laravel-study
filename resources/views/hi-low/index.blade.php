@extends('layouts.default')

@section('title', 'ハイアンドロー')
@section('content')
    {{-- 
    下記のコードには、問題点があります。
    なぜなら、必勝法があるからです。
    このルールでは、ディーラが「12」だった場合、「自分のカードが同じか小さい」を選択することで、100％当てることができます。
    そして、現在のコードでは、ディベロッパーツール上から、ディーラの数字を簡単に書き換えられるため
    必勝法となってしまうのです。
    
    こうならないために、Laravel上では、セッションを利用して、ディーラの数字を保持することが一般的です。
    ディーラの数字を隠しパラメータで送信するのではなく、セッションに保存することで、
    ユーザーがディーラの数字を書き換えることができなくなります。
     --}}
    <p>ディーラのカードは...『{{ $dealersNumber }}』</p>
    <form method="POST" action="{{ route('hi-low') }}">
        @csrf
        {{-- <input type="hidden" name="dealersNumber" value="{{ $dealersNumber }}" /> --}}
        <button type="submit" name="guess" value="high">自分のカードが大きい</button>
        <button type="submit" name="guess" value="low">自分のカードが同じか小さい</button>
    </form>
@endsection