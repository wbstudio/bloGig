@extends('admin.layout')
@section('title', 'カテゴリー編集')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('category.edit.confirm')}}" class="edit_place"  enctype="multipart/form-data">
    @csrf
        @if ($errors->first('name'))   <!-- ここ追加 -->
            <p class="validation">※{{$errors->first('name')}}</p>
        @endif
        <table class="edit_content" border="1">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name" class="normal_text" value="@if (!empty(old('name'))){{ old('name') }}@else{{ $categoryData->name }}@endif">
                </td>
            </tr>
            @isset ($categoryData->auther)
                <tr>
                    <th>カテゴリー</th>
                    <td>
                        @foreach ($categoryData->auther as $id)
                            @isset ($autherList[$id])
                                {{ $autherList[$id] }}
                            @endisset
                        @endforeach
                    </td>
                </tr>
            @endisset
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit">
                確認画面へ
            </button>
        </div>
        <input type="hidden" name="id" value="{{ $categoryData->id }}">
    </form>
</div>

@endsection