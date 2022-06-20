@extends('admin.layout')
@section('title', 'Page Title')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事一覧</h2>
    <div class="card-body">
     @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
     <div class="list_top_area">
         <a href="{{ route('article.regist.showForm') }}" class="regist_link">{{ __('新規作成') }}</a>
        <form method="POST" action="{{ route('article.list') }}" class="select">
        @csrf
            <div id="narrow_down">
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
    <form action="{{ route('article.delete') }}" method="POST">
        @csrf
        @if ($articleList->isNotEmpty())
            <table class="list" border="1">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 45%;">
                    <col style="width: 10%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ステータス</th>
                        <th>筆者</th>
                        <th>カテゴリー</th>
                        <th class="max">タイトル</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articleList as $index => $article)
                        <tr>
                            <td class="center">
                                <a href="{{ route('article.edit.showForm', $article->id) }}">
                                    {{ $article -> id }}
                                </a>
                            </td>
                            <td>
                                <div class="status_{{$article -> status}}">
                                    {{ config('status.article.'.$article->status) }}
                                </div>
                            </td>
                            <td>
                                {{ $article -> auther_name }}
                            </td>
                            <td>
                                {{ $article -> category_name }}
                            </td>
                            <td class="title">
                                <p>
                                    <a href="{{ route('article.edit.showForm', $article->id) }}">
                                        {{ $article -> title }}
                                    </a>
                                </p>
                            </td>
                            <td>
                                <input type="checkbox" value="{{$article -> id}}" name="delete_id[]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="button_area">
                <button type="submit" id="delete">checkしたものを消す</button>
            </div>
        @else
            <p>
            記事が一つもありません！！！
            </p>
        @endif
    </form>
    <div id="pagination">
        {{ $articleList->links('admin.partical.pagination') }}
    </div>
</div>
@endsection