<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Auther;
use \App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function getList(Request $request) {

        $mdCategory = new Category;
        $categoryList = $mdCategory->getCategoryList();
        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();

        return view('admin.category.list', 
            compact(
                'categoryList',
                'autherNameList',
            )
        );
    }

    public function registShowForm(Request $request) {

        return view('admin.category.regist');

    }
    

    public function registConfirm(Request $request) {

        $validated = $request->validate([
                'name' =>  ['required',Rule::unique('categories', 'name')->whereNot('delete_flg', config('const.DELETE_FLG_ON'))],
            ],
            [
                'name.required' => '名前を入力してください。',
                'name.unique' => 'この名前は既に登録されています。',
            ]
        );

        $inputData = $request->input();

        return view('admin.category.regist_confirm', 
            compact(
                'inputData',
            )
        );

    }
    
    public function registExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('category.regist.showForm')->withInput($inputData);
        } else {
            $request->session()->regenerateToken();
            $mdCategory = new Category;
            $mdCategory->insertCategory($inputData);
        }
        return redirect()->route('category.list');
    }
    
    public function editShowForm(Request $request) {

        $editId = $request->id;
        $mdCategory = new Category;
        $categoryData = $mdCategory->getCategoryDataById($editId);
        $mdAuther = new Auther;
        $autherNameList = $mdAuther->getAutherNameList();

        return view('admin.category.edit', 
            compact(
                'categoryData',
                'autherNameList',
            )
        );
    }
    
    public function editConfirm(Request $request) {

        $validated  = $request->validate([
            'name' => ['required',Rule::unique('categories', 'name')->whereNot('id', $request->input('id'))->whereNot('delete_flg', config('const.DELETE_FLG_ON'))],
            'id' => 'required',
        ],
        [
            'name.required' => '名前を入力してください。',
            'name.unique' => 'この名前は既に登録されています。',
        ]);

        $inputData = $request->input();

        return view('admin.category.edit_confirm', 
            compact(
                'inputData',
            )
        );
    }
    
    public function editExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('category.edit.showForm', ['id'=>$inputData['id']])->withInput($inputData);
        } else {
            $request->session()->regenerateToken();
            $mdCategory = new Category;
            $mdCategory->updateCategory($inputData);
        }
        return redirect()->route('category.list');
    }
    
    public function delete(Request $request) {

        $deleteIds = $request->input('delete_id');

        $request->session()->regenerateToken();
        $mdCategory = new Category;
        $mdCategory->deleteCategory($deleteIds);
        return redirect()->route('category.list');
    }


}
