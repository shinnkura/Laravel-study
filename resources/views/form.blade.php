@extends('layouts.default')

@section('title', 'GETフォーム')
@section('content')
{{-- 
actionは遷移先のURLではありません。ボタンが押された際のリクエスト先のURLです。
では、なぜ送信後にページが遷移するように見えるのか？
それは、query-stringsにAPIが叩かれた時に、
queryStringsアクションが実行され、その結果、「キーワードは「' . $keyword . '」です」という文字列が返されるからです。
このため、viewファイルが更新され、その結果、ページが遷移するように見えるのです。
--}}
    <form action="/query-strings" method="get">
        <label >キーワード：<input type="text" name="keyword"></label>
        {{-- submitタイプは、押されたらactionが発火する --}}
        <button type="submit">送信</button>
    </form>
@endsection