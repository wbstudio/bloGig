<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\PickUp;
use \App\Models\Auther;
use \App\Models\Article;
use \App\Models\Category;
use App\Library\Common;
use Illuminate\Validation\Rule;

class PickUpController extends Controller
{
    //
    public function getList(Request $request) {

        $mdPickUp = new PickUp;
        $pickUpList = $mdPickUp->getPickUpList();
        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.pickUp.list', 
            compact(
                'pickUpList',
                'autherNameList',
                'categoryNameList',
            )
        );
    }

    public function registShowForm(Request $request) {

        $arrayRequest = [
            'auther' => $request->input('auther'),
            'category' => $request->input('category'),
        ];

        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdArticle = new Article;
        $articleList = $mdArticle->getArticlesNameList($arrayRequest);

        $queryString = '&auther=' . $arrayRequest['auther'] .
                        '&category=' . $arrayRequest['category'];

        return view('admin.pickUp.regist', 
            compact(
                'arrayRequest',
                'queryString',
                'autherNameList',
                'categoryNameList',
                'articleList',
            )
        );
    }

    public function registConfirm(Request $request) {

        $inputData = $request->input();
        $arrayRequest = [
            'auther' => null,
            'category' => null,
        ];
        $error = null;

        $mdPickUp = new PickUp;
        $pickUpCnt = $mdPickUp->checkPickUpData($inputData);
        if ($pickUpCnt > 0) {
            $error = '同じ条件のpickUpが存在するため登録できません。';
        }

        $uniqueList = array_unique($inputData['article']);
        $articleUniqueList = array_diff($uniqueList, array(null));
        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdArticle = new Article;
        $articleList = $mdArticle->getArticlesNameList($arrayRequest);

        return view('admin.pickUp.regist_confirm', 
            compact(
                'error',
                'inputData',
                'autherNameList',
                'categoryNameList',
                'articleUniqueList',
                'articleList',
            )
        );
    }

    public function registExecution(Request $request) {

        $inputData = $request->input();
        $insertData = [
            'auther' => null,
            'category' => null,
            'article' => null,
        ];

        $insertData['name'] =  $inputData['name'];
        if (isset($inputData['auther'])) {
            $insertData['auther'] =  $inputData['auther'];
        }
        if (isset($inputData['category'])) {
            $insertData['category'] =  $inputData['category'];
        }
        if (isset($inputData['article'])) {
            $insertData['article'] =  join(',', $inputData['article']);
        }

        $action = $request->input('action');
        if ($action !== 'submit') {
            return redirect()->route('pickUp.regist.showForm')->withInput($inputData);
        } else {
            $request->session()->regenerateToken();
            $mdPickUp = new PickUp;
            $mdPickUp->insertPickUpData($insertData);
        }
        return redirect()->route('pickUp.list');
    }

    public function editShowForm(Request $request) {

        $arrayRequest = [
            'auther' => $request->input('auther'),
            'category' => $request->input('category'),
        ];

        $editId = $request->id;
        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdArticle = new Article;
        $articleList = $mdArticle->getArticlesNameList($arrayRequest);
        $mdPickUp = new PickUp;
        $pickUpData = $mdPickUp->getPickUpDataById($editId);
        $search = null;
        if (!empty($request->input('search'))) {
            $search = 'on';
        }

        $queryString = '&auther=' . $arrayRequest['auther'] .
                        '&category=' . $arrayRequest['category'];

        return view('admin.pickUp.edit', 
            compact(
                'arrayRequest',
                'queryString',
                'autherNameList',
                'categoryNameList',
                'articleList',
                'pickUpData',
                'search',
            )
        );
    }

    public function editConfirm(Request $request) {
        $inputData = $request->input();
        $arrayRequest = [
            'auther' => null,
            'category' => null,
        ];

        $uniqueList = array_unique($inputData['article']);
        $articleUniqueList = array_diff($uniqueList, array(null));
        $mdArticle = new Article;
        $articleList = $mdArticle->getArticlesNameList($arrayRequest);
        $mdPickUp = new PickUp;
        $pickUpData = $mdPickUp->getPickUpDataById( $request->input('id'));

        return view('admin.pickUp.edit_confirm', 
            compact(
                'inputData',
                'articleUniqueList',
                'articleList',
                'pickUpData',
            )
        );
    }

    public function editExecution(Request $request) {

        $inputData = $request->input();
        $insertData = [
            'article' => null,
        ];

        $insertData['id'] =  $inputData['id'];
        $insertData['name'] =  $inputData['name'];
        if (isset($inputData['article'])) {
            $insertData['article'] =  join(',', $inputData['article']);
        }

        $action = $request->input('action');
        if ($action == 'submit') {
            $request->session()->regenerateToken();
            $mdPickUp = new PickUp;
            $mdPickUp->updatePickUpData($insertData);
        }
        return redirect()->route('pickUp.list');
    }

    public function delete(Request $request) {

        $deleteIds = $request->input('delete_id');

        $request->session()->regenerateToken();
        $mdPickUp = new PickUp;
        $mdPickUp->deletePickUp($deleteIds);
        return redirect()->route('pickUp.list');
    }
}