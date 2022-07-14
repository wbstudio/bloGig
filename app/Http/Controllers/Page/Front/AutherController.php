<?php

namespace App\Http\Controllers\Page\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auther;

class AutherController extends Controller
{
    //
    public function autherDetail(Request $request) {

        parent::frontSet($request);
        $pageName = 'AUTHER_PAGE';
        $autherId = $request->auther_id;
        
        $mdAuther = new Auther;
        $autherData = $mdAuther->getAutherDataById($autherId);


        return view('front.' . USER_AGENT . '.auther',
                    compact(
                        'pageName',
                        'autherData',
                    //     'categoryNameList',
                    //     'tagList',
                    )
                );
    }

}
