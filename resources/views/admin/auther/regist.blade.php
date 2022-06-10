@extends('admin.layout')
@section('title', '筆者登録')
@section('css')
<link rel="stylesheet" href="{{ mix('css/admin/auther.css') }}">
@endsection
@section('js')
<script src="{{ mix('js/admin/auther/main.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('auther.regist.confirm')}}" class="regist"  enctype="multipart/form-data">
    @csrf
        @if ($errors->first('name'))   <!-- ここ追加 -->
            <p class="validation">※{{$errors->first('name')}}</p>
        @endif
        <table class="regist_content">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}" class="normal_text">
                </td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    @foreach ($categoryNameList as $id => $name)
                        <label for="category_{{ $id }}" class="chk">
                            <input type="checkbox" name="category[]" value="{{ $id }}" id="category_{{ $id }}" @if (!empty(old('category')) && in_array($id, old('category'))) checked @endif>
                            {{ $name }}
                        </label>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>説明</th>
                <td>
                    <textarea name="explain" class="normal_text">{{ old('explain') }}</textarea>
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <label class="img">
                        <input type="file" name="image" value="{{ old('image') }}" id="profile">
                        画像を選択
                    </label>
                    <p class="img_name">選択されていません</p>
                    <img id="sumb" style="display: none;">
                    <input type="hidden" value="{{ old('image') }}" id="profile_old" name="profile_old">
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit">
                確認画面へ
            </button>
        </div>
    </form>
</div>

@endsection