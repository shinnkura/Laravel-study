<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * 登録画面表示
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        /////////////////////
        // ログ出力
        /////////////////////
        // ページ内に出力（多次元配列などで見やすく表示）
        // dump($request->all());
        // dump($request->get('title'));

        // ページ内ではなく、ファイルに出力
        Log::debug('イベント名' . $request->get('title'));

        // POSTでデータを送信後、リロードすると、同じデータが再度送信されます
        // そのため、リダイレクト処理を行うことで、再送信を防ぎます
        // return view('events.create');

        ///////////////////////
        // リダイレクト処理
        ///////////////////////
        // redirect()ヘルパー関数を使用する方法
        // ・パスでリダイレクト
        // return redirect('/events/create');
        // ・ルート名を指定してリダイレクト（ルートパラメータ、クエリストリングも対応）
        // return redirect()->route('events.create');

        ///////////////////////////////
        // フラッシュメッセージ
        ///////////////////////////////
        // セッションにデータを保存を一時的に保存することができる
        // 保存されたデータは、次のリクエスト時に、自動削除される（フラッシュメッセージ）
        // フラッシュメッセージを使用する際は、
        // flash()メソッドか
        // with()メソッドを使用する必要がある
        // ・第一引数にキー、第二引数に値を指定
        // ・第一引数にキーを指定しない場合、'success'がデフォルト
        // ・第一引数にキーを指定する場合、そのキーでデータを取得する
        // ・with()メソッドは、リダイレクト先でのみデータを取得できる
        // フラッシュメッセージに保存されたデータは、通常のセッションと同様の方法で取得可能

        $title = $request->get('title');

        Log::debug('イベント名(セッションで取得)' . $title);

        // ルート名でリダイレクト
        // with()メソッドでフラッシュメッセージを設定
        return to_route('events.create')->with('success', $title . 'を登録しました！');

        // 一つ前のページにリダイレクト
        // return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
