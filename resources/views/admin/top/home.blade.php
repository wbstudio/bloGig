@extends('admin.layout')
@section('title', '管理画面　HOME')
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
@endsection
@section('css')
@endsection
@section('content')
<textarea name="main" id="editor"></textarea>
<script>
    window.onload=function(){
        CKEDITOR.replace('editor',{
            filebrowserBrowseUrl:filemanager.ckBrowseUrl
        })
    }
    CKEDITOR.config.height=600;
</script>

@endsection