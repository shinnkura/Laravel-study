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

        // ルート名でリダイレクト
        return to_route('events.create');

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
