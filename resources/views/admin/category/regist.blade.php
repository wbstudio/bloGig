@extends('admin.layout')
@section('title', 'カテゴリー登録')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('category.regist.confirm')}}" class="regist_form"  enctype="multipart/form-data">
    @csrf
        @if ($errors->first('name'))
            <p class="validation">※{{$errors->first('name')}}</p>
        @endif
        <table class="regist_content" border="1">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th class="last">名前</th>
                <td class="last">
                    <input type="text" name="name" value="{{ old('name') }}" class="normal_text">
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