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
    <form method="POST" action="{{route('article.edit.confirm')}}" class="regist"  enctype="multipart/form-data">
    @csrf
        <table class="regist_content">
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 85%;">
            </colgroup>
            <tr>
                <th>筆者</th>
                <td>
                    <select class="auther" name="auther">
                        <option value="">著者</option>
                        @foreach ($autherDataList as $id => $auther)
                            <option value="{{ $id }}" data-category="{{ $auther['category'] }}" @if (!empty(old('auther'))) @if (old('auther') == $id) selected @endif @else @if ($articleData->auther == $id) selected @endif @endif>{{ $auther['name'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="@if (!empty(old('category'))){{ old('category') }}@else{{ $articleData->category }}@endif" class="initial_category">
                </td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    <select class="category" name="category" disabled>
                        <option value="">カテゴリー</option>
                            @foreach ($categoryNameList as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>タグ</th>
                <td>
                <div class="tag_list">
                    @foreach ($tagList as $tagData)
                        <div class="tag_detail">
                            {{ $tagData->name }}
                            <input type="checkbox" name="tag[]" value="{{ $tagData->id }}" @if (!empty(old('tag'))) @if (old('tag') != null && in_array($tagData->id, old('tag'))) checked @endif @else @if ($articleData->tagsData != null && in_array($tagData->id, $articleData->tagsData)) checked @endif @endif>
                            
                        </div>
                    @endforeach
                </div>
                </td>
            </tr>
            <tr>
                <th>タイトル</th>
                <td>
                    <input type="text" name="title" class="inp_text" value="@if (!empty(old('title'))) {{ old('title') }} @else {{ $articleData->title }} @endif">
                </td>
            </tr>
            <tr>
                <th>本文</th>
                <td>
                <textarea name="main" id="editor">
                    @if (!empty(old('main'))) {!! old('main') !!} @else {!! $articleData->main !!} @endif
                </textarea>
                <script>
                    window.onload=function(){
                        CKEDITOR.replace('editor',{
                            filebrowserBrowseUrl:filemanager.ckBrowseUrl
                        })
                    }
                    CKEDITOR.config.height=800;
                </script>
                </td>
            </tr>
            <tr>
                <th>アイキャッチ</th>
                <td>
                    <label class="img">
                        <input type="file" name="image" id="eyecatch">
                        画像を選択
                    </label>
                    <p class="img_name">選択されていません</p>
                    <img id="sumb">
                    <input type="hidden" value="@if(!empty(old('image'))){{ old('image') }}@else{{ $articleData->eyecatch }}@endif" id="eyecatch_old" name="eyecatch_old">
                </td>
            </tr>
            <tr>
                <th>一覧の見出し</th>
                <td>
                    <textarea name="heading">@if (!empty(old('heading'))){{ old('heading') }}@else{{ $articleData->heading }}@endif</textarea>
                </td>
            </tr>
            <tr>
                <th>status</th>
                <td>
                    <select class="status" name="status">
                        @foreach (config('const.ARTICLE.ARTICLE_STATUS_NAME') as $key => $status)
                            <option value="{{ $key }}" @if (!empty(old('status')) && $key == old('status')) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>公開時間</th>
                <td>
                    <div class="release">
                        <select class="datetime year" name="release_year">
                            @foreach (config('dateConst.year') as $key => $year)
                                <option value="{{ $key }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        年
                        <select class="datetime month" name="release_month">
                            @foreach (config('dateConst.month') as $key => $month)
                                <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        月
                        <select class="datetime day" name="release_day">
                            @foreach (config('dateConst.year') as $key => $year)
                                <option value="{{ $key }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        日
                        <select class="datetime hour" name="release_hour">
                            @foreach(config('dateConst.hour') as $key => $hour)
                                <option value="{{$key}}">{{$hour}}</option>
                            @endforeach
                        </select>
                        :
                        <select class="datetime minute" name="release_minute">
                            @foreach(config('dateConst.minute') as $key => $minute)
                                <option value="{{$key}}">{{$minute}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_rel_year" value="@if(!empty(old('release_year'))){{ old('release_year') }} @else {{ $release['release_year'] }} @endif">
                        <input type="hidden" name="set_rel_month" value="@if(!empty(old('release_month'))){{ old('release_month') }} @else {{ $release['release_month'] }} @endif">
                        <input type="hidden" name="set_rel_day" value="@if(!empty(old('release_day'))){{ old('release_day') }} @else {{ $release['release_day'] }} @endif">
                        <input type="hidden" name="set_rel_hour" value="@if(!empty(old('release_hour'))){{ old('release_hour') }} @else {{ $release['release_hour'] }} @endif">
                        <input type="hidden" name="set_rel_minute" value="@if(!empty(old('release_minute'))){{ old('release_minute') }} @else {{ $release['release_minute'] }} @endif">
                    </div>
                </td>
            </tr>
            <tr>
            <th>非公開ステータス</th>
            <td>
                <input type="checkbox" name="endstatus" value="on" @if(!empty(old('endstatus')))checked @elseif((empty(old('return'))) && ($end['editEndFlag'] == 0)) checked @endif>
                チェックを入れると公開終了時間を設定できます。
            </td>
            </tr>
            <tr>
                <th class="last">非公開時間</th>
                <td class="last">
                    <div class="end_at">
                        <select class="datetime year" name="end_year">
                            @foreach(config('dateConst.year') as $key => $year)
                                <option value="{{$key}}">{{$year}}</option>
                            @endforeach
                        </select>
                        年
                        <select class="datetime month" name="end_month">
                            @foreach(config('dateConst.month') as $key => $month)
                                <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                        月
                        <select class="datetime day" name="end_day">
                            @foreach(config('dateConst.year') as $key => $year)
                                <option value="{{$key}}">{{$year}}</option>
                            @endforeach
                        </select>
                        日
                        <select class="datetime hour" name="end_hour">
                            @foreach(config('dateConst.hour') as $key => $hour)
                                <option value="{{$key}}">{{$hour}}</option>
                            @endforeach
                        </select>
                        :
                        <select class="datetime minute" name="end_minute">
                            @foreach(config('dateConst.minute') as $key => $minute)
                                <option value="{{$key}}">{{$minute}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_end_year" value="@if(!empty(old('end_year'))){{ old('end_year') }} @elseif (empty(old('return')) && $end['editEndFlag'] == 0) {{ $end['end_year'] }} @endif">
                        <input type="hidden" name="set_end_month" value="@if(!empty(old('end_month'))){{ old('end_month') }} @elseif (empty(old('return')) && $end['editEndFlag'] == 0) {{ $end['end_month'] }} @endif">
                        <input type="hidden" name="set_end_day" value="@if(!empty(old('end_day'))){{ old('end_day') }} @elseif (empty(old('return')) && $end['editEndFlag'] == 0) {{ $end['end_day'] }} @endif">
                        <input type="hidden" name="set_end_hour" value="@if(!empty(old('end_hour'))){{ old('end_hour') }} @elseif (empty(old('return')) && $end['editEndFlag'] == 0) {{ $end['end_hour'] }} @endif">
                        <input type="hidden" name="set_end_minute" value="@if(!empty(old('end_minute'))){{ old('end_minute') }} @elseif (empty(old('return')) && $end['editEndFlag'] == 0) {{ $end['end_minute'] }} @endif">
                    </div>
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit">確認</button>
        </div>
        <input type="hidden" name="id" value="{{ $articleData->id }}">
        <input type="hidden" name="return" value="on">
        <input type="hidden" name="return_flg" value="{{ old('return') }}">
        <input type="hidden" name="kind_flg" value="edit">
    </form>
</div>

@endsection