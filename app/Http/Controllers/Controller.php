<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use View;
use App\Models\Auther;
use App\Models\Category;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function frontSet(Request $request) {

        //user_agent
        if (preg_match("/iPhone|iPod|Android.*Mobile|Windows.*Phone/", $_SERVER['HTTP_USER_AGENT'])) {
            $userAgent = "sp";
        } else {
            $userAgent = "pc";
        }
        define("USER_AGENT", $userAgent);

        //auther(Bloger)
        $mdAuther = new Auther;
        $autherList = $mdAuther->getAutherList('front');
        //auther(category)
        $mdCategory = new Category;
        $categoryList = $mdCategory->getCategoryList();

        $request->merge([
            'autherList' => $autherList,
            'categoryList' => $categoryList,
        ]);

        View::share('autherList', $autherList);
        View::share('categoryList', $categoryList);

    }
}
