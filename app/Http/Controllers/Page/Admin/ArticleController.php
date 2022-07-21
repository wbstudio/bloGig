<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Article;
use \App\Models\Auther;
use \App\Models\Category;
use \App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Library\Common;

class ArticleController extends Controller
{
    //
    public function getList(Request $request) {

        $arrayRequest = [
            'auther' => $request->input('auther'),
            'category' => $request->input('category'),
        ];
        
        $mdArticle = new Article();
        $articleList = $mdArticle->getArticlesList($arrayRequest);

        $mdAuther = new Auther();
        $autherNameList = $mdAuther->getAutherNameList();

        $mdCategory = new Category();
        $categoryNameList = $mdCategory->getCategoryNameList();

        // ページャーURLに引数追加
         if ($articleList->isNotEmpty()) {
            $articleList->appends($arrayRequest);
        }

        $queryString = '&auther=' . $arrayRequest['auther'] .
                        // '&bond_name=' . urlencode($arrayRequest['bond_name']) .
                        '&category=' . $arrayRequest['category'];

        return view('admin.article.list', 
                    compact(
                        'arrayRequest',
                        'queryString',
                        'articleList',
                        'autherNameList',
                        'categoryNameList',
                    )
                );
    }

    public function registShowForm() {

        $mdAuther = new Auther();
        $autherDataList = $mdAuther->getAutherDataList();
        $mdCategory = new Category();
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdTag = new Tag();
        $tagList = $mdTag->getTagList();

        return view('admin.article.regist', 
                    compact(
                        'autherDataList',
                        'categoryNameList',
                        'tagList',
                    )
                );
    }

    public function registConfirm(Request $request) {
        $inputData = $request->input();
                /*
        * バリデーション
        */
        $this->validate($request, [
            'auther' => 'required',
            'category' => 'required',
        ]);

        $inputData['image'] = null;
        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/eyecatch', $name);
            $inputData['image'] = $name;
        } else if ($request->input('eyecatch_old')) {
            $inputData['image'] = $request->input('eyecatch_old');
        }

        $mdAuther = new Auther();
        $autherDataList = $mdAuther->getAutherDataList();
        $mdCategory = new Category();
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdTag = new Tag();
        $tagNameList = $mdTag->getTagNameList();

        return view('admin.article.regist_confirm', 
                    compact(
                        'autherDataList',
                        'categoryNameList',
                        'tagNameList',
                        'inputData',
                    )
                );
    }

    public function registExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('article.regist.showForm')->withInput($inputData);
        } else {
            $request->session()->regenerateToken();

            $insertData = [
                'category' => null,
                'tag' => null,
            ];
            $insertData = $inputData;

            //tag
            if(!isset($inputData['category'])){
                $insertData['category'] = null;
            }
            //tag
            if (isset($inputData['tag']) && $inputData['tag'] != null){
                $insertData['tag'] = join(",", $inputData['tag']);
            } else {
                $insertData['tag'] = null;
            }
            //公開開始時間
            $insertData['release_at'] = $inputData['release_year']. '-' . $inputData['release_month'] . '-' . $inputData['release_day'] . ' ' . $inputData['release_hour'] . ':' . $inputData['release_minute'];
            //公開終了時間
            if (isset($inputData['endstatus']) && $inputData['endstatus'] == 'on') {
                $insertData['end_at'] = $inputData['end_year']. '-' . $inputData['end_month'] . '-' . $inputData['end_day'] . ' ' . $inputData['end_hour'] . ':' . $inputData['end_minute'];
            } else {
                $insertData['end_at'] = '9999-12-31 23:59';
            }

            $mdArticle = new Article;
            $mdArticle->insertArticleData($insertData);
        }
        return redirect()->route('article.list');
    }

    public function editShowForm(Request $request) {

        $editId = $request->id;
        $mdArticle = new Article;
        $articleData = $mdArticle->getArticleDataById($editId);
        $mdAuther = new Auther();
        $autherDataList = $mdAuther->getAutherDataList();
        $mdCategory = new Category();
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdTag = new Tag();
        $tagList = $mdTag->getTagList();

        $release = Common::dateSplit($articleData->release_at, 'release');

        if ($articleData->end_at == "9999-12-31 23:59:00") {
            $end['editEndFlag'] = 1;
        } else {
            $end = Common::dateSplit($articleData->end_at, 'end');
            $end['editEndFlag'] = 0;
        }

        $articleData->tagsData = null;
        if(isset($articleData->tag)){
            $articleData->tagsData = explode(",", $articleData->tag);
        }
        
        return view('admin.article.edit', 
                    compact(
                        'autherDataList',
                        'categoryNameList',
                        'tagList',
                        'articleData',
                        'release',
                        'end',
                    )
                );
    }

    public function editConfirm(Request $request) {
        $inputData = $request->input();
        /*
        * バリデーション
        */
        $this->validate($request, [
            'auther' => 'required',
            'category' => 'required',
        ]);

        $inputData['image'] = null;

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/eyecatch', $name);
            $inputData['image'] = $name;            
        } else if ($request->input('eyecatch_old')) {
            $inputData['image'] = $request->input('eyecatch_old');
        }

        $mdAuther = new Auther();
        $autherDataList = $mdAuther->getAutherDataList();
        $mdCategory = new Category();
        $categoryNameList = $mdCategory->getCategoryNameList();
        $mdTag = new Tag();
        $tagNameList = $mdTag->getTagNameList();

        return view('admin.article.edit_confirm', 
                    compact(
                        'autherDataList',
                        'categoryNameList',
                        'tagNameList',
                        'inputData',
                    )
                );
    }

    public function editExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('article.edit.showForm', ['id' => $inputData['id']])->withInput($inputData);
        } else {
            $request->session()->regenerateToken();

            $insertData = $inputData;

            //tag
            if (isset($inputData['tag']) && $inputData['tag'] != null){
                $insertData['tag'] = join(",", $inputData['tag']);
            } else {
                $insertData['tag'] = null;
            }
            //公開開始時間
            $insertData['release_at'] = $inputData['release_year']. '-' . $inputData['release_month'] . '-' . $inputData['release_day'] . ' ' . $inputData['release_hour'] . ':' . $inputData['release_minute'];
            //公開終了時間
            if (isset($inputData['endstatus']) && $inputData['endstatus'] == 'on') {
                $insertData['end_at'] = $inputData['end_year']. '-' . $inputData['end_month'] . '-' . $inputData['end_day'] . ' ' . $inputData['end_hour'] . ':' . $inputData['end_minute'];
            } else {
                $insertData['end_at'] = '9999-12-31 23:59';
            }

            $mdArticle = new Article;
            $mdArticle->updateArticleData($insertData);
        }

        return redirect()->route('article.list');
    }

}
