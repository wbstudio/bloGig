@extends('admin.layout')
@section('title', 'Page Title')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('auther.regist.execution')}}" class="regist"  enctype="multipart/form-data">
    @csrf
        <table class="regist_content">
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
            <tr>
                <th>カテゴリー</th>
                <td>
                    @isset ($inputData['category'])
                        @foreach ($inputData['category'] as $category)
                            {{ $categoryNameList[$category] }}
                            <input type="hidden" name="category[]" value="{{ $category }}">
                            @if(!$loop->last) , @endif
                        @endforeach
                    @endisset
                </td>
            </tr>
            <tr>
                <th>紹介</th>
                <td>
                    {!! nl2br(e($inputData ['explain'])) !!}
                    <input type="hidden" value="{{ $inputData['explain'] }}" name="explain">
                </td>
            </tr>
            <tr>
                <th class="last">画像</th>
                <td class="last">
                    @if (!empty($inputData['image']))
                        <img src="{{ asset('storage/profile/'.$inputData['image']) }}">
                    @endif
                    <input type="hidden" value="{{ $inputData['image'] }}" name="image">
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