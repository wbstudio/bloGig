@extends('admin.layout')
@section('title', '編集確認')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>編集確認</h2>
    <form method="POST" action="{{route('category.edit.execution')}}" class="edit_place"  enctype="multipart/form-data">
    @csrf
        <table class="edit_content" border="1">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th class="last">名前</th>
                <td class="last">
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
        @isset ($inputData['id'])
            <input type="hidden" name="id" value="{{ $inputData['id'] }}">
        @endisset
    </form>
</div>
@endsection