<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        // return to_route('photos.create')->with('success', 'アップロード完了');


        // 画像のパス名のみを取得
        $fileName = pathinfo($saveFilePath, PATHINFO_BASENAME);
        Log::debug('ファイル名：' . $fileName);

        // アップロードした画像を表示
        return to_route('photos.show', ['photo' => $fileName])->with('success', 'アップロード完了');
    }

    /**
     * 画像表示
     */
    public function show(string $fileName)
    {
        return view('photos.show', ['fileName' => $fileName]);
    }

    /**
     * 画像削除
     */
    public function destroy(string $fileName)
    {
        // ファイルの削除
        // Storageファサードのdiskメソッドで、ディスクを指定
        Storage::disk('public')->delete('photos/' . $fileName);
        return to_route('photos.create')->with('success', '削除完了');
    }

    /**
     * ファイルのダウンロード
     */
    public function download(string $fileName)
    {
        // ファイルのダウンロード
        // Storageファサードのdiskメソッドで、ディスクを指定
        return Storage::disk('public')->download('photos/' . $fileName, 'download.jpg');
    }
}
