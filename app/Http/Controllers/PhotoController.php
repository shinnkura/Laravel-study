<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    /**
     * アップロード画面
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * アップロード処理
     */
    public function store(Request $request)
    {
        // ファイルの保存
        // Requestクラスのfileメソッドで、
        // storeメソッドの第一引数は、保存先のディレクトリを指定
        // 第二引数は、ドライバー名を指定（ドライバーは「ディスク」ともいい、ファイルの管理方法のことを言います。）
        $saveFilePath = $request->file('image')->store('photos', 'public');
        Log::debug('ファイルパス：' . $saveFilePath);

        return to_route('photos.create')->with('success', 'アップロード完了');
    }
}
