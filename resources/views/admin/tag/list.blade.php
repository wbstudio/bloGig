@extends('admin.layout')
@section('title', 'タグ')
@section('css')
<link rel="stylesheet" href="{{ mix('css/admin/tag.css') }}">
@endsection
@section('js')
<script src="{{ mix('js/admin/tag/main.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <h2>TagList</h2>
    <div class="card-body">
    @if (session('status'))
         <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
     @endif
     <div class="list_top_area">
        <form method="POST" action="{{ route('tag.regist') }}" class="">
        @csrf
        <input type="text" name="name">
        <input type="submit" value="新規追加">
        </form>
     </div>
    <form action="{{ route('tag.delete') }}" method="POST">
        @csrf
        <div class="tag_list">
            @if ($tagList->isNotEmpty())
                @foreach ($tagList as $tagData)
                    <div class="tag_detail">
                        <img src="{{ asset('img/admin/common/pencil.svg') }}" class="pencil">
                        <span class="nametext">{{ $tagData->name }}</span>
                        <input type="checkbox" name="delete_id[]" value="{{ $tagData->id }}" class="namecheck">
                        <input type="text" name="name" value="{{ $tagData->name }}" class="replacetext" id="{{ $tagData->id }}">
                        <input type="button" value="名前変更" class="replacesubmit">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="button_area">
            <button type="submit" value="action">checkしたものを削除</button>
        </div>
    </form>
    </div>
    <input type="hidden" value="{{ session('result') }}" name="result">
</div>
@endsection