@extends('admin.layout')
@section('title', 'Page Title')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/admin/article.css') }}">
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script src="{{ mix('js/admin/article/main.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    <form method="POST" action="{{route('article.edit.execution')}}" class="edit"  enctype="multipart/form-data">
    @csrf
        <table class="edit_content">
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 85%;">
            </colgroup>
            <tr>
                <th>筆者</th>
                <td>
                    @isset($autherDataList[$inputData['auther']]['name'])
                        {{ $autherDataList[$inputData['auther']]['name'] }}
                    @endisset
                </td>
                <input type="hidden" name="auther" value="{{ $inputData['auther'] }}">
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    @isset($inputData['category'])
                        {{ $categoryNameList[$inputData['category']] }}
                        <input type="hidden" name="category" value="{{ $inputData['category'] }}">
                    @endisset
                </td>
            </tr>
            <tr>
                <th>タグ</th>
                <td>
                    @isset ($inputData['tag'])
                        @foreach ($inputData['tag'] as $tagId)
                            {{ $tagNameList[$tagId] }}
                            <input type="hidden" name="tag[]" value="{{ $tagId }}">
                        @endforeach
                    @endisset
                </td>
            </tr>
            <tr>
                <th>タイトル</th>
                <td>
                    {{ $inputData['title'] }}
                </td>
                <input type="hidden" name="title" value="{{ $inputData['title'] }}">
            </tr>
            <tr>
                <th>本文</th>
                <td>
                    {!! $inputData['main'] !!}
                </td>
                <input type="hidden" name="main" value="{{ $inputData['main'] }}">
            </tr>
            <tr>
                <th>アイキャッチ</th>
                <td>
                    @if (!empty($inputData['image']))
                        <img src="{{ asset('storage/eyecatch/'.$inputData['image']) }}">
                    @endif
                    <input type="hidden" value="{{ $inputData['image'] }}" name="image">
                </td>
            </tr>
            <tr>
                <th>一覧の見出し</th>
                <td>
                    {!! nl2br(e($inputData['heading'])) !!}
                    <input type="hidden" name="heading" value="{{ $inputData['heading'] }}">
                </td>
            </tr>
            <tr>
                <th>status</th>
                <td>
                    {{ config('const.ARTICLE.ARTICLE_STATUS_NAME.' . $inputData['status']) }}
                    <input type="hidden" name="status" value="{{ $inputData['status'] }}">
                </td>
            </tr>
            <tr>
                <th>公開時間</th>
                <td>
                    <div class="release">
                        {{ $inputData['release_year'] }}年 {{ $inputData['release_month'] }}月 {{ $inputData['release_day'] }}日 {{ $inputData['release_hour'] }}:{{ $inputData['release_minute'] }}
                        <input type="hidden" name="release_year" value="{{ $inputData['release_year'] }}">
                        <input type="hidden" name="release_month" value="{{ $inputData['release_month'] }}">
                        <input type="hidden" name="release_day" value="{{ $inputData['release_day'] }}">
                        <input type="hidden" name="release_hour" value="{{ $inputData['release_hour'] }}">
                        <input type="hidden" name="release_minute" value="{{ $inputData['release_minute'] }}">
                    </div>
                </td>
            </tr>
            <tr>
            <th>非公開</th>
            <td>
                @if (!empty($inputData['endstatus']) && $inputData['endstatus'] == 'on')
                    する
                    <input type="hidden" name="endstatus" value="{{ $inputData['endstatus'] }}">
                @else
                    しない
                @endif
            </td>
            </tr>
            <tr>
                <th class="last">非公開時間</th>
                <td class="last">
                    <div class="end_at">
                        @if (!empty($inputData['endstatus']))
                            {{ $inputData['end_year'] }}年 {{ $inputData['end_month'] }}月 {{ $inputData['end_day'] }}日 {{ $inputData['end_hour'] }}:{{ $inputData['end_minute'] }}
                            <input type="hidden" name="end_year" value="{{ $inputData['end_year'] }}">
                            <input type="hidden" name="end_month" value="{{ $inputData['end_month'] }}">
                            <input type="hidden" name="end_day" value="{{ $inputData['end_day'] }}">
                            <input type="hidden" name="end_hour" value="{{ $inputData['end_hour'] }}">
                            <input type="hidden" name="end_minute" value="{{ $inputData['end_minute'] }}">
                        @else
                            非公開にしない
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit">登録</button>
            <button type="submit" name="action" value="back">戻る</button>
        </div>
        <input type="hidden" name="return" value="on">
        <input type="hidden" name="return_flg" value="on">
        <input type="hidden" name="kind_flg" value="regist">
        <input type="hidden" name="id" value="{{ $inputData['id'] }}">
    </form>
</div>

@endsection