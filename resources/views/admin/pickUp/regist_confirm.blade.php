@extends('admin.layout')
@section('title', 'Page Title')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <h2>記事登録ページ</h2>
    @if ($error)
        <p class="validation">※{{ $error }}</p>
    @endif
    <form method="POST" action="{{route('pickUp.regist.execution')}}" class="regist"  enctype="multipart/form-data">
    @csrf
        <table class="regist_content">
            <colgroup>
                <col style="width:20%;">
                <col style="width:80%;">
            </colgroup>
            <tr>
                <th>名前</th>
                <td>
                    {{ $inputData['name'] }}
                    <input type="hidden" name="name" value="{{ $inputData['name'] }}">
                </td>
            </tr>
            <tr>
                <th>筆者</th>
                <td>
                    @isset ($inputData['auther'])
                        {{ $autherNameList[$inputData['auther']] }}
                        <input type="hidden" name="auther" value="{{ $inputData['auther'] }}">
                    @else
                        -    
                    @endisset
                </td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    @isset ($inputData['category'])
                        {{ $categoryNameList[$inputData['category']] }}
                        <input type="hidden" name="category" value="{{ $inputData['category'] }}">
                    @else
                        -    
                    @endisset
                </td>
            </tr>
            @foreach ($articleUniqueList as $articleId)
                @if ($loop->first)
                    <tr>
                        <th rowspan="8" class="last">記事</th>
                        <td class="confirm_pickup">
                            <p>
                                {{ $articleId }}：{{ $articleList[$articleId] }}
                            </p>
                        </td>
                    </tr>
                @elseif ($loop->last)
                    <tr>
                        <td class="last confirm_pickup">
                            <p>
                                {{ $articleId }}：{{ $articleList[$articleId] }}
                            </p>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td class="confirm_pickup">
                            <p>
                                {{ $articleId }}：{{ $articleList[$articleId] }}
                            </p>
                        </td>
                    </tr>
                @endif
                <input type="hidden" name="article[]" value="{{ $articleId }}">
            @endforeach
        </table>
        <div class="button_area">
            <button type="submit" name="action" value="submit" @if ($error) style="display:none;" @endif>
                登録
            </button>
            <button type="button" onClick="history.back()">戻る</button>
        </div>
    </form>
</div>

@endsection