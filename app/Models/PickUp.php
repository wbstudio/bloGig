<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Library\Common;

class PickUp extends Model
{
    use HasFactory;
    
    public function getPickUpList()
    {
        $columnList = [
            'pu.id',
            'pu.name',
            'pu.auther_id',
            'pu.category_id',
            'pu.article_id',
            'pu.status',
            'pu.delete_flg',
            'pu.created_at',	
            'pu.updated_at',	
            'au.name as auther_name',	
            'ca.name as category_name',	
        ];

        $query = DB::table('pick_ups as pu');
        $query->select($columnList);

        $query->leftJoin('authers as au', 'au.id', '=', 'pu.auther_id');
        $query->leftJoin('categories as ca', 'ca.id', '=', 'pu.category_id');

        $query->where('pu.delete_flg', 0);
        $query->orderByDesc('pu.id');
        $aList = $query->get();

        return $aList;
    }

    public function checkPickUpData($inputData)
    {
        $columnList = [
            'id',
            'name',
            'auther_id',
            'category_id',
            'article_id',
            'status',
            'delete_flg',
            'created_at',	
            'updated_at',	
        ];

        $query = DB::table('pick_ups');
        $query->select($columnList);
        $query->where('delete_flg', 0);

        if (isset($inputData['auther'])) {
            $query->where('auther_id', $inputData['auther']);
        }

        if (isset($inputData['category'])) {
            $query->where('category_id', $inputData['category']);
        }

        if (!isset($inputData['auther']) && !isset($inputData['category'])) {
            $query->whereNull('auther_id');
            $query->whereNull('category_id');
        }

        $query->orderByDesc('id');
        $aNumber = $query->count();
        return $aNumber;
    }

    public function insertPickUpData($insertData)
    {
        $query = DB::table('pick_ups');

        $value = [
            'name' => $insertData['name'],
            'auther_id' => $insertData['auther'],
            'category_id' => $insertData['category'],
            'article_id' => $insertData['article'],
            'status' => null,
            'delete_flg' => config('const.DELETE_FLG_OFF'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $query->insert($value);
    }

    public function getPickUpDataById($editId)
    {
        $columnList = [
            'pu.id',
            'pu.name',	
            'pu.auther_id',	
            'pu.category_id',	
            'pu.article_id',	
            'pu.status',
            'pu.delete_flg',
            'pu.created_at',	
            'pu.updated_at',	
            'au.name as auther_name',	
            'ca.updated_at as category_name',	
        ];

        $query = DB::table('pick_ups as pu');
        $query->select($columnList);

        $query->leftJoin('authers as au', 'au.id', '=', 'pu.auther_id');
        $query->leftJoin('categories as ca', 'ca.id', '=', 'pu.category_id');

        $query->where('pu.delete_flg', config('const.DELETE_FLG_OFF'));
        $query->where('pu.id', $editId);
        $aData = $query->first();

        $aData->article_id = Common::separateComma($aData->article_id);

        return $aData;
    }

    public function updatePickUpData($insertData)
    {

        $value = [
            'name' => $insertData['name'],
            'article_id' => $insertData['article'],
            'updated_at' => now(),
        ];

        $query = DB::table('pick_ups');
        $query->where('id', $insertData['id']);
        $query->update($value);
    }

    public function deletePickUp($deleteIds)
    {
        $value = [
            'delete_flg' => config('const.DELETE_FLG_ON'),
            'updated_at' => now(),
        ];

        if (isset($deleteIds)) {
            $query = DB::table('pick_ups');
            $query->whereIn('id', $deleteIds);
            $query->update($value);
        }
    }
}
