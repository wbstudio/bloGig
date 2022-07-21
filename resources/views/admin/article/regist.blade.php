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
    <form method="POST" action="{{route('article.regist.confirm')}}" class="regist"  enctype="multipart/form-data">
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
                            <option value="{{ $id }}" data-category="{{ $auther['category'] }}" @if (old('auther') == $id) selected @endif>{{ $auther['name'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{ old('category') }}" class="initial_category">
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
                            <input type="checkbox" name="tag[]" value="{{ $tagData->id }}" @if (!empty(old('tag')) && in_array($tagData->id, old('tag'))) checked @endif>
                        </div>
                    @endforeach
                </div>
                </td>
            </tr>
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" class="inp_text"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td>
                <textarea name="main" id="editor">
                    {!! old('main') !!}
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
                    <input type="hidden" value="{{ old('image') }}" id="eyecatch_old" name="eyecatch_old">
                </td>
            </tr>
            <tr>
                <th>一覧の見出し</th>
                <td>
                    <textarea name="heading">{{ old('heading') }}</textarea>
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
                        <input type="hidden" name="set_rel_year" value="{{ old('release_year') }}">
                        年
                        <select class="datetime month" name="release_month">
                            @foreach (config('dateConst.month') as $key => $month)
                                <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_rel_month" value="{{ old('release_month') }}">
                        月
                        <select class="datetime day" name="release_day">
                            @foreach (config('dateConst.year') as $key => $year)
                                <option value="{{ $key }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_rel_day" value="{{ old('release_day') }}">
                        日
                        <select class="datetime hour" name="release_hour">
                            @foreach(config('dateConst.hour') as $key => $hour)
                                <option value="{{$key}}">{{$hour}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_rel_hour" value="{{ old('release_hour') }}">
                        :
                        <select class="datetime minute" name="release_minute">
                            @foreach(config('dateConst.minute') as $key => $minute)
                                <option value="{{$key}}">{{$minute}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_rel_minute" value="{{ old('release_minute') }}">
                    </div>
                </td>
            </tr>
            <tr>
            <th>非公開ステータス</th>
            <td>
                <input type="checkbox" name="endstatus" value="on" @if(!empty(old('endstatus')))checked @endif>
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
                        <input type="hidden" name="set_end_year" value="{{ old('end_year') }}">
                        年
                        <select class="datetime month" name="end_month">
                            @foreach(config('dateConst.month') as $key => $month)
                                <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_end_month" value="{{ old('end_month') }}">
                        月
                        <select class="datetime day" name="end_day">
                            @foreach(config('dateConst.year') as $key => $year)
                                <option value="{{$key}}">{{$year}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_end_day" value="{{ old('end_day') }}">
                        日
                        <select class="datetime hour" name="end_hour">
                            @foreach(config('dateConst.hour') as $key => $hour)
                                <option value="{{$key}}">{{$hour}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_end_hour" value="{{ old('end_hour') }}">
                        :
                        <select class="datetime minute" name="end_minute">
                            @foreach(config('dateConst.minute') as $key => $minute)
                                <option value="{{$key}}">{{$minute}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="set_end_minute" value="{{ old('end_minute') }}">
                    </div>
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit">確認</button>
        </div>
        <input type="hidden" name="return" value="on">
        <input type="hidden" name="return_flg" value="{{ old('return') }}">
        <input type="hidden" name="kind_flg" value="regist">
    </form>
</div>

@endsection