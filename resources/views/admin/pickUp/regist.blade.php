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
        <form method="POST" action="{{ route('pickUp.regist.showForm') }}" class="select">
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
        </form>
     </div>
    <form method="POST" action="{{route('pickUp.regist.confirm')}}" class="regist"  enctype="multipart/form-data">
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
                <th>筆者</th>
                <td>
                    <select class="auther" name="auther">
                        <option value="">著者</option>
                        @foreach ($autherNameList as $id => $name)
                            <option value="{{ $id }}" @if (old('auther') == $id) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    <select class="category" name="category">
                        <option value="">カテゴリー</option>
                            @foreach ($categoryNameList as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th rowspan="8">記事</th>
                <td>
                    <select class="article" name="article[]">
                        <option value=""></option>
                            @isset ($articleList)
                                @foreach ($articleList as $id => $name)
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
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
                                    <option value="{{ $id }}">{{ $id }}：{{ $name }}</option>
                                @endforeach
                            @endisset
                    </select>
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit">
                確認画面へ
            </button>
        </div>
        <input type="hidden" name="page" value="regist">
    </form>
</div>

@endsection