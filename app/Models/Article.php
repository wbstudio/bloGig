<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    use HasFactory;

    public function getArticlesList($arrayRequest)
    {
        $columnList = [
            "ar.id",
            "ar.auther",
            "ar.category",
            "ar.tag",
            "ar.title",
            "ar.heading",
            "ar.status",
            "ar.created_at",
            "ar.updated_at",
            "au.name as auther_name",
            "ca.name as category_name",
        ];

        $query = DB::table('articles as ar');

        $query->select($columnList);

        $query->join('authers as au', 'au.id', '=', 'ar.auther');
        $query->join('categories as ca', 'ca.id', '=', 'ar.category');

        $query->where('ar.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('au.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('ca.delete_flg', config('const.DELETE_FLG_OFF'));

        if (isset($arrayRequest['auther'])) {
            $query->where('ar.auther', $arrayRequest['auther']);
        }

        if (isset($arrayRequest['category'])) {
            $query->where('ar.category', $arrayRequest['category']);
        }
        $query->orderByDesc('ar.updated_at');

        $articleList = $query->paginate(config('const.ADMIN.LIST_PER_PAGE'));

        return $articleList;
    }

    public function insertArticleData($inputData)
    {
        $query = DB::table('articles');

        $value = [
            'title' => $inputData['title'],
            'main' => $inputData['main'],
            'heading' => $inputData['heading'],
            'eyecatch' => $inputData['image'],
            'auther' => $inputData['auther'],
            'category' => $inputData['category'],
            'tag' => $inputData['tag'],
            'status' => $inputData['status'],
            'release_at' => $inputData['release_at'],
            'end_at' => $inputData['end_at'],
            'count' => 307,
            'good' => 61,
            'delete_flg' => config('const.DELETE_FLG_OFF'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $query->insert($value);

    }

    public function getArticleDataById($id)
    {
        $columnList = [
            "ar.id",
            "ar.auther",
            "ar.category",
            "ar.tag",
            "ar.title",
            "ar.main",
            "ar.heading",
            "ar.eyecatch",
            "ar.status",
            "ar.release_at",
            "ar.end_at",
            "ar.created_at",
            "ar.updated_at",
        ];

        $query = DB::table('articles as ar');

        $query->select($columnList);

        $query->join('authers as au', 'au.id', '=', 'ar.auther');
        $query->join('categories as ca', 'ca.id', '=', 'ar.category');

        $query->where('ar.id', $id)
            ->where('ar.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('au.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('ca.delete_flg', config('const.DELETE_FLG_OFF'));


        $articleData = $query->first();

        return $articleData;
    }

    public function updateArticleData($insertData)
    {

        $value = [
            'title' => $insertData['title'],
            'main' => $insertData['main'],
            'heading' => $insertData['heading'],
            'eyecatch' => $insertData['image'],
            'auther' => $insertData['auther'],
            'category' => $insertData['category'],
            'tag' => $insertData['tag'],
            'status' => $insertData['status'],
            'release_at' => $insertData['release_at'],
            'end_at' => $insertData['end_at'],
            'updated_at' => now(),
        ];

        $query = DB::table('articles');
        $query->where('id', $insertData['id']);
        $query->update($value);
    }

    public function getArticlesNameList($arrayRequest)
    {
        $return = null;

        $columnList = [
            "ar.id",
            "ar.auther",
            "ar.category",
            "ar.tag",
            "ar.title",
            "ar.heading",
            "ar.status",
            "ar.created_at",
            "ar.updated_at",
        ];

        $query = DB::table('articles as ar');

        $query->select($columnList);

        $query->join('authers as au', 'au.id', '=', 'ar.auther');
        $query->join('categories as ca', 'ca.id', '=', 'ar.category');

        $query->where('ar.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('au.delete_flg', config('const.DELETE_FLG_OFF'))
            ->where('ca.delete_flg', config('const.DELETE_FLG_OFF'));

        if (isset($arrayRequest['auther'])) {
            $query->where('ar.auther', $arrayRequest['auther']);
        }

        if (isset($arrayRequest['category'])) {
            $query->where('ar.category', $arrayRequest['category']);
        }

        $query->orderByDesc('ar.updated_at');
        $aList = $query->get();

        if (isset($aList)) {
            foreach ($aList as $aData) {
                $return[$aData->id] = $aData->title;
            }
        }

        return $return;
    }
}
