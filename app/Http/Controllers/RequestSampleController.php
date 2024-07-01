<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

    // クエリパラメータを取得
    public function queryStrings(Request $request)
    {
        // $keyword = $request->input('keyword');
        // $keyword = 'キーワードが指定されていません';
        // if ($request->has('keyword')) {
        //     $keyword = $request->keyword;
        // }

        // 上記と同じ
        $keyword = $request->get('keyword', 'キーワードが指定されていません');

        return 'キーワードは「' . $keyword . '」です';
    }


    // ルートパラメータ
    public function profile($id)
    {
        return 'IDは「' . $id . '」です';
    }

    // ルートパラメータ（複数）
    public function productsArchive(Request $request, $category, $year)
    {
        return 'カテゴリーは「' . $category . '」、年は「' . $year . '」'. $request->get('page', 1) . 'ページ目です';
    }

    // public function routeLink()
    // {
    //     $url = route('profile');
    //     return 'プロフィールページのURLは' . $url . 'です';
    // }
}
