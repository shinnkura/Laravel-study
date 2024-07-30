<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

    /////////////////////////////
    // クエリパラメータを取得
    /////////////////////////////
    // Requestと型指定すると、自動的に、その引数はFormからうけった情報を取得する
    public function queryStrings(Request $request)
    {
        // このkeywordは、htmlで書いたname属性の値
        // $keyword = $request->keyword;

        // またallメソッドを使用することで、すべての情報を配列で取得できる
        // $keyword = $request->all();

        // 初期値を設定（hasメソッド）
        // $keyword = '未設定';
        // if ($request->has('keyword')) {
        //     $keyword = $request->keyword;
        // }

        // 上記と同じ（getメソッド）
        $keyword = $request->get('keyword', '未設定');

        return 'キーワードは「' . $keyword . '」です';
    }


    /////////////////////////////
    // ルートパラメータ
    /////////////////////////////
    public function profile($id)
    {
        return 'IDは「' . $id . '」です';
    }

    // ルートパラメータ（複数）
    // ルートパラメータを指定した順番で、引数を設定できる
    // ただ、Requestと併用する場合は、Requestを最初に指定する
    public function productsArchive(Request $request, $category, $year)
    {
        return 'カテゴリーは「' . $category . '」、年は「' . $year . '」' . $request->get('page', 1) . 'ページ目です';
    }

    // public function routeLink()
    // {
    //     $url = route('profile');
    //     return 'プロフィールページのURLは' . $url . 'です';
    // }


    /////////////////////////////
    // 名前付きルート
    /////////////////////////////
    public function routeLink()
    {
        // ルートパラメータを指定する場合は、第二引数に連想配列で指定する
        // 存在しないルートパラメータを指定すると、クエリパラーメータとして扱われる
        $url = route('profile', ['id' => 123, 'name' => 'taro']);
        return 'プロフィールページのURLは' . $url . 'です';
    }
}
