@extends('layouts.default')

@section('title', '画像を表示')
@section('content')
    @if(session()->has('success'))
        <p>{{session()->get('success')}}</p>
    @endif
    <img src="{{ asset('storage/photos/' . $fileName) }}" alt="">

    {{-- 削除処理 --}}
    <form action={{ route('photos.destroy', ['photo'=> $fileName]) }} method="post">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

    {{-- ダウンロード  --}}
    <a href={{ route('photos.download', ['photo' => $fileName]) }}>ダウンロード</a>
@endsection

