<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

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
}
