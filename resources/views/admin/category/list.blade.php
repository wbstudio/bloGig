@extends('admin.layout')
@section('title', 'カテゴリーリスト')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>筆者一覧</h2>
    <div class="card-body">
     @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
     <div class="list_top_area">
         <a href="{{route('category.regist.showForm')}}" class="regist_link">{{ __('+New') }}</a>
     </div>
    <form action="{{route('category.delete')}}" method="POST">
        @csrf
        @if(isset($categoryList) && count($categoryList) > 0)
        <table class="list" border="1">
            <colgroup>
                <col style="width:10%;">
                <col style="width:25%;">
                <col style="width:20%;">
                <col style="width:40%;">
                <col style="width:5%;">
            </colgroup>
            <thead>
                <tr>
                    <th>id</th>
                    <th class="max">名前</th>
                    <th>CC</th>
                    <th>該当筆者</th>
                    <th>削除</th>
                </tr>
            </thead>
            @foreach ($categoryList as $index => $category)
            <tr>
                <td class="center"><a href="{{ route('category.edit.showForm', $category->id) }}">{{ $category->id }}</a></td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @isset ($category->auther)
                        @foreach ($category->auther as $id)
                            @isset ($autherList[$id])
                                {{ $autherList[$id] }}
                            @endisset
                        @endforeach
                    @endisset
                </td>
                <td class="center">
                    <input type="checkbox" value="{{ $category -> id }}" name="delete_id[]">
                </td>
            </tr>
            @endforeach
        </table>
        <div class="button_area">
            <button type="submit" class="delete_button">削除</button>
        </div>
        @else
        <p>
        記事が一つもありません！！！
        </p>
        @endif
    </form>
</div>
@endsection