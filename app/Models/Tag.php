<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
    use HasFactory;

    public function getTagList()
    {

        $columnList = [
            "id",
            "name",
            "status",
            "delete_flg",
            "created_at",
            "updated_at",
        ];

        $query = DB::table('tags');
        $query->select($columnList);
        $query->where('delete_flg', config('const.DELETE_FLG_OFF'));

        $tagList = $query->get();

        return $tagList;
    }

    public function insertTagdata($inputData)
    {
        $query = DB::table('tags');

        $value = [
            'name' => $inputData['name'],
            'delete_flg' => config('const.DELETE_FLG_OFF'),
            'status' => config('const.TAG.STATUS.RELEASE'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $query->insert($value);
    }

    public function updateTagdata($inputData)
    {
        $value = [
            'name' => $inputData['name'],
            'updated_at' => now(),
        ];

        $query = DB::table('tags');
        $query->where('id', $inputData['id']);
        $query->update($value);
    }

    public function deleteTagdata($inputData)
    {
        $value = [
            'delete_flg' => config('const.DELETE_FLG_ON'),
            'updated_at' => now(),
        ];

        if (isset($inputData['delete_id'])) {
            $query = DB::table('tags');
            $query->whereIn('id', $inputData['delete_id']);
            $query->update($value);
        }
    }

    public function getTagNameList()
    {

        $return = [];

        $columnList = [
            "id",
            "name",
            "status",
            "delete_flg",
            "created_at",
            "updated_at",
        ];

        $query = DB::table('tags');
        $query->select($columnList);
        $query->where('delete_flg', config('const.DELETE_FLG_OFF'));

        $aList = $query->get();

        if (isset($aList)) {
            foreach ($aList as $aData) {
                $return[$aData->id] = $aData->name;
            }
        }

        return $return;

    }
}
