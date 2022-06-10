@extends('admin.layout')
@section('title', '登録確認')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('category.regist.execution')}}" class="regist_place"  enctype="multipart/form-data">
    @csrf
        <table class="regist_content" border="1">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th>名前</th>
                <td>
                    {{ $inputData['name'] }}
                    <input type="hidden" name="name" value="{{ $inputData['name'] }}">
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit">
                登録
            </button>
            <button type="submit" name="action" value="back">
                戻る
            </button>
        </div>
    </form>
</div>
@endsection