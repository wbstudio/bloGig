<?php

namespace App\Http\Controllers\Page\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function topPage(Request $request) {

        parent::frontSet($request);
        $pageName = 'TOP_PAGE';

        return view('front.' . USER_AGENT . '.top',
                    compact(
                        'pageName',
                    //     'articlesData',
                    //     'autherDataList',
                    //     'categoryNameList',
                    //     'tagList',
                    )
                );
    }
}
