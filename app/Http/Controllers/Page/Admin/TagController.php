<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    //
    public function getList() {
        //DAO
        $mdTag = new Tag();
        $tagList = $mdTag->getTagList();

        return view('admin.tag.list', 
                    compact(
                        'tagList',
                    )
                );
    }

    public function regist(Request $request) {
        /*
        * バリデーション
        */
        $this->validate($request, [
            'name' =>  ['required',Rule::unique('tags', 'name')->whereNot('delete_flg', config('const.DELETE_FLG_ON'))],
            ]);

        $inputData = $request->input();
        //DAO
        $mdTag = new Tag();
        $mdTag->insertTagdata($inputData);

        return redirect()->route('tag.list')->with('result', '登録');
    }

    public function delete(Request $request) {
        $inputData['delete_id'] = $request->input("delete_id");
        //DAO
        $mdTag = new Tag();
        $mdTag->deleteTagdata($inputData);

        return redirect()->route('tag.list')->with('result', '削除');
    }

    public function edit(Request $request) {
        //DAO
        $inputData['id'] = $request->id;
        $inputData['name'] = $request->name;
        $mdTag = new Tag();
        $mdTag->updateTagdata($inputData);

        return true;
    }

}
