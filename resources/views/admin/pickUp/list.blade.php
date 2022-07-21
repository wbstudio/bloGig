@extends('admin.layout')
@section('title', 'Page Title')
@section('css')
@endsection
@section('js')
@endsection


@section('content')
<div class="container">
    <h2>pickUp一覧</h2>
    <div class="card-body">
     @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
    <div class="list_top_area">
        <a href="{{ route('pickUp.regist.showForm') }}" class="regist_link">{{ __('新規作成') }}</a>
    </div>
    <form action="{{ route('pickUp.delete') }}" method="POST">
        @csrf
        @if ($pickUpList->isNotEmpty())
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
                        <th>名前</th>
                        <th>筆者</th>
                        <th>カテゴリー</th>
                        <th class="max">記事ID</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pickUpList as $index => $pickUp)
                        <tr>
                            <td class="center">
                                <a href="{{ route('pickUp.edit.showForm', $pickUp->id) }}">
                                    {{ $pickUp -> id }}
                                </a>
                            </td>
                            <td>
                                {{ $pickUp->name }}
                            </td>
                            <td>
                                {{ $pickUp -> auther_name }}
                            </td>
                            <td>
                                {{ $pickUp -> category_name }}
                            </td>
                            <td class="title">
                                <p>
                                    {{ $pickUp->article_id }}
                                </p>
                            </td>
                            <td>
                                <input type="checkbox" value="{{$pickUp -> id}}" name="delete_id[]">
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
</div>
@endsection