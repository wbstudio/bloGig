<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Auther;
use \App\Models\Category;
use App\Library\Common;
use Illuminate\Validation\Rule;

class AutherController extends Controller
{
    //
    public function getList(Request $request) {

        $mdAuther = new Auther;
        $autherList = $mdAuther->getAutherList();
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.auther.list', 
            compact(
                'autherList',
                'categoryNameList',
            )
        );
    }

    public function registShowForm(Request $request) {

        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.auther.regist', 
            compact(
                'categoryNameList',
            )
        );
    }

    public function registConfirm(Request $request) {

        $validated  = $request->validate([
            'name' => 'required|unique:authers',
            'image' => 'mimes:jpg,jpeg,png,gif|unique:authers',
        ],
        [
            'name.required' => '名前を入力してください。',
            'name.unique' => 'この名前は既に登録されています。',
            'image.mimes' => '画像を設置してください。',
        ]);

        $inputData = $request->input();
        $inputData['image'] = null;

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/profile', $name);
            $inputData['image'] = $name;
            if ($request->input('profile_old') !== null 
            && $request->input('profile_old') !== $name) {
                $deleteImagePath = storage_path('app/public/profile/');
                $deleteImageName = $request->input('profile_old');
                Common::unlinkImage($deleteImagePath,$deleteImageName);
            }

        } else if ($request->input('profile_old')) {
            $inputData['image'] = $request->input('profile_old');
        }
            
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.auther.regist_confirm', 
            compact(
                'inputData',
                'categoryNameList',
            )
        );
    }

    public function registExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('auther.regist.showForm')->withInput($inputData);
        } else {
            $request->session()->regenerateToken();
            $mdAuther = new Auther;
            $mdAuther->insertAutherData($inputData);
        }
        return redirect()->route('auther.list');
    }

    public function editshowForm(Request $request) {

        $autherId = $request->id;
        $mdAuther = new Auther;
        $autherData = $mdAuther->getAutherDataById($autherId);
        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.auther.edit', 
            compact(
                'autherData',
                'categoryNameList',
            )
        );

    }
    //
    public function editConfirm(Request $request) {

        $validated  = $request->validate([
            'name' => ['required',Rule::unique('authers', 'name')->whereNot('id', $request->input('id'))],
            'id' => 'required',
            'image' => ['mimes:jpg,jpeg,png,gif',Rule::unique('authers', 'image')->whereNot('id', $request->input('id'))],

        ],
        [
            'name.required' => '名前を入力してください。',
            'name.unique' => 'この名前は既に登録されています。',
            'image.mimes' => '画像を設置してください。',
        ]);

        $inputData = $request->input();
        $inputData['image'] = null;

        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/profile', $name);
            $inputData['image'] = $name;

            $editIUd = $request->id;
            $mdAuther = new Auther;
            $autherData = $mdAuther->getAutherDataById($editIUd);
            
            if ($request->input('profile_old') !== null 
            && $request->input('profile_old') !== $name 
            && $request->input('profile_old') !== $autherData->image) {
                $deleteImagePath = storage_path('app/public/profile/');
                $deleteImageName = $request->input('profile_old');
                Common::unlinkImage($deleteImagePath,$deleteImageName);
            }
        } else if ($request->input('profile_old')) {
            $inputData['image'] = $request->input('profile_old');
        }

        $mdCategory = new Category;
        $categoryNameList = $mdCategory->getCategoryNameList();

        return view('admin.auther.edit_confirm', 
            compact(
                'inputData',
                'categoryNameList',
            )
        );
    }
    //
    public function editExecution(Request $request) {

        $inputData = $request->input();
        $action = $request->input('action');

        if ($action !== 'submit') {
            return redirect()->route('auther.edit.showForm', ['id'=>$inputData['id']])->withInput($inputData);
        } else {
            $request->session()->regenerateToken();
            $mdAuther = new Auther;            
            $editIUd = $inputData['id'];
            $autherData = $mdAuther->getAutherDataById($editIUd);

            if ($request->input('image') !== null 
            && $request->input('image') !== $autherData->image) {
                $deleteImagePath = storage_path('app/public/profile/');
                $deleteImageName = $autherData->image;
                Common::unlinkImage($deleteImagePath,$deleteImageName);
            }
            $mdAuther->updateAutherData($inputData);
        }
        return redirect()->route('auther.list');
    }
    // //
    public function autherDelete(Request $request) {

        $deleteIds = $request->input('delete_id');

        $request->session()->regenerateToken();
        $mdAuther = new Auther;
        $mdAuther->deleteAuther($deleteIds);
        return redirect()->route('auther.list');
    }
}
