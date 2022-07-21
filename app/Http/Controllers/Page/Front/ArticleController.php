<?php

namespace App\Http\Controllers\Page\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{

    public function searchArticleList(Request $request) {

        parent::frontSet($request);
        $pageName = 'ARTICLE_LIST';

        return view('front.' . USER_AGENT . '.article_list',
                    compact(
                        'pageName',
                    //     'articlesData',
                    //     'autherDataList',
                    //     'categoryNameList',
                    //     'tagList',
                    )
                );
    }

    public function articleDetail(Request $request) {

        parent::frontSet($request);
        $pageName = 'ARTICLE_DETAIL';
        $articleId = $request->article_id;

        $mdArticle = new Article;
        $articleData = $mdArticle->getArticleDetailById($articleId);
        $tagsList = null;
        $mdTag = new Tag;
        if (isset($articleData->tag)) {
            $tagsList = $mdTag->getTagListArticleCall(explode(',', $articleData->tag));
        }

        return view('front.' . USER_AGENT . '.article_detail',
                    compact(
                        'pageName',
                        'articleData',
                        'tagsList',
                    //     'categoryNameList',
                    //     'tagList',
                    )
                );
    }
}
