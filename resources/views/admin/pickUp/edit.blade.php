@extends('admin.layout')
@section('title', '筆者登録')
@section('css')
@endsection
@section('js')
    <script src="{{ mix('js/admin/pickUp/main.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <h2>PickUp登録ページ</h2>
    <div class="list_top_area">
        <form method="POST" action="{{ route('pickUp.edit.showForm.search', ['id'=>$pickUpData->id]) }}" class="select">
        @csrf
            <div id="narrow_down">
                <div class="select_area">
                    一括絞り込み：
                </div>
                <div class="select_area">
                    <select class="auther" name="auther">
                        <option value="">著者</option>
                        @foreach($autherNameList as $id => $name)
                            <option value="{{ $id }}" @if ($arrayRequest['auther'] == $id) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select_area">
                    <select class="auther"  name="category">
                        <option value="">著者内カテゴリー</option>
                        @foreach($categoryNameList as $id => $name)
                            <option value="{{ $id }}" @if ($arrayRequest['category'] == $id) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select_area">
                    <input type="submit" value="絞り込む">
                </div>
            </div>
            <input type="hidden" name="search" value="on">
            <input type="hidden" name="kind_flg" value="regist">
        </form>
     </div>
    <form method="POST" action="{{route('pickUp.edit.confirm')}}" class="regist">
    @csrf
        @if ($errors->first('name'))   <!-- ここ追加 -->
            <p class="validation">※{{ $errors->first('name') }}</p>
        @endif
        <table class="edit_content">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name" value="{{ $pickUpData->name }}" class="normal_text">
                </td>
            </tr>
            <tr>
                <th>筆者</th>
                <td>
                    <select class="auther" name="auther">
                        <option value="" disabled>著者</option>
                        @foreach ($autherNameList as $id => $name)
                            <option value="{{ $id }}" @if ($pickUpData->auther_id == $id) selected @endif disabled>{{ $name }}</option>
                        @endforeach
                    </select>
                    ※変更不可
                </td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    <select class="category" name="category">
                        <option value="" disabled>カテゴリー</option>
                            @foreach ($categoryNameList as $id => $name)
                                <option value="{{ $id }}" @if ($pickUpData->category_id == $id) selected @endif disabled>{{ $name }}</option>
                            @endforeach
                    </select>
                    ※変更不可
                </td>
            </tr>
            <tr>
                <th rowspan="8">記事</th>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[0]) && $pickUpData->article_id[0] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[1]) && $pickUpData->article_id[1] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[2]) && $pickUpData->article_id[2] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[3]) && $pickUpData->article_id[3] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[4]) && $pickUpData->article_id[4] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[5]) && $pickUpData->article_id[5] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[6]) && $pickUpData->article_id[6] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}" @if (isset($pickUpData->article_id[7]) && $pickUpData->article_id[7] == $id && (!isset($search))) selected @endif>{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id" value="{{ $pickUpData->id }}">
        <input type="hidden" name="page" value="edit">
        <div class="button_area">
            <button type="submit" name="action" value="submit">
                確認画面へ
            </button>
        </div>
    </form>
</div>

@endsection