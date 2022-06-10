<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Library\Common;

class Category extends Model
{
    use HasFactory;

    public function getCategoryList()
    {
        $columnList = [
            'id',
            'name',	
            'auther',	
            'status',
            'delete_flg',
            'created_at',	
            'updated_at',	
        ];

        $query = DB::table('categories');
        $query->select($columnList);
        $query->where('delete_flg', config('const.DELETE_FLG_OFF'));
        $query->orderByDesc('id');
        $aList = $query->get();

        if (isset($aList)) {
            foreach ($aList as $aData) {
                $aData->auther = Common::separateVerticalBar($aData->auther);
            }
        }
        return $aList;
    }

    public function insertCategory($inputData)
    {

        $query = DB::table('categories');

        $value = [
            'name' => $inputData['name'],
            'delete_flg' => config('const.DELETE_FLG_OFF'),
            'status' => config('const.CATEGORY.RELEASE'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $query->insert($value);
    }

    public function getCategoryDataById($id)
    {
        $columnList = [
            'id',
            'name',	
            'auther',
            'status',
            'collect_category',
            'delete_flg',
            'created_at',	
            'updated_at',	
        ];

        $query = DB::table('categories');
        $query->select($columnList);
        $query->where('delete_flg', 0);
        $query->where('id', $id);
        $aData = $query->first();
        $aData->auther = Common::separateVerticalBar($aData->auther);

        return $aData;
    }

    public function updateCategory($inputData)
    {

        $value = [
            'name' => $inputData['name'],
            'updated_at' => now(),
        ];

        $query = DB::table('categories');
        $query->where('id', $inputData['id']);
        $query->update($value);
    }

    public function deleteCategory($deleteIds)
    {
        if (isset($deleteIds)) {
            foreach ($deleteIds as $id) {
                $query = DB::table('categories');
                $query->where('id', $id);
                $query->update(
                    [
                        'delete_flg' => config('const.DELETE_FLG_ON'),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }

    public function getCategoryNameList()
    {
        $columnList = [
            'id',
            'name',	
            'auther',
            'status',
            'delete_flg',
            'created_at',	
            'updated_at',	
        ];

        $return = [];
        $query = DB::table('categories');
        $query->select($columnList);
        $query->where('delete_flg', 0);
        $aList = $query->get();

        if (isset($aList)) {
            foreach ($aList as $aData) {
                $return[$aData->id] = $aData->name;
            }
        }

        return $return;
    }

}
